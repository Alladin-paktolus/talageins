jQuery(document).ready(function ($) {

    /*
    =====================================
    ADD OWNER
    =====================================
    */

    $(document).on('click', '#add-owner-btn', function () {

        const $detailsCard = $(this).closest('.details-card');

        const $lastOwner = $detailsCard.find('.card-gray').last();

        const totalOwners = $detailsCard.find('.card-gray').length;

        const newOwnerNumber = totalOwners + 1;

        /*
        =====================================
        Clone Owner
        =====================================
        */

        const $newOwner = $lastOwner.clone();

        /*
        =====================================
        Update Heading
        =====================================
        */

        $newOwner.find('.owner-name h4')
            .text(`Owner ${newOwnerNumber}`);

        /*
        =====================================
        Clear Text Inputs
        =====================================
        */

        $newOwner.find('input[type="text"]')
            .val('');

        /*
        =====================================
        Clear Hidden Inputs
        =====================================
        */

        $newOwner.find('input[type="hidden"]')
            .val('');

        /*
        =====================================
        Reset Custom Select Text
        =====================================
        */

        $newOwner.find('.selected-text').each(function () {

            $(this).text('Select');

        });

        /*
        =====================================
        Remove Active Options
        =====================================
        */

        $newOwner.find('.option')
            .removeClass('active');

        /*
        =====================================
        Reset Radios
        =====================================
        */

        $newOwner.find('input[type="radio"]')
            .prop('checked', false);

        /*
        =====================================
        Update Input Names
        =====================================
        */

        $newOwner.find('input').each(function () {

            const $input = $(this);

            const oldName = $input.attr('name');

            if (!oldName) return;

            const newName = oldName.replace(
                /owner_\d+/,
                `owner_${newOwnerNumber}`
            );

            $input.attr('name', newName);

        });

        /*
        =====================================
        Update Radio IDs + Labels
        =====================================
        */

        $newOwner.find('.toggle-btn-group').each(function () {

            const $group = $(this);

            $group.find('input[type="radio"]').each(function () {

                const $radio = $(this);

                const oldId = $radio.attr('id');

                if (!oldId) return;

                const newId = oldId.replace(
                    /\d+$/,
                    newOwnerNumber
                );

                /*
                =====================================
                Update Radio ID
                =====================================
                */

                $radio.attr('id', newId);

                /*
                =====================================
                Update Label FOR
                =====================================
                */

                $group.find(`label[for="${oldId}"]`)
                    .attr('for', newId);

            });

        });

        /*
        =====================================
        Append New Owner
        =====================================
        */

        $detailsCard.append($newOwner);

        /*
        =====================================
        Reinitialize Custom Select
        =====================================
        */

        if (typeof initializeCustomSelect === 'function') {
            initializeCustomSelect();
        }

    });




    /*
    =====================================
    ADD CLAIM
    =====================================
    */

    $(document).on('click', '#add-claim-btn', function () {

        const $detailsCard = $(this).closest('.details-card');

        const $lastClaim = $detailsCard.find('.claim-item').last();

        const totalClaims = $detailsCard.find('.claim-item').length;

        const newClaimNumber = totalClaims + 1;

        /*
        =====================================
        Clone Last Claim
        =====================================
        */

        const $newClaim = $lastClaim.clone();

        /*
        =====================================
        Update Heading
        =====================================
        */

        $newClaim.attr('data-claim', newClaimNumber);

        $newClaim.find('.owner-name h4')
            .text(`Claim #${newClaimNumber}`);

        /*
        =====================================
        Clear Text Inputs
        =====================================
        */

        $newClaim.find('input[type="text"], textarea')
            .val('');

        /*
        =====================================
        Clear Hidden Inputs
        =====================================
        */

        $newClaim.find('input[type="hidden"]')
            .val('');

        /*
        =====================================
        Reset Custom Select Text
        =====================================
        */

        $newClaim.find('.custom-select').each(function () {

            const $select = $(this);

            const $hiddenInput = $select.find('input[type="hidden"]');

            const inputName = $hiddenInput.attr('name');

            if (inputName === 'claim_policy_type[]') {

                $select.find('.selected-text')
                    .text('Select');

            }

            else if (inputName === 'claim_status[]') {

                $select.find('.selected-text')
                    .text('Select');

            }

            else if (inputName === 'loss_type[]') {

                $select.find('.selected-text')
                    .text('Select Loss Type');

            }

        });

        /*
        =====================================
        Remove Active Option
        =====================================
        */

        $newClaim.find('.option')
            .removeClass('active');

        /*
        =====================================
        Reset Radios
        =====================================
        */

        $newClaim.find('input[type="radio"]')
            .prop('checked', false);

        /*
        =====================================
        Update Radio Names + IDs
        =====================================
        */

        $newClaim.find('.toggle-btn-group').each(function () {

            const $group = $(this);

            $group.find('input[type="radio"]').each(function () {

                const $radio = $(this);

                const oldName = $radio.attr('name');

                const oldId = $radio.attr('id');

                if (!oldName || !oldId) return;

                /*
                =====================================
                Create Unique Name
                =====================================
                */

                let baseName = oldName.replace(/_\d+$/, '');

                const newName = `${baseName}_${newClaimNumber}`;

                /*
                =====================================
                Create Unique ID
                =====================================
                */

                let newId = oldId.replace(/-\d+$/, '');

                newId = `${newId}-${newClaimNumber}`;

                /*
                =====================================
                Update Radio
                =====================================
                */

                $radio.attr({
                    name: newName,
                    id: newId
                });

                /*
                =====================================
                Update Label FOR
                =====================================
                */

                $group.find(`label[for="${oldId}"]`)
                    .attr('for', newId);

            });

        });

        /*
        =====================================
        Default YES Checked
        =====================================
        */

        $newClaim.find('input[value="yes"]')
            .first()
            .prop('checked', true);

        /*
        =====================================
        Append Claim at Bottom
        =====================================
        */

        $detailsCard.find('.claim-item')
            .last()
            .after($newClaim);

        /*
        =====================================
        Reinitialize Custom Select
        =====================================
        */

        if (typeof initializeCustomSelect === 'function') {
            initializeCustomSelect();
        }

    });

    window.initializeCustomSelect = function () {

        const $customSelects = $('.custom-select');

        $customSelects.each(function () {

            const $customSelect = $(this);
            const $selectBox = $customSelect.find('.select-box');
            const $selectedText = $customSelect.find('.selected-text');
            const $hiddenInput = $customSelect.find('input[type="hidden"]');

            /*
            =====================================
            Open Dropdown
            =====================================
            */

            $selectBox.off('click').on('click', function (e) {

                e.stopPropagation();

                $customSelects.not($customSelect)
                    .removeClass('active');

                $customSelect.toggleClass('active');

            });

            /*
            =====================================
            Option Click
            =====================================
            */

            $customSelect.find('.option').off('click').on('click', function () {

                const $option = $(this);

                const value = $option.data('value') || '';

                $selectedText.text($option.text().trim());

                if ($hiddenInput.length) {
                    $hiddenInput.val(value);
                }

                $customSelect.find('.option')
                    .removeClass('active');

                $option.addClass('active');

                $customSelect.removeClass('active');

            });

        });

    }

});