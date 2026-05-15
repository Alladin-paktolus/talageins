jQuery(document).ready(function ($) {

    /*
    =====================================
    Variables
    =====================================
    */

    let currentStep = parseInt(localStorage.getItem('current_form_step')) || 1;
    const totalSteps = 8;
    const $form = $('#multiStepForm');
    const $nextBtn = $('.next-btn');
    const $backBtn = $('.back-btn');

    /*
    =====================================
    DBA Toggle
    =====================================
    */

    function toggleDbaField() {
        if ($("#dba-yes").is(":checked")) {
            $(".dba-name-field").addClass("show");
        } else {
            $(".dba-name-field").removeClass("show");
        }
    }

    $("#dba-yes, #dba-no").on("change", function () {
        toggleDbaField();
    });

    toggleDbaField();

    /*
    =====================================
    Restore Dynamic Sections
    =====================================
    */
   

    async function restoreDynamicSections() {

        console.log('=== Restoring Dynamic Sections ===');

        /*
        =====================================
        OWNERS
        =====================================
        */

        const ownerData = JSON.parse(
            localStorage.getItem('step_3_data_inserted') || '{}'
        );

        let ownerIndexes = [];

        Object.keys(ownerData).forEach(function (key) {
            const match = key.match(/owner_(\d+)_/);
            if (match && match[1]) {
                ownerIndexes.push(parseInt(match[1]));
            }

        });

        ownerIndexes = [...new Set(ownerIndexes)];

        const totalOwners = ownerIndexes.length
            ? Math.max(...ownerIndexes)
            : 1;

        console.log('Total Owners Found:', totalOwners);
        let existingOwners = $('.details-card .card-gray').length;

        /*
        Create Missing Owners
        */

        while (existingOwners < totalOwners) {
            $('#add-owner-btn').trigger('click');
            existingOwners++;
        }

        /*
        Wait Until Owners Exist
        */

        await waitForElement('.details-card .card-gray',totalOwners);

        /*
        =====================================
        CLAIMS
        =====================================
        */

        const claimData = JSON.parse(localStorage.getItem('step_6_data_inserted') || '{}');

        let totalClaims = 1;

        Object.keys(claimData).forEach(function (key) {
            if (Array.isArray(claimData[key])) {
                if (claimData[key].length > totalClaims) {
                    totalClaims = claimData[key].length;
                }
            }
        });

        console.log('Total Claims Found:', totalClaims);
        let existingClaims = $('.claim-item').length;
        /*
        Create Missing Claims
        */

        while (existingClaims < totalClaims) {
            $('#add-claim-btn').trigger('click');
            existingClaims++;
        }

        /*
        Wait Until Claims Exist
        */

        await waitForElement('.claim-item',totalClaims);

        /*
        Reinitialize Select
        */

        initializeCustomSelect();

        console.log('=== Dynamic Sections Restored ===');

    }

    function delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function waitForElement(selector, totalExpected) {
        return new Promise((resolve) => {
            const interval = setInterval(function () {
                const total = $(selector).length;
                if (total >= totalExpected) {
                    clearInterval(interval);
                    resolve();
                }
            }, 100);
        });
    }
    /*
    =====================================
    Restore Single Field
    =====================================
    */

    function restoreField($field, value) {
        const type = $field.attr('type');
        // Radio
        if ($field.is(':radio')) {
            if ($field.val() == value) {
                $field.prop('checked', true).trigger('change');
            }
            return;
        }

        // Checkbox
        if (type === 'checkbox') {
            $field.prop('checked', value === true || value === 'true');
            return;
        }

        // Custom Select Hidden Input
        if (type === 'hidden' && $field.closest('.custom-select').length) {
            const $wrapper = $field.closest('.custom-select');
            $field.val(value);
            const cleanValue = String(value).trim();
            const $matchedOption = $wrapper.find('.option').filter(function () {
                return String($(this).data('value')).trim() === cleanValue;
            });

            if ($matchedOption.length) {
                $wrapper.find('.selected-text').text($matchedOption.text().trim());
                $wrapper.find('.option').removeClass('active');
                $matchedOption.addClass('active');
                console.log(`✅ Custom select restored: ${value}`);
            } else {
                // Option not found set text directly
                if (value) {
                    $wrapper.find('.selected-text').text(value);
                }
            }
            return;
        }

        // Normal Select
        if ($field.is('select')) {
            $field.val(value).trigger('change');
            return;
        }

        // Normal Input / Textarea
        $field.val(value).trigger('input').trigger('change');

    }

    /*
    =====================================
    Load Saved Form Data
    =====================================
    */

    function loadSavedFormData() {
        console.log('=== Loading Saved Form Data ===');
        for (let stepNumber = 1; stepNumber <= totalSteps; stepNumber++) {
            const savedData = localStorage.getItem(`step_${stepNumber}_data_inserted`);
            if (!savedData) continue;
            let stepData = {};
            try {
                stepData = JSON.parse(savedData);
            } catch (e) {
                console.error(`Error parsing step ${stepNumber}`, e);
                continue;
            }
            const $step = $(`.form-step-${stepNumber}`);
            if (!$step.length) continue;
            console.log(`Restoring step ${stepNumber}:`, stepData);
            Object.keys(stepData).forEach(function (key) {
                const value = stepData[key];
                /*
                Array Values (claims with [] names)
                */
                if (Array.isArray(value)) {
                    const $fields = $step.find(`[name="${key}"]`);
                    $fields.each(function (index) {
                        const fieldValue = value[index];
                        if (fieldValue === undefined || fieldValue === null) return;
                        restoreField($(this), fieldValue);
                        console.log(`✅ Array field restored: ${key}[${index}] = ${fieldValue}`);
                    });
                }

                /*
                Single Values
                */
                else {
                    if (value === null || value === undefined || value === '') return;
                    const $fields = $step.find(`[name="${key}"]`);
                    if (!$fields.length) {
                        console.warn(`❌ Field not found: ${key} in step ${stepNumber}`);
                        return;
                    }
                    // Radio
                    if ($fields.is(':radio')) {
                        $step.find(`[name="${key}"][value="${value}"]`)
                            .prop('checked', true)
                            .trigger('change');
                        console.log(`✅ Radio restored: ${key} = ${value}`);
                        return;
                    }
                    restoreField($fields.first(), value);
                    console.log(`✅ Field restored: ${key} = ${value}`);
                }
            });

        }

        // Restore DBA after all fields loaded
        toggleDbaField();
        console.log('=== Restore Complete ===');

    }

    /*
    =====================================
    Load API Data
    =====================================
    */

    async function loadInitialFormData() {
        try {
            $('.form-loader').addClass('active');
            const ajaxData = new FormData();
            ajaxData.append('action', 'load_policy_form_data');
            ajaxData.append('nonce', policy_form.nonce);
            const response = await fetch(policy_form.ajax_url, {
                method: 'POST',
                body: ajaxData
            });
            const result = await response.json();
            if (result.success) {
                /*
                Agency Data
                */
                const agencyData = result.data.agency_data || [];
                let agencyOptions = '';
                agencyData.forEach((agency) => {
                    agencyOptions += `
                        <div class="option" role="option" data-agency-id="${agency.agencyId}" data-value="${agency.name}">
                            ${agency.name}
                        </div>
                    `;
                });
                $('.agency-select .options-container').html(agencyOptions);

                const savedStepOneData = JSON.parse(
                    localStorage.getItem('step_1_data_inserted') || '{}'
                );

                if (savedStepOneData && savedStepOneData.name) {
                    $('.agency-select .selected-text').text(savedStepOneData.name);
                    $('#agency_id').val(savedStepOneData.agency_id || '');
                } else if (agencyData.length > 0) {
                        const firstAgency = agencyData[0];
                        // Update text
                        $('.agency-select .selected-text').text(firstAgency.agencyName);
                        // Update hidden input
                        $('.agency-select input[name="agency"]').val(firstAgency.agencyName);
                        // Store agency id
                        $('#agency_id').val(firstAgency.agencyId);
                        // Add active class
                        $('.agency-select .option').first().addClass('active');
                    }

                /*
                Industry Data
                */
                const industryData = result.data.industry_data || [];
                let industryOptions = '';
                industryData.forEach((industry) => {
                    industryOptions += `
                        <div
                            class="option"
                            data-value="${industry.name}"
                            data-sic="${industry.sic || ''}"
                            data-naics="${industry.naics || ''}"
                            data-profession="${industry.category || ''}"
                            data-industrycodecategoryid="${industry.industryCodeCategoryId || ''}"
                        >
                            ${industry.name}
                        </div>
                    `;
                });

                $('.industry-select .options-container').html(industryOptions);

                if (savedStepOneData && savedStepOneData.industry) {
                    $('.industry-select .selected-text').text(savedStepOneData.industry);
                    $('.industry-select input[name="industry"]').val(savedStepOneData.industry);
                    $('#sic_code').val(savedStepOneData.sic_code || '');
                    $('#naics_code').val(savedStepOneData.naics_code || '');
                    $('#profession').val(savedStepOneData.profession || '');
                    $('#industryCodeId').val(savedStepOneData.industryCodeId || '');
                } else if (industryData.length > 0) {
                    const firstIndustry = industryData[0];
                    $('.industry-select .selected-text').text(firstIndustry.name);
                    $('.industry-select input[name="industry"]').val(firstIndustry.name);
                    $('#sic_code').val(firstIndustry.sic || '');
                    $('#naics_code').val(firstIndustry.naics || '');
                    $('#profession').val(firstIndustry.category || '');
                    $('#industryCodeId').val(firstIndustry.industryCodeCategoryId || '');
                }

                initializeCustomSelect();

                // Wait for dynamic sections to be created
                // then fill all fields
                await restoreDynamicSections();

                // Reinitialize custom select for new cloned sections
                initializeCustomSelect();

                // Now fill all fields including cloned ones
                loadSavedFormData();

            }

        } catch (error) {
            console.error('API Error:', error);
        } finally {
            $('.form-loader').removeClass('active');
        }

    }

    /*
    =====================================
    Custom Select Initialize
    =====================================
    */

    function initializeCustomSelect() {

        const $customSelects = $('.custom-select');
        $customSelects.each(function () {
            const $customSelect = $(this);
            const $selectBox = $customSelect.find('.select-box');
            const $selectedText = $customSelect.find('.selected-text');
            const $hiddenInput = $customSelect.find('input[type="hidden"]');

            $selectBox.off('click').on('click', function (e) {
                e.stopPropagation();
                $customSelects.not($customSelect).removeClass('active');
                $customSelect.toggleClass('active');
            });

            $customSelect.find('.option').off('click').on('click', function () {

                const $option = $(this);
                const value = $option.data('value') || '';

                $selectedText.text($option.text().trim());

                if ($hiddenInput.length) {
                    $hiddenInput.val(value);
                }

                if ($customSelect.hasClass('industry-select')) {
                    $('#sic_code').val($option.data('sic') || '');
                    $('#naics_code').val($option.data('naics') || '');
                    $('#profession').val($option.data('profession') || '');
                    $('#industryCodeId').val($option.data('industrycodecategoryid') || '');
                }

                if ($customSelect.hasClass('agency-select')) {
                    $('#agency_id').val($option.data('agency-id') || '');
                }

                $customSelect.find('.option').removeClass('active');
                $option.addClass('active');
                $customSelect.removeClass('active');

            });

        });

    }

    /*
    =====================================
    Close Dropdown Outside Click
    =====================================
    */

    $(document).on('click', function () {
        $('.custom-select').removeClass('active');
    });

    /*
    =====================================
    Update Steps
    =====================================
    */

    function updateSteps() {

        $('.form-step').removeClass('active');
        $('.step-item').removeClass('active').addClass('disabled');

        $(`.form-step-${currentStep}`).addClass('active');
        $('.step-item').eq(currentStep - 1).addClass('active').removeClass('disabled');

        if (currentStep === 1) {
            $backBtn.addClass('disabled').prop('disabled', true);
        } else {
            $backBtn.removeClass('disabled').prop('disabled', false);
        }

        if (currentStep === totalSteps) {
            $nextBtn.html(`Submit <i class="fa-solid fa-check"></i>`);
        } else {
            $nextBtn.html(`Save & Continue <i class="fa-solid fa-arrow-right"></i>`);
        }

    }

    /*
    =====================================
    Get Step Data
    =====================================
    */

    function getStepData() {

        const $activeStep = $(`.form-step-${currentStep}`);
        const $fields = $activeStep.find('input, select, textarea');

        let formData = {};

        $fields.each(function () {

            const $field = $(this);
            const name = $field.attr('name');
            if (!name) return;

            const type = $field.attr('type');

            if (type === 'radio') {

                if ($field.is(':checked')) {
                    if (name.includes('[]')) {
                        if (!formData[name]) formData[name] = [];
                        formData[name].push($field.val());
                    } else {
                        formData[name] = $field.val();
                    }
                }

            } else if (type === 'checkbox') {

                formData[name] = $field.is(':checked');

            } else {

                if (name.includes('[]')) {
                    if (!formData[name]) formData[name] = [];
                    formData[name].push($field.val());
                } else {
                    formData[name] = $field.val();
                }

            }

        });

        return formData;

    }

    /*
    =====================================
    Next Button Click
    =====================================
    */

    $nextBtn.on('click', async function (e) {

        e.preventDefault();
        if (!validateCurrentStep()) {
            return;
        }

        if ($nextBtn.hasClass('loading')) return;

        const stepData = getStepData();

        const savedStepData = localStorage.getItem(`step_${currentStep}_data_inserted`);
        const isDataSame = savedStepData && JSON.stringify(stepData) === savedStepData;
        const isApiSubmitted = localStorage.getItem(`step_${currentStep}_api_submitted`) === 'true';

        if (isDataSame && isApiSubmitted) {

            if (currentStep < totalSteps) {
                currentStep++;
                localStorage.setItem('current_form_step', currentStep);
                updateSteps();
                $('html, body').animate({ scrollTop: $('.stepper-wrapper').offset().top - 100 }, 500);
            } else {
                $form.submit();
            }

            return;

        }

        localStorage.setItem(`step_${currentStep}_data_inserted`, JSON.stringify(stepData));

        $nextBtn.addClass('loading').prop('disabled', true).text('Processing...');

        try {

            const ajaxData = new FormData();
            ajaxData.append('step', currentStep);

            if (currentStep == 1) {
                ajaxData.append('action', 'create_policy_step');
                ajaxData.append('nonce', policy_form.nonce);
            } else {
                ajaxData.append('action', 'save_policy_step');
                ajaxData.append('nonce', policy_form.nonce);
            }

            ajaxData.append('form_data', JSON.stringify(stepData));

            const response = await fetch(policy_form.ajax_url, {
                method: 'POST',
                body: ajaxData
            });

            const result = await response.json();

            if (result.success) {

                localStorage.setItem(`step_${currentStep}_api_response`, JSON.stringify(result.data));
                localStorage.setItem(`step_${currentStep}_api_submitted`, 'true');

                if (currentStep < totalSteps) {
                    currentStep++;
                    localStorage.setItem('current_form_step', currentStep);
                    updateSteps();
                    $('html, body').animate({ scrollTop: $('.stepper-wrapper').offset().top - 100 }, 500);
                } else {
                    localStorage.removeItem('current_form_step');
                    for (let i = 1; i <= totalSteps; i++) {
                        localStorage.removeItem(`step_${i}_data_inserted`);
                        localStorage.removeItem(`step_${i}_api_submitted`);
                        localStorage.removeItem(`step_${i}_api_response`);
                    }
                    $form.submit();
                }

            } else {
                alert(result.data?.message || 'Something went wrong.');
            }

        } catch (error) {
            console.error('Submit Error:', error);
            alert('Network error. Please try again.');
        } finally {
            $nextBtn.removeClass('loading').prop('disabled', false);
            updateSteps();
        }

    });

    /*
    =====================================
    Validate Current Step
    =====================================
    */

    function validateCurrentStep() {

        let isValid = true;

        const $activeStep = $(`.form-step-${currentStep}`);

        /*
        Remove old errors
        */

        $activeStep.find('.field-error').removeClass('field-error');

        /*
        =====================================
        Validate Required Fields
        =====================================
        */

        $activeStep.find('.asteric').each(function () {

            const $label = $(this).closest('label');

            /*
            Find related field
            */

            let $fieldWrapper = $label.closest('.form-group');

            if (!$fieldWrapper.length) return;

            /*
            =====================================
            Custom Select
            =====================================
            */

            const $hiddenInput = $fieldWrapper.find('.custom-select input[type="hidden"]');

            if ($hiddenInput.length) {

                if (!$hiddenInput.val().trim()) {

                    isValid = false;

                    $fieldWrapper.find('.custom-select')
                        .addClass('field-error');

                }

                return;
            }

            /*
            =====================================
            Radio Buttons
            =====================================
            */

            const $radios = $fieldWrapper.find('input[type="radio"]');

            if ($radios.length) {

                const radioName = $radios.first().attr('name');

                if (!$activeStep.find(`input[name="${radioName}"]:checked`).length) {

                    isValid = false;

                    $fieldWrapper.find('.toggle-btn-group').addClass('field-error');

                }

                return;
            }

            /*
            =====================================
            Normal Inputs / Textarea
            =====================================
            */

            const $field = $fieldWrapper.find('input, textarea, select').not('[type="hidden"]').first();
            if ($field.length) {
                if (!$field.val().trim()) {
                    isValid = false;
                    $field.addClass('field-error');
                }
            }

        });

        /*
        Scroll to first error
        */

       if (!isValid) {
            const $firstError = $activeStep.find('.field-error').first();
            if ($firstError.hasClass('custom-select')) {
                $firstError.find('.select-box').focus();
            } else if ($firstError.hasClass('toggle-btn-group')) {
                $firstError.find('input[type="radio"]').first().focus();
            } else {
                $firstError.focus();
            }
        }
        return isValid;

    }

    /*
    =====================================
    Back Button Click
    =====================================
    */

    $backBtn.on('click', function (e) {

        e.preventDefault();

        if (currentStep > 1) {
            currentStep--;
            localStorage.setItem('current_form_step', currentStep);
            updateSteps();
            $('html, body').animate({ scrollTop: $('.stepper-wrapper').offset().top - 100 }, 500);
        }

    });

    /*
    =====================================
    Page Visibility Change
    =====================================
    */

    document.addEventListener('visibilitychange', function () {
        if (!document.hidden) {
            const savedStep = parseInt(localStorage.getItem('current_form_step')) || 1;
            if (savedStep !== currentStep) {
                currentStep = savedStep;
                updateSteps();
                loadSavedFormData();
            }
        }
    });

    /*
    =====================================
    Initialize
    =====================================
    */

    currentStep = parseInt(localStorage.getItem('current_form_step')) || 1;
    updateSteps();
    loadInitialFormData();

});