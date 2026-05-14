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
    Load Saved Form Data - FIXED
    =====================================
    */

    function loadSavedFormData() {

        $('.form-step').each(function (index) {

            const stepNumber = index + 1;
            const savedData = localStorage.getItem(`step_${stepNumber}_data_inserted`);

            if (!savedData) {
                console.log(`No saved data for step ${stepNumber}`);
                return;
            }

            let stepData;

            try {
                stepData = JSON.parse(savedData);
            } catch (e) {
                console.error(`Error parsing step ${stepNumber} data:`, e);
                return;
            }

            console.log(`Loading step ${stepNumber} data:`, stepData);

            const $step = $(this);

            Object.keys(stepData).forEach(function (key) {

                const value = stepData[key];
                const $field = $step.find(`[name="${key}"]`);

                if (!$field.length) {
                    console.warn(`Field not found: ${key}`);
                    return;
                }

                const fieldType = $field.attr('type');

                /*
                Radio Button - FIXED
                */
                if (fieldType === 'radio') {

                    const $radioToCheck = $step.find(`[name="${key}"][value="${value}"]`);

                    if ($radioToCheck.length) {
                        $radioToCheck.prop('checked', true).trigger('change');
                        console.log(`Radio set: ${key} = ${value}`);
                    }

                }

                /*
                Checkbox - FIXED
                */
                else if (fieldType === 'checkbox') {

                    $field.prop('checked', value === true || value === 'true');
                    console.log(`Checkbox set: ${key} = ${value}`);

                }

                /*
                Hidden Input - FIXED
                */
                else if (fieldType === 'hidden') {

                    $field.val(value);
                    console.log(`Hidden input set: ${key} = ${value}`);

                }

                /*
                Normal Fields - FIXED
                */
                else {

                    $field.val(value).trigger('change');
                    console.log(`Field set: ${key} = ${value}`);

                }

            });

        });

        // Restore DBA field after loading
        toggleDbaField();

        // Restore custom select text after loading
        restoreCustomSelectText();

    }

    /*
    =====================================
    Restore Custom Select Text - NEW
    =====================================
    */

    function restoreCustomSelectText() {

        $('.custom-select').each(function () {

            const $customSelect = $(this);
            const $hiddenInput = $customSelect.find('input[type="hidden"]');
            const $selectedText = $customSelect.find('.selected-text');

            if ($hiddenInput.length && $hiddenInput.val()) {

                const savedValue = $hiddenInput.val();

                // Find matching option and set text
                const $matchingOption = $customSelect.find(`.option[data-value="${savedValue}"]`);

                if ($matchingOption.length) {
                    $selectedText.text($matchingOption.text().trim());
                    $matchingOption.addClass('active');
                    console.log(`Custom select restored: ${savedValue}`);
                }
            }

        });

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
            console.log('API Result:', result);

            if (result.success) {

                /*
                Agency Data
                */
                const agencyData = result.data.agency_data || [];
                let agencyOptions = '';

                agencyData.forEach((agency) => {
                    agencyOptions += `
                        <div 
                            class="option"
                            role="option"
                            data-agency-id="${agency.agencyId}"
                            data-value="${agency.name}"
                        >
                            ${agency.name}
                        </div>
                    `;
                });

                $('.agency-select .options-container').html(agencyOptions);

                /*
                Default Agency
                */
                const savedStepOneData = JSON.parse(
                    localStorage.getItem('step_1_data_inserted') || '{}'
                );

                if (savedStepOneData && savedStepOneData.agency_location) {
                    $('.agency-select .selected-text').text(savedStepOneData.agency_location);
                    $('#agency_id').val(savedStepOneData.agency_id || '');
                } else if (agencyData.length > 0) {
                    $('.agency-select .selected-text').text(agencyData[0].name);
                    $('#agency_id').val(agencyData[0].agencyId);
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

                /*
                Default Industry
                */
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

                /*
                Initialize Custom Select After API Load
                */
                initializeCustomSelect();

                /*
                Load Saved Form Data After API
                */
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

            /*
            Open Dropdown
            */
            $selectBox.off('click').on('click', function (e) {
                e.stopPropagation();
                $customSelects.not($customSelect).removeClass('active');
                $customSelect.toggleClass('active');
            });

            /*
            Option Click
            */
            $customSelect.find('.option').off('click').on('click', function () {

                const $option = $(this);
                const value = $option.data('value') || '';

                $selectedText.text($option.text().trim());

                if ($hiddenInput.length) {
                    $hiddenInput.val(value);
                }

                /*
                Industry Fields Auto Fill
                */
                if ($customSelect.hasClass('industry-select')) {
                    $('#sic_code').val($option.data('sic') || '');
                    $('#naics_code').val($option.data('naics') || '');
                    $('#profession').val($option.data('profession') || '');
                    $('#industryCodeId').val($option.data('industrycodecategoryid') || '');
                }

                /*
                Agency ID Auto Fill
                */
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

        // Hide All Steps
        $('.form-step').removeClass('active');
        $('.step-item').removeClass('active').addClass('disabled');

        // Show Current Step
        $(`.form-step-${currentStep}`).addClass('active');
        $('.step-item').eq(currentStep - 1).addClass('active').removeClass('disabled');

        // Back Button
        if (currentStep === 1) {
            $backBtn.addClass('disabled').prop('disabled', true);
        } else {
            $backBtn.removeClass('disabled').prop('disabled', false);
        }

        // Next Button Text
        if (currentStep === totalSteps) {
            $nextBtn.html(`Submit <i class="fa-solid fa-check"></i>`);
        } else {
            $nextBtn.html(`Save & Continue <i class="fa-solid fa-arrow-right"></i>`);
        }

        console.log('Current Step Updated:', currentStep);

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

            if ($field.attr('type') === 'radio') {
                if ($field.is(':checked')) {
                    formData[name] = $field.val();
                }
            } else if ($field.attr('type') === 'checkbox') {
                formData[name] = $field.is(':checked');
            } else {
                formData[name] = $field.val();
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

        if ($nextBtn.hasClass('loading')) return;

        const stepData = getStepData();
        console.log('Step Data:', stepData);

        // Save to LocalStorage
        localStorage.setItem(
            `step_${currentStep}_data_inserted`,
            JSON.stringify(stepData)
        );

        // Loading State
        $nextBtn.addClass('loading').prop('disabled', true).text('Processing...');

        try {

            const ajaxData = new FormData();
            
            ajaxData.append('step', currentStep);
            if(currentStep == 1){
                ajaxData.append('action', 'create_policy_step');
                ajaxData.append('nonce', policy_form.nonce);
            }else {
                ajaxData.append('action', 'save_policy_step');
                ajaxData.append('nonce', policy_form.nonce);
            }
            ajaxData.append('form_data', JSON.stringify(stepData));

            const response = await fetch(policy_form.ajax_url, {
                method: 'POST',
                body: ajaxData
            });

            const result = await response.json();
            console.log('Save Result:', result);

            if (result.success) {

                if (currentStep < totalSteps) {

                    currentStep++;

                    // Save Current Step to LocalStorage
                    localStorage.setItem('current_form_step', currentStep);

                    updateSteps();

                    // Scroll to top
                    $('html, body').animate({
                        scrollTop: $('.stepper-wrapper').offset().top - 100
                    }, 500);

                } else {

                    // Final Submit - Clear LocalStorage
                    localStorage.removeItem('current_form_step');
                    for (let i = 1; i <= totalSteps; i++) {
                        localStorage.removeItem(`step_${i}_data_inserted`);
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
    Back Button Click
    =====================================
    */

    $backBtn.on('click', function (e) {

        e.preventDefault();

        if (currentStep > 1) {

            currentStep--;

            localStorage.setItem('current_form_step', currentStep);

            updateSteps();

            $('html, body').animate({
                scrollTop: $('.stepper-wrapper').offset().top - 100
            }, 500);

        }

    });

    /*
    =====================================
    Page Visibility Change - NEW
    Handles tab switching and page refresh
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

    // Restore current step from localStorage
    currentStep = parseInt(localStorage.getItem('current_form_step')) || 1;
    console.log('Restored Step:', currentStep);

    const savedStepOneData = localStorage.getItem('step_1_data_inserted');

    if (!savedStepOneData) {
        // No saved data - load from API
        loadInitialFormData();
    } else {
        // Has saved data - restore without API
        loadInitialFormData().then(() => {
            loadSavedFormData();
        });
    }

    // Update steps UI
    updateSteps();

});