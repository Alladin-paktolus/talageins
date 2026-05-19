jQuery(document).ready(function ($) {

    /*    Variables    */

    let currentStep = parseInt(localStorage.getItem('current_form_step')) || 1;
    const totalSteps = 8;
    const $form = $('#multiStepForm');
    const $nextBtn = $('.next-btn');
    const $backBtn = $('.back-btn');

    /*    DBA Toggle    */

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

    /*    Restore Dynamic Sections    */
   

    async function restoreDynamicSections() {

        console.log('=== Restoring Dynamic Sections ===');

        /* OWNERS - FIXED   */
        let current_step = localStorage.getItem('current_form_step');
        // Get owner data from step 3
        const ownerData = JSON.parse(
            localStorage.getItem(`step_${current_step}_data_inserted`) || '{}'
        );

        let ownerIndexes = [];

        Object.keys(ownerData).forEach(function (key) {
            const match = key.match(/owner_(\d+)_/);
            if (match && match[1]) {
                ownerIndexes.push(parseInt(match[1]));
            }
        });

        ownerIndexes = [...new Set(ownerIndexes)];

        const ownersByIndex = ownerIndexes.length ? Math.max(...ownerIndexes) : 1;
        const ownersByCount = parseInt(localStorage.getItem('total_owners')) || 1;
        const totalOwners = Math.max(ownersByIndex, ownersByCount);

        console.log('=== OWNERS DEBUG ===');
        console.log('ownersByIndex:', ownersByIndex);
        console.log('ownersByCount:', ownersByCount);
        console.log('totalOwners:', totalOwners);
        console.log('Owner button found:', $('#add-owner-btn').length);
        //console.log('Existing owners:', $('.details-card .card-gray').length);
        console.log('Existing owners:', $('.owners-wrapper .owner-item').length);

        let existingOwners = $('.owners-wrapper .owner-item').length;
        if (totalOwners > existingOwners) {

            for (let i = existingOwners; i < totalOwners; i++) {

                console.log(`Clicking add-owner-btn for owner ${i + 1}`);

                //  Try multiple selectors to find the button
                const $ownerBtn = $('#add-owner-btn').length
                    ? $('#add-owner-btn')
                    : $('[data-action="add-owner"]');

                if ($ownerBtn.length) {
                    $ownerBtn.trigger('click');
                    await delay(200); // Wait after each click
                } else {
                    console.error(' #add-owner-btn not found!');
                }

            }

            // Wait for owners to appear in DOM
            await waitForElement('.owners-wrapper .owner-item', totalOwners);

        }

        console.log('Owners after restore:', $('.owners-wrapper .owner-item').length);

        /* CLAIMS - FIXED   */
        const claimData = JSON.parse(
            localStorage.getItem('step_6_data_inserted') || '{}'
        );

        let claimsByData = 1;

        Object.keys(claimData).forEach(function (key) {
            if (Array.isArray(claimData[key])) {
                if (claimData[key].length > claimsByData) {
                    claimsByData = claimData[key].length;
                }
            }
        });

        const claimsByCount = parseInt(localStorage.getItem('total_claims')) || 1;
        const totalClaims = Math.max(claimsByData, claimsByCount);

        console.log('=== CLAIMS DEBUG ===');
        console.log('claimsByData:', claimsByData);
        console.log('claimsByCount:', claimsByCount);
        console.log('totalClaims:', totalClaims);
        console.log('Claim button found:', $('#add-claim-btn').length);
        console.log('Existing claims:', $('.claim-item').length);

        let existingClaims = $('.claim-item').length;

        if (totalClaims > existingClaims) {

            for (let i = existingClaims; i < totalClaims; i++) {

                console.log(`Clicking add-claim-btn for claim ${i + 1}`);

                $('#add-claim-btn').trigger('click');

                await delay(200);

            }

            await waitForElement('.claim-item', totalClaims);

        }

        console.log('Claims after restore:', $('.claim-item').length);

        /* LOCATIONS - FIXED */

        const locationData = JSON.parse(
            localStorage.getItem(`step_${current_step}_data_inserted`) || '{}'
        );

        let locationIndexes = [];

        /* Find all location indexes */
        Object.keys(locationData).forEach(function (key) {
            const match = key.match(/location_(\d+)_/);
            if (match && match[1]) {
                locationIndexes.push(parseInt(match[1]));
            }
        });

        locationIndexes = [...new Set(locationIndexes)];
        const locationsByIndex = locationIndexes.length ? Math.max(...locationIndexes) : 1;

        const locationsByCount = parseInt(localStorage.getItem('total_locations')) || 1;

        const totalLocations = Math.max(locationsByIndex, locationsByCount);

        console.log('=== LOCATIONS DEBUG ===');
        console.log('locationsByIndex:', locationsByIndex);
        console.log('locationsByCount:', locationsByCount);
        console.log('totalLocations:', totalLocations);
        console.log( 'Location button found:', $('.add-location-btn').length );

        console.log('Existing locations:', $('.locations-wrapper .location-item').length  );

        let existingLocations = $('.locations-wrapper .location-item').length;

        /* Add missing locations */

        if (totalLocations > existingLocations) {
            for ( let i = existingLocations; i < totalLocations; i++ ) {
                console.log( `Clicking add-location-btn for location ${i + 1}` );
                const $locationBtn = $('.add-location-btn');
                if ($locationBtn.length) {
                    $locationBtn.trigger('click');
                    await delay(200);
                } else {
                    console.error(' .add-location-btn not found!' );
                }
            }
            /* Wait until all location items exist */
            await waitForElement('.locations-wrapper .location-item',totalLocations );
        }

        console.log( 'Locations after restore:', $('.locations-wrapper .location-item').length);

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
    /* Restore Single Field   */

    function restoreField($field, value) {

        const type = $field.attr('type');
         /Skip File Input*/
         if (type === 'file') {
             // Browser security restriction 
             // File input value cannot be restored 
            return;
        }

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
                console.log(` Custom select restored: ${value}`);
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

    /*    Load Saved Form Data    */

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
                        console.log(` Array field restored: ${key}[${index}] = ${fieldValue}`);
                    });
                }

                /*
                Single Values
                */
                else {
                    if (value === null || value === undefined || value === '') return;
                    const $fields = $step.find(`[name="${key}"]`);
                    if (!$fields.length) {
                        console.warn(` Field not found: ${key} in step ${stepNumber}`);
                        return;
                    }
                    // Radio
                    if ($fields.is(':radio')) {
                        $step.find(`[name="${key}"][value="${value}"]`)
                            .prop('checked', true)
                            .trigger('change');
                        console.log(` Radio restored: ${key} = ${value}`);
                        return;
                    }
                    restoreField($fields.first(), value);
                    console.log(` Field restored: ${key} = ${value}`);
                }
            });

        }

        // Restore DBA after all fields loaded
        toggleDbaField();
        console.log('=== Restore Complete ===');

    }

    /*    Load API Data    */

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

                // initializeCustomSelect();

                // // Wait for dynamic sections to be created
                // // then fill all fields
                // await restoreDynamicSections();

                // // Reinitialize custom select for new cloned sections
                // initializeCustomSelect();

                // // Now fill all fields including cloned ones
                // loadSavedFormData();

                await restoreDynamicSections();
                loadSavedFormData();
                initializeCustomSelect();

            }

        } catch (error) {
            console.error('API Error:', error);
        } finally {
            $('.form-loader').removeClass('active');
        }

    }

    /*    Custom Select Initialize    */

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

    /*    Close Dropdown Outside Click    */

    $(document).on('click', function () {
        $('.custom-select').removeClass('active');
    });

    /*    Update Steps    */

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

    /*    Get Step Data    */

   function getStepData() {

        const $activeStep = $(`.form-step-${currentStep}`);
        const $fields = $activeStep.find('input, select, textarea');

        let formData = {};

        $fields.each(function () {

            const $field = $(this);
            const name = $field.attr('name');

            if (!name) return;

            /* SKIP HIDDEN SECTIONS */
            const $wrapper = $field.closest('.form-group, .radio-button, .claim-item, .location-item');

            if (!$wrapper.is(':visible')) {
                return;
            }

            const type = $field.attr('type');

            /* Skip File Input  */
            if (type === 'file') {
                return;
            }

            /* Skip Hidden Inputs If Section Hidden */
            if (type === 'hidden' && !$field.closest('.custom-select').is(':visible')) {
                return;
            }

            /* Radio */
            if (type === 'radio') {
                if ($field.is(':checked')) {
                    if (name.includes('[]')) {
                        if (!formData[name]) {
                            formData[name] = [];
                        }
                        formData[name].push($field.val());
                    } else {
                        formData[name] = $field.val();
                    }
                }
            }

            /*
            Checkbox
            */
            else if (type === 'checkbox') {
                formData[name] = $field.is(':checked');
            }

            /*
            Normal Fields
            */
            else {
                if (name.includes('[]')) {
                    if (!formData[name]) {
                        formData[name] = [];
                    }
                    formData[name].push($field.val());
                } else {
                    formData[name] = $field.val();
                }
            }
        });
        return formData;

    }

    /*    Next Button Click    */

    $nextBtn.on('click', async function (e) {

        e.preventDefault();
        if (!validateCurrentStep()) {
            console.log('Validation failed for step', currentStep);
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
                    localStorage.removeItem('total_owners'); //  Add this
                    localStorage.removeItem('total_claims'); //  Add this
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

    /*    Validate Current Step    */

    function validateCurrentStep() {

        let isValid = true;

        const $activeStep = $(`.form-step-${currentStep}`);

        /*
        Remove old errors
        */

        $activeStep.find('.field-error').removeClass('field-error');

        /* Validate Required Fields   */

        $activeStep.find('.asteric').each(function () {

            const $label = $(this).closest('label');

            let $fieldWrapper = $label.closest('.form-group');

            /*  Find related field */

            if ( !$fieldWrapper.length || !$fieldWrapper.is(':visible')) {
                return;
            }

            if ( !$fieldWrapper.length || !$fieldWrapper.is(':visible')) {
                return;
            }

            /*   Custom Select   */

            const $hiddenInput = $fieldWrapper.find('.custom-select input[type="hidden"]');

            if ($hiddenInput.length) {

                if (!$hiddenInput.val().trim()) {
                    isValid = false;
                    $fieldWrapper.find('.custom-select').addClass('field-error');
                }

                return;
            }

            /*            Radio Buttons            */

            const $radios = $fieldWrapper.find('input[type="radio"]');

            if ($radios.length) {

                const radioName = $radios.first().attr('name');

                if (!$activeStep.find(`input[name="${radioName}"]:checked`).length) {

                    isValid = false;

                    $fieldWrapper.find('.toggle-btn-group').addClass('field-error');

                }

                return;
            }

            /*            Normal Inputs / Textarea            */

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

    /*    Back Button Click    */

    $backBtn.on('click', function (e) {

        e.preventDefault();

        if (currentStep > 1) {
            currentStep--;
            localStorage.setItem('current_form_step', currentStep);
            updateSteps();
            $('html, body').animate({ scrollTop: $('.stepper-wrapper').offset().top - 100 }, 500);
        }

    });

    /*    Page Visibility Change    */

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

    /*    Initialize    */

    currentStep = parseInt(localStorage.getItem('current_form_step')) || 1;
    updateSteps();
    loadInitialFormData();


    function toggleWebsiteField() {
        if ($('#website-yes').is(':checked')) {
            $('.website-url-field').show();
        } else {
            $('.website-url-field').hide();
            $('.website-url-field input').val('');
        }

    }

    /* Radio Change */

    $(document).on('change','input[name="website_available"]',function () {
            toggleWebsiteField();
        }
    );

   

    function toggleClaimsSection() {
        const $claimsWrapper = $('.claims-wrapper-main');
        if ($('#gl-yes').is(':checked')) {
            $claimsWrapper.show();
        } else {
            /* Hide Section */
            $claimsWrapper.hide();
            /* Clear All Inputs */
            $claimsWrapper.find('input[type="text"], input[type="url"], textarea').val('');

            /* Clear Hidden Inputs */
            $claimsWrapper.find('input[type="hidden"]').val('');

            /* Reset Custom Select Text */
            $claimsWrapper.find('.selected-text').text('Select');

            /* Remove Active Option */
            $claimsWrapper.find('.option').removeClass('active');

            /* Uncheck Radios */
            $claimsWrapper.find('input[type="radio"]').prop('checked', false);
        }
    }

    $(document).on('change','input[name="past_claims"]',function () {
        toggleClaimsSection();
    });

     /* Page Load */
    toggleWebsiteField();
    toggleClaimsSection();

    /* policy type select step 2 BOP GL WC Cyber */
    $(document).on('change', '.select-policy-type input[type="checkbox"]', function () {
        $('.select-policy-type input[type="checkbox"]').not(this).prop('checked', false);
        /* Get selected value */
        localStorage.removeItem('current_form_step');
        localStorage.removeItem('total_owners'); //  Add this
        localStorage.removeItem('total_claims'); //  Add this
        for (let i = 2; i <= 8; i++) {
            localStorage.removeItem(`step_${i}_data_inserted`);
            localStorage.removeItem(`step_${i}_api_submitted`);
            localStorage.removeItem(`step_${i}_api_response`);
        }
        const selectedValue = $(this).closest('.custom-checkbox').find('.checkbox-text').text().trim();
        $('.policy-form').hide();
        $('.policy-form-carriers').hide();
        $('.policy-business-details').hide();
        $('.policy-operation').hide();
        $('.policy-underwriting-question').hide();
        /* Show matching form */
        $(`.policy-form[data-set="${selectedValue}"]`).show();
        $(`.policy-form-carriers[data-set="${selectedValue}"]`).show();
        $(`.policy-business-details[data-set="${selectedValue}"]`).show();
        $(`.policy-operation[data-set="${selectedValue}"]`).show();
        $(`.policy-underwriting-question[data-set="${selectedValue}"]`).show();
    });


    /* GL YES / NO */
    $(document).on('change', 'input[name="gl_policy"]', function () {
        const selectedValue = $(this).val();
        if (selectedValue === 'no') {
            $('.policy-form[data-set="GL"]').find('.form-group').not('.radio-button').hide();
            /* Clear values */
            $('.policy-form[data-set="GL"]').find('input[type="text"], input[type="url"], textarea').val('');

        } else {
            $('.policy-form[data-set="GL"]').find('.form-group').not('.radio-button').show();
        }

    });


    /* BOP YES / NO */
    $(document).on('change', 'input[name="bop-policy"]', function () {
        const selectedValue = $(this).val();
        if (selectedValue === 'no') {
            $('.policy-form[data-set="BOP"]').find('.form-group').not('.radio-button').hide();

            /* Clear values */
            $('.policy-form[data-set="BOP"]').find('input[type="text"], input[type="url"], textarea').val('');
        } else {
            $('.policy-form[data-set="BOP"]').find('.form-group').not('.radio-button').show();
        }
    });


    /* On page load */
    $(document).ready(function () {
        $('input[name="gl_policy"]:checked').trigger('change');
        $('input[name="bop-policy"]:checked').trigger('change');
    });


    $(document).on('change', '.checkbox-group-wrapper input[type="checkbox"]', function () {
        const carrier = $(this).val();
        if ($(this).is(':checked')) {
            console.log(carrier);
            $(`.carrier-card[data-carrier="${carrier}"]`).slideDown();
            $(`.claim-carrier-card[data-carrier="${carrier}"]`).slideDown();
        } else {
            $(`.carrier-card[data-carrier="${carrier}"]`).slideUp();
            $(`.claim-carrier-card[data-carrier="${carrier}"]`).slideUp();
            /* Optional: clear values */
            $(`.carrier-card[data-carrier="${carrier}"]`).find('input, textarea, select').val('');
            $(`.claim-carrier-card[data-carrier="${carrier}"]`).find('input, textarea, select').val('');
        }
    });

    // EPLI Coverage toggle
    $('input[name="epli_coverage"]').on('change', function () {
        // All related fields
        const $epliFields = $('#epli-section .epli-dependent');
        if ($(this).val() === 'yes') {
            // Remove disabled class
            $epliFields.removeClass('disabled');

            // Enable inputs/selects
            $epliFields.find('input, select, textarea, button').prop('disabled', false);

            // Remove accessibility disabled attrs
            $epliFields.find('[aria-disabled="true"]').attr('aria-disabled', 'false');

        } else {

            // Add disabled class
            $epliFields.addClass('disabled');

            // Disable inputs/selects
            $epliFields.find('input, select, textarea, button').prop('disabled', true);

            // Add accessibility disabled attrs
            $epliFields.find('[aria-disabled="false"]').attr('aria-disabled', 'true');
        }
    });

    function toggleChubbAutoCoverage() {

        const selectedValue = $('input[name="hired_auto"]:checked').val();

        if (selectedValue === 'yes') {
            $('.chubb-auto-coverage').removeClass('disabled').find('input').prop('disabled', false);
        } else {
            $('.chubb-auto-coverage').addClass('disabled').find('input').prop('disabled', true);
            // Default NO checked
            $('.chubb-auto-coverage').find('input[type="radio"][value="no"]').prop('checked', true);
        }
    }

    // On radio change
    $('input[name="hired_auto"]').on('change', function () {
        toggleChubbAutoCoverage();
    });


    function togglePropertyEnhancement() {

        const selectedValue = $('input[name="property_enhancement"]:checked').val();

        // Target only next disabled form-group
        const targetField = $('input[name="property_enhancement"]')
            .closest('.form-group')
            .next('.form-group');

        if (selectedValue === 'yes') {

            targetField.removeClass('disabled');

        } else {

            targetField.addClass('disabled');

        }
    }

    // On change
    $('input[name="property_enhancement"]').on('change', function () {
        togglePropertyEnhancement();
    });

    // Initial load
    toggleChubbAutoCoverage();
    togglePropertyEnhancement();


    function erisaDependentToggle(name, target) {
        const isYes = $(`input[name="${name}"]:checked`).val() === 'yes';
        $(target).toggleClass('disabled', !isYes).find('input').prop('disabled', !isYes);
        if (!isYes) {
            $(target).find('input[type="radio"][value="no"]').prop('checked', true);
        }
    }

    // ERISA Coverage
    $('input[name="erisa_coverage"]').on('change', () =>
        erisaDependentToggle('erisa_coverage', '.erisa-dependent')
    );

    // Initial Load
    erisaDependentToggle('erisa_coverage', '.erisa-dependent');



    function acuityCyberDependentToggle(name, target) {
        const isYes = $(`input[name="${name}"]:checked`).val() === 'yes';

        $(target).toggleClass('disabled', !isYes).find('input').prop('disabled', !isYes);

        // Default NO checked when disabled
        if (!isYes) {
            $(target).find('input[type="radio"][value="no"]').prop('checked', true);
        }
    }

    // Acuity Cyber
    $('input[name="acuity_cyber"]').on('change', () =>
        acuityCyberDependentToggle('acuity_cyber', '.acuity-cyber-dependent')
    );

    // Initial Load
    acuityCyberDependentToggle('acuity_cyber', '.acuity-cyber-dependent');
});