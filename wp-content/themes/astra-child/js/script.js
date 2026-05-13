/* DBA SHOW / HIDE */
jQuery(document).ready(function ($) {
    function toggleDbaField() {
        if ($("#dba-yes").is(":checked")) {
            $(".dba-name-field").addClass("show");
        } else {
            $(".dba-name-field").removeClass("show");
        }
    }

    // On Change
    $("#dba-yes,#dba-no").on("change", function () {
        toggleDbaField();
    });
    // On Page Load
    toggleDbaField();

    
    /*
    =====================================
    Custom Select
    =====================================
    */

    const $customSelects = $('.custom-select');

    $customSelects.each(function () {

        const $customSelect = $(this);
        const $selectBox = $customSelect.find('.select-box');
        const $options = $customSelect.find('.option');
        const $selectedText = $customSelect.find('.selected-text');
        const $hiddenInput = $customSelect.find('input[type="hidden"]');

        // Open Dropdown
        $selectBox.on('click', function (e) {

            e.stopPropagation();

            $customSelects.not($customSelect).removeClass('active');

            $customSelect.toggleClass('active');

        });

        // Select Option
        $options.on('click', function () {

            const $option = $(this);

            const value = $option.data('value') || $option.text().trim();

            // Update Selected Text
            $selectedText.text($option.text());

            // Update Hidden Input
            if ($hiddenInput.length) {

                $hiddenInput.val(value);

            }

            // Active Class
            $options.removeClass('active');

            $option.addClass('active');

            // Close Dropdown
            $customSelect.removeClass('active');

        });

    });

    // Close Dropdown Outside Click
    $(document).on('click', function () {

        $customSelects.removeClass('active');

    });


    /*
    =====================================
    Multi Step Form
    =====================================
    */

    let currentStep = 1;

    const totalSteps = 8;

    const $form = $('#multiStepForm');

    const $nextBtn = $('.next-btn');

    const $backBtn = $('.back-btn');


    /*
    =====================================
    Update Steps
    =====================================
    */

    function updateSteps() {

        // Hide All Steps
        $('.form-step').removeClass('active');

        // Remove Active Step Menu
        $('.step-item')
            .removeClass('active')
            .addClass('disabled');

        // Show Current Step
        $(`.form-step-${currentStep}`)
            .addClass('active');

        // Activate Current Step Menu
        $('.step-item')
            .eq(currentStep - 1)
            .addClass('active')
            .removeClass('disabled');

        // Back Button
        if (currentStep > 1) {

            $backBtn
                .addClass('active')
                .prop('disabled', false);

        } else {

            $backBtn
                .removeClass('active')
                .prop('disabled', true);

        }

        // Next Button Text
        if (currentStep === totalSteps) {

            $nextBtn.html(`
                Submit
                <i class="fa-solid fa-check"></i>
            `);

        } else {

            $nextBtn.html(`
                Save & Continue
                <i class="fa-solid fa-arrow-right"></i>
            `);

        }

    }


    /*
    =====================================
    Get Current Step Form Data
    =====================================
    */

    function getStepData() {

        const $activeStep = $(`.form-step-${currentStep}`);

        const $fields = $activeStep.find(
            'input, select, textarea'
        );

        let formData = {};

        $fields.each(function () {

            const $field = $(this);

            const name = $field.attr('name');

            if (!name) return;

            // Radio
            if ($field.attr('type') === 'radio') {

                if ($field.is(':checked')) {

                    formData[name] = $field.val();

                }

            }

            // Checkbox
            else if ($field.attr('type') === 'checkbox') {

                formData[name] = $field.is(':checked');

            }

            // Normal Fields
            else {

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

        // Prevent Multiple Click
        if ($nextBtn.hasClass('loading')) {
            return;
        }

        // Get Current Step Data
        const stepData = getStepData();

        console.log('Current Step:', currentStep);

        console.log('Step Data:', stepData);

        // Loading State
        $nextBtn
            .addClass('loading')
            .prop('disabled', true)
            .text('Processing...');

        try {

            /*
            =====================================
            AJAX Request
            =====================================
            */

            const ajaxData = new FormData();

            ajaxData.append(
                'action',
                'save_policy_step'
            );

            ajaxData.append(
                'nonce',
                policy_form.nonce
            );

            ajaxData.append(
                'step',
                currentStep
            );

            ajaxData.append(
                'form_data',
                JSON.stringify(stepData)
            );

            const response = await fetch(
                policy_form.ajax_url,
                {
                    method: 'POST',
                    body: ajaxData
                }
            );

            const result = await response.json();

            console.log(result);

            /*
            =====================================
            Success
            =====================================
            */

            if (result.success) {

                // Move Next Step
                if (currentStep < totalSteps) {

                    currentStep++;

                    updateSteps();

                     $('html, body').animate({

                        scrollTop: $('.stepper-wrapper').offset().top - 100

                    }, 500);

                } else {

                    // Final Submit
                    $form.submit();

                }

            } else {

                alert(
                    result.data?.message ||
                    'Something went wrong.'
                );

            }

        } catch (error) {

            console.error(error);

            alert('API Error');

        } finally {

            $nextBtn
                .removeClass('loading')
                .prop('disabled', false);

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

            updateSteps();

        }

    });


    /*
    =====================================
    Initialize
    =====================================
    */

    updateSteps();

});