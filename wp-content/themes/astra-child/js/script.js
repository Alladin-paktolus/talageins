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
    Clear LocalStorage Helper - UNIFIED
    =====================================
    */

    function clearFormStorage(fromStep = 1) {
        localStorage.removeItem('current_form_step');
        localStorage.removeItem('total_owners');
        localStorage.removeItem('total_claims');
        localStorage.removeItem('total_locations');
        for (let i = fromStep; i <= totalSteps; i++) {
            localStorage.removeItem(`step_${i}_data_inserted`);
            localStorage.removeItem(`step_${i}_api_submitted`);
            localStorage.removeItem(`step_${i}_api_response`);
        }
    }

    /*
    =====================================
    DBA Toggle
    =====================================
    */

    function toggleDbaField() {
        $(".dba-name-field").toggleClass("show", $("#dba-yes").is(":checked"));
    }

    $("#dba-yes, #dba-no").on("change", toggleDbaField);
    toggleDbaField();

    /*
    =====================================
    Generic Dependent Field Toggle - UNIFIED
    =====================================
    */

    function toggleDependentField(name, target, defaultNoSelector) {
        const isYes = $(`input[name="${name}"]:checked`).val() === 'yes';
        $(target).toggleClass('disabled', !isYes).find('input').prop('disabled', !isYes);
        if (!isYes && defaultNoSelector) {
            $(target).find(`input[type="radio"][value="no"]`).prop('checked', true);
        }
    }

    /*
    =====================================
    Restore Dynamic Sections
    =====================================
    */

    async function restoreDynamicSections() {

        console.log('=== Restoring Dynamic Sections ===');

        const currentStoredStep = localStorage.getItem('current_form_step');

        /*
        Dynamic section config
        */
        const sections = [
            {
                name: 'OWNERS',
                dataKey: 'step_3_data_inserted',
                pattern: /owner_(\d+)_/,
                countKey: 'total_owners',
                btnSelector: '#add-owner-btn',
                itemSelector: '.owners-wrapper .owner-item'
            },
            {
                name: 'CLAIMS',
                dataKey: 'step_6_data_inserted',
                pattern: null,
                countKey: 'total_claims',
                btnSelector: '#add-claim-btn',
                itemSelector: '.claim-item',
                arrayField: true
            },
            {
                name: 'LOCATIONS',
                dataKey: `step_${currentStoredStep}_data_inserted`,
                pattern: /location_(\d+)_/,
                countKey: 'total_locations',
                btnSelector: '.add-location-btn',
                itemSelector: '.locations-wrapper .location-item'
            },
            {
                name: 'BOP_LOCATIONS',
                dataKey: `step_${currentStoredStep}_data_inserted`,
                pattern: /location_(\d+)_/,
                countKey: 'total_locations',
                btnSelector: '.add-location-btn-bop',
                itemSelector: '.locations-wrapper-bop .location-item-bop'
            }
        ];

        for (const section of sections) {

            const data = JSON.parse(localStorage.getItem(section.dataKey) || '{}');
            let totalFromData = 1;

            if (section.pattern) {

                let indexes = [];
                Object.keys(data).forEach(key => {
                    const match = key.match(section.pattern);
                    if (match?.[1]) indexes.push(parseInt(match[1]));
                });
                indexes = [...new Set(indexes)];
                if (indexes.length) totalFromData = Math.max(...indexes);

            } else if (section.arrayField) {

                Object.keys(data).forEach(key => {
                    if (Array.isArray(data[key]) && data[key].length > totalFromData) {
                        totalFromData = data[key].length;
                    }
                });

            }

            const totalFromCount = parseInt(localStorage.getItem(section.countKey)) || 1;
            const total = Math.max(totalFromData, totalFromCount);

            console.log(`=== ${section.name} DEBUG ===`);
            console.log(`Total: ${total}, Button: ${$(section.btnSelector).length}`);

            let existing = $(section.itemSelector).length;

            if (total > existing) {
                const $btn = $(section.btnSelector);
                if ($btn.length) {
                    for (let i = existing; i < total; i++) {
                        $btn.trigger('click');
                        await delay(200);
                    }
                    await waitForElement(section.itemSelector, total);
                } else {
                    console.error(`❌ ${section.btnSelector} not found!`);
                }
            }

            console.log(`${section.name} after restore:`, $(section.itemSelector).length);

        }

        initializeCustomSelect();
        checkUploadedFile();

        console.log('=== Dynamic Sections Restored ===');

    }

    /*
    =====================================
    Helpers
    =====================================
    */

    function delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function waitForElement(selector, totalExpected) {
        return new Promise(resolve => {
            const interval = setInterval(() => {
                if ($(selector).length >= totalExpected) {
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

        if (type === 'file') return;

        if ($field.is(':radio')) {
            if ($field.val() == value) $field.prop('checked', true).trigger('change');
            return;
        }

        if (type === 'checkbox') {
            $field.prop('checked', value === true || value === 'true');
            return;
        }

        if (type === 'hidden' && $field.closest('.custom-select').length) {
            const $wrapper = $field.closest('.custom-select');
            $field.val(value);
            const $match = $wrapper.find('.option').filter(function () {
                return String($(this).data('value')).trim() === String(value).trim();
            });
            if ($match.length) {
                $wrapper.find('.selected-text').text($match.text().trim());
                $wrapper.find('.option').removeClass('active');
                $match.addClass('active');
            } else if (value) {
                $wrapper.find('.selected-text').text(value);
            }
            return;
        }

        if ($field.is('select')) {
            $field.val(value).trigger('change');
            return;
        }

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
            try { stepData = JSON.parse(savedData); }
            catch (e) { console.error(`Error parsing step ${stepNumber}`, e); continue; }

            const $step = $(`.form-step-${stepNumber}`);
            if (!$step.length) continue;

            Object.keys(stepData).forEach(key => {

                const value = stepData[key];

                if (Array.isArray(value)) {

                    $step.find(`[name="${key}"]`).each(function (index) {
                        if (value[index] != null) restoreField($(this), value[index]);
                    });

                } else {

                    if (value == null || value === '') return;

                    const $fields = $step.find(`[name="${key}"]`);
                    if (!$fields.length) return;

                    if ($fields.is(':radio')) {
                        $step.find(`[name="${key}"][value="${value}"]`).prop('checked', true).trigger('change');
                        return;
                    }

                    restoreField($fields.first(), value);

                }

            });

        }

        toggleDbaField();

        const selectedPolicy = $('.select-policy-type input[type="checkbox"]:checked').closest('.custom-checkbox').find('.checkbox-text').text().trim();

        if (selectedPolicy) {
            $('.page-title h1').text(selectedPolicy === 'BOP' ? "Business Owner's Policy Application" : 'General Liability Application' );
            $('.policy-form, .policy-form-carriers, .policy-business-details, .policy-operation-details, .policy-underwriting-question').hide();
            [
                '.policy-form',
                '.policy-form-carriers',
                '.policy-business-details',
                '.policy-operation-details',
                '.policy-underwriting-question'
            ].forEach(cls => {
                $(`${cls}[data-set="${selectedPolicy}"]`).show();
            });
        }
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

            const response = await fetch(policy_form.ajax_url, { method: 'POST', body: ajaxData });
            const result = await response.json();

            if (result.success) {

                const savedStepOneData = JSON.parse(localStorage.getItem('step_1_data_inserted') || '{}');

                /*
                Agency
                */
                const agencyData = result.data.agency_data || [];
                $('.agency-select .options-container').html(
                    agencyData.map(a => `<div class="option" role="option" data-agency-id="${a.agencyId}" data-value="${a.name}">${a.name}</div>`).join('')
                );

                if (savedStepOneData?.name) {
                    $('.agency-select .selected-text').text(savedStepOneData.name);
                    $('#agency_id').val(savedStepOneData.agency_id || '');
                } else if (agencyData[0]) {
                    $('.agency-select .selected-text').text(agencyData[0].agencyName);
                    $('.agency-select input[name="agency"]').val(agencyData[0].agencyName);
                    $('#agency_id').val(agencyData[0].agencyId);
                    $('.agency-select .option').first().addClass('active');
                }

                /*
                Industry
                */
                const industryData = result.data.industry_data || [];
                $('.industry-select .options-container').html(
                    industryData.map(i => `
                        <div class="option"
                            data-value="${i.name}"
                            data-sic="${i.sic || ''}"
                            data-naics="${i.naics || ''}"
                            data-profession="${i.category || ''}"
                            data-industrycodecategoryid="${i.industryCodeCategoryId || ''}"
                        >${i.name}</div>
                    `).join('')
                );

                if (savedStepOneData?.industry) {
                    $('.industry-select .selected-text').text(savedStepOneData.industry);
                    $('.industry-select input[name="industry"]').val(savedStepOneData.industry);
                    $('#sic_code').val(savedStepOneData.sic_code || '');
                    $('#naics_code').val(savedStepOneData.naics_code || '');
                    $('#profession').val(savedStepOneData.profession || '');
                    $('#industryCodeId').val(savedStepOneData.industryCodeId || '');
                } else if (industryData[0]) {
                    const fi = industryData[0];
                    $('.industry-select .selected-text').text(fi.name);
                    $('.industry-select input[name="industry"]').val(fi.name);
                    $('#sic_code').val(fi.sic || '');
                    $('#naics_code').val(fi.naics || '');
                    $('#profession').val(fi.category || '');
                    $('#industryCodeId').val(fi.industryCodeCategoryId || '');
                }

                await restoreDynamicSections();
                loadSavedFormData();
                initializeCustomSelect();
                checkUploadedFile();

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

        const $all = $('.custom-select');

        $all.each(function () {

            const $cs = $(this);
            const $box = $cs.find('.select-box');
            const $text = $cs.find('.selected-text');
            const $hidden = $cs.find('input[type="hidden"]');

            $box.off('click').on('click', function (e) {
                e.stopPropagation();
                $all.not($cs).removeClass('active');
                $cs.toggleClass('active');
            });

            $cs.find('.option').off('click').on('click', function () {

                const $opt = $(this);
                const value = $opt.data('value') || '';

                $text.text($opt.text().trim());
                if ($hidden.length) $hidden.val(value);

                if ($cs.hasClass('industry-select')) {
                    $('#sic_code').val($opt.data('sic') || '');
                    $('#naics_code').val($opt.data('naics') || '');
                    $('#profession').val($opt.data('profession') || '');
                    $('#industryCodeId').val($opt.data('industrycodecategoryid') || '');
                }

                if ($cs.hasClass('agency-select')) {
                    $('#agency_id').val($opt.data('agency-id') || '');
                }

                $cs.find('.option').removeClass('active');
                $opt.addClass('active');
                $cs.removeClass('active');

            });

        });

    }

    $(document).on('click', () => $('.custom-select').removeClass('active'));

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

        $backBtn.toggleClass('disabled', currentStep === 1).prop('disabled', currentStep === 1);

        $nextBtn.html(currentStep === totalSteps
            ? `Submit <i class="fa-solid fa-check"></i>`
            : `Save & Continue <i class="fa-solid fa-arrow-right"></i>`
        );

    }

    /*
    =====================================
    Get Step Data
    =====================================
    */

    function getStepData() {

        const $fields = $(`.form-step-${currentStep}`).find('input, select, textarea');
        let formData = {};

        $fields.each(function () {

            const $f = $(this);
            const name = $f.attr('name');
            if (!name) return;

            if (!$f.closest('.form-group, .radio-button, .claim-item, .location-item').is(':visible')) return;

            const type = $f.attr('type');
            if (type === 'file') return;
            if (type === 'hidden' && $f.closest('.custom-select').length && !$f.closest('.custom-select').is(':visible')) return;

            if (type === 'radio') {
                if (!$f.is(':checked')) return;
            } else if (type === 'checkbox') {
                formData[name] = $f.is(':checked');
                return;
            }

            const isArray = name.includes('[]');

            if (type === 'radio' && $f.is(':checked')) {
                if (isArray) { if (!formData[name]) formData[name] = []; formData[name].push($f.val()); }
                else formData[name] = $f.val();
            } else if (type !== 'radio' && type !== 'checkbox') {
                if (isArray) { if (!formData[name]) formData[name] = []; formData[name].push($f.val()); }
                else formData[name] = $f.val();
            }

        });

        return formData;

    }

    /*
    =====================================
    Next Button
    =====================================
    */

    $nextBtn.on('click', async function (e) {

        e.preventDefault();
        if (!validateCurrentStep()) return;
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
            ajaxData.append('action', currentStep == 1 ? 'create_policy_step' : 'save_policy_step');
            ajaxData.append('nonce', policy_form.nonce);
            ajaxData.append('form_data', JSON.stringify(stepData));

            const response = await fetch(policy_form.ajax_url, { method: 'POST', body: ajaxData });
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
                    clearFormStorage();
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
        $activeStep.find('.field-error').removeClass('field-error');

        $activeStep.find('.asteric').each(function () {

            const $fieldWrapper = $(this).closest('label').closest('.form-group');
            if (!$fieldWrapper.length || !$fieldWrapper.is(':visible')) return;

            const $hiddenInput = $fieldWrapper.find('.custom-select input[type="hidden"]');
            if ($hiddenInput.length) {
                if (!$hiddenInput.val().trim()) {
                    isValid = false;
                    $fieldWrapper.find('.custom-select').addClass('field-error');
                }
                return;
            }

            const $radios = $fieldWrapper.find('input[type="radio"]');
            if ($radios.length) {
                if (!$activeStep.find(`input[name="${$radios.first().attr('name')}"]:checked`).length) {
                    isValid = false;
                    $fieldWrapper.find('.toggle-btn-group').addClass('field-error');
                }
                return;
            }

            const $fileInput = $fieldWrapper.find('input[type="file"]');

            if ($fileInput.length) {
                const uploadedFile = $('#real_file_name').val();
                if (!uploadedFile) {
                    isValid = false;
                    $fieldWrapper.find('.upload-box').addClass('field-error');
                }
                return;
            }

            // Normal Inputs
            const $field = $fieldWrapper.find('input, textarea, select').not('[type="hidden"]').first();
            if ($field.length && !$field.val().trim()) {
                isValid = false;
                $field.addClass('field-error');
            }

        });

        if (!isValid) {
            const $err = $activeStep.find('.field-error').first();
            if ($err.hasClass('custom-select')) $err.find('.select-box').focus();
            else if ($err.hasClass('toggle-btn-group')) $err.find('input[type="radio"]').first().focus();
            else $err.focus();
        }

        return isValid;

    }

    /*
    =====================================
    Back Button
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
    Toggle Helpers
    =====================================
    */

    function toggleWebsiteField() {
        $('.website-url-field').toggle($('#website-yes').is(':checked'));
        if (!$('#website-yes').is(':checked')) $('.website-url-field input').val('');
    }

    function toggleClaimsSection() {
        const $wrapper = $('.claims-wrapper-main');
        const show = $('#gl-yes').is(':checked');
        $wrapper.toggle(show);
        if (!show) {
            $wrapper.find('input[type="text"], input[type="url"], textarea').val('');
            $wrapper.find('input[type="hidden"]').val('');
            $wrapper.find('.selected-text').text('Select');
            $wrapper.find('.option').removeClass('active');
            $wrapper.find('input[type="radio"]').prop('checked', false);
        }
    }

    $(document).on('change', 'input[name="website_available"]', toggleWebsiteField);
    $(document).on('change', 'input[name="past_claims"]', toggleClaimsSection);

    toggleWebsiteField();
    toggleClaimsSection();

    /*
    =====================================
    Policy Type Select
    =====================================
    */

    $(document).on('change', '.select-policy-type input[type="checkbox"]', function () {

        $('.select-policy-type input[type="checkbox"]').not(this).prop('checked', false);

        clearFormStorage(2);

        const val = $(this).closest('.custom-checkbox').find('.checkbox-text').text().trim();
        $('.page-title h1').text(val === 'BOP' ? "Business Owner's Policy Application" : 'General Liability Application' );
        $('.policy-form, .policy-form-carriers, .policy-business-details, .policy-operation, .policy-underwriting-question').hide();

        ['.policy-form', '.policy-form-carriers', '.policy-business-details', '.policy-operation', '.policy-underwriting-question'].forEach(cls => {
            $(`${cls}[data-set="${val}"]`).show();
        });

    });

    /*
    =====================================
    GL / BOP Policy Toggle
    =====================================
    */

    function togglePolicyFields(name, dataSet, show) {
        const $form = $(`.policy-form[data-set="${dataSet}"]`);
        $form.find('.form-group').not('.radio-button').toggle(show);
        if (!show) $form.find('input[type="text"], input[type="url"], textarea').val('');
    }

    $(document).on('change', 'input[name="gl_policy"]', function () {
        togglePolicyFields('gl_policy', 'GL', $(this).val() === 'yes');
    });

    $(document).on('change', 'input[name="bop-policy"]', function () {
        togglePolicyFields('bop-policy', 'BOP', $(this).val() === 'yes');
    });

    $('input[name="gl_policy"]:checked').trigger('change');
    $('input[name="bop-policy"]:checked').trigger('change');

    /*
    =====================================
    Carrier Card Toggle
    =====================================
    */

    $(document).on('change', '.checkbox-group-wrapper input[type="checkbox"]', function () {
        const carrier = $(this).val();
        const show = $(this).is(':checked');
        $(`.carrier-card[data-carrier="${carrier}"], .claim-carrier-card[data-carrier="${carrier}"]`).toggle(show);
        if (!show) {
            $(`.carrier-card[data-carrier="${carrier}"], .claim-carrier-card[data-carrier="${carrier}"]`)
                .find('input, textarea, select').val('');
        }
    });

    /*
    =====================================
    Dependent Field Toggles
    =====================================
    */

    $('input[name="epli_coverage"]').on('change', function () {
        const isYes = $(this).val() === 'yes';
        $('#epli-section .epli-dependent')
            .toggleClass('disabled', !isYes)
            .find('input, select, textarea, button').prop('disabled', !isYes);
    });

    $('input[name="hired_auto"]').on('change', function () {
        toggleDependentField('hired_auto', '.chubb-auto-coverage', true);
    });

    $('input[name="property_enhancement"]').on('change', function () {
        const isYes = $(this).val() === 'yes';
        $(this).closest('.form-group').next('.form-group').toggleClass('disabled', !isYes);
    });

    $('input[name="erisa_coverage"]').on('change', function () {
        toggleDependentField('erisa_coverage', '.erisa-dependent', true);
    });

    $('input[name="acuity_cyber"]').on('change', function () {
        toggleDependentField('acuity_cyber', '.acuity-cyber-dependent', true);
    });

    // Initial load for all toggles
    toggleDependentField('hired_auto', '.chubb-auto-coverage', true);
    toggleDependentField('erisa_coverage', '.erisa-dependent', true);
    toggleDependentField('acuity_cyber', '.acuity-cyber-dependent', true);

    $('input[name="property_enhancement"]:checked').trigger('change');

    /*
    =====================================
    File Upload
    =====================================
    */

    function checkUploadedFile() {
        const val = $('#real_file_name').val();
        if (val) {
            $('.uploaded-file-wrapper .file-name').html(val);
            $('.uploaded-file-wrapper').show();
            $('.upload-box').removeClass('field-error');
        } else {
            $('.uploaded-file-wrapper').hide();
            $('.upload-box').addClass('field-error');
        }
    }

    function removeOldFile(fileUrl) {
        if (!fileUrl) return;
        $.ajax({ url: policy_form.ajax_url, type: 'POST', data: { action: 'remove_uploaded_file', file_url: fileUrl } });
    }

    $('#fileUpload').on('change', function () {

        const file = this.files[0];
        if (!file) return;
        removeOldFile($('#uploaded_file').val());
        $('.upload-box').removeClass('field-error');
        const fd = new FormData();
        fd.append('action', 'upload_custom_file');
        fd.append('custom_file', file);
        $.ajax({
            url: policy_form.ajax_url,
            type: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.success) {
                    $('#uploaded_file').val(res.data.file_url);
                    $('#real_file_name').val(res.data.real_file_name);
                    $('.file-name').html(res.data.real_file_name);
                    $('.uploaded-file-wrapper').show();
                }
            }
        });
    });

    $('.remove-file').on('click', function () {
        removeOldFile($('#uploaded_file').val());
        $('#uploaded_file, #fileUpload').val('');
        $('#real_file_name').val('');
        $('.uploaded-file-wrapper').hide();
        $('.file-name').text('');
    });

    /*
    =====================================
    Initialize
    =====================================
    */

    currentStep = parseInt(localStorage.getItem('current_form_step')) || 1;
    updateSteps();
    loadInitialFormData();


    function toggleClaimsSection() {

        const isYes = $('#gl-yes').is(':checked');
        if (isYes) {
            $('.claims-wrapper').show();
        } else {
            $('.claims-wrapper').hide();
            /*
            =====================================
            Clear All Claim Fields
            =====================================
            */
            $('.claims-wrapper').find('input[type="text"]').val('');
            $('.claims-wrapper').find('textarea').val('');
            /*
            Radio Reset
            */
            $('.claims-wrapper').find('input[type="radio"]').prop('checked', false);

            /*
            Custom Select Reset
            */
            $('.claims-wrapper').find('.custom-select').each(function () {
                $(this).find('input[type="hidden"]').val('');
                $(this).find('.selected-text').text('Select');
                $(this).find('.option').removeClass('active');
            });
        }
    }

    /* Change Event */
    $(document).on('change', 'input[name="past_claims"]', function () {
        toggleClaimsSection();
    });

    /* Initial Load */
    toggleClaimsSection();

    $(document).on('input', 'input[inputmode="numeric"]', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});