jQuery(document).ready(function($) {

    /* ADD OWNER */

    $(document).on('click', '#add-owner-btn', function() {
        const $ownersWrapper = $(this).closest('.owners-wrapper');

        /* ONLY owner items */
        const $lastOwner = $ownersWrapper.find('.owner-item').last();

        if (!$lastOwner.length) {
            console.error('No owner block found');
            return;
        }

        /* Correct total */
        const totalOwners = $ownersWrapper.find('.owner-item').length;
        const newOwnerNumber = totalOwners + 1;

        /* Clone */
        const $newOwner = $lastOwner.clone();

        /* Update Heading */
        $newOwner.find('.owner-name h4').text(`Owner ${newOwnerNumber}`);

        /* Reset Inputs */
        $newOwner.find('input[type="text"], textarea').val('');
        $newOwner.find('input[type="hidden"]').val('');

        /* Reset Select */
        $newOwner.find('.selected-text').text('Select');
        $newOwner.find('.option').removeClass('active');

        /* Reset Radios */
        $newOwner.find('input[type="radio"]').prop('checked', false);

        /* Update Names */
        $newOwner.find('input, textarea, select').each(function() {
            const $field = $(this);
            const oldName = $field.attr('name');
            if (!oldName) return;
            const newName = oldName.replace(/owner_\d+/g, `owner_${newOwnerNumber}`);
            $field.attr('name', newName);

        });

        /* Update Radio IDs */
        $newOwner.find('input[type="radio"]').each(function() {
            const $radio = $(this);
            const oldId = $radio.attr('id');
            if (!oldId) return;
            const newId = oldId.replace(/\d+$/g,newOwnerNumber);
            $newOwner.find(`label[for="${oldId}"]`).attr('for', newId);
            $radio.attr('id', newId);
        });

        /* Default checked */
        $newOwner.find(`#exclude-payroll-${newOwnerNumber}`).prop('checked', true);

        /* Append */
        $ownersWrapper.append($newOwner);

        /* Save CORRECT count */
        const updatedCount = $ownersWrapper.find('.owner-item').length;
        localStorage.setItem( 'total_owners',updatedCount);
        console.log('Owner added:', updatedCount);
        if (typeof initializeCustomSelect === 'function') {
            initializeCustomSelect();
        }

    });

    $(document).on('click', '.owner-name .close-icon', function() {

        const $ownerCard = $(this).closest('.card-gray');

        /* Find current owner wrapper only */
        const $ownersWrapper = $ownerCard.closest('.owners-wrapper');

        /* Prevent deleting last owner */
        if ($ownersWrapper.find('.card-gray').length <= 1) {
            return;
        } 

        /* Remove Owner */
        $ownerCard.remove(); /* Re-number Remaining Owners */
        $ownersWrapper.find('.card-gray').each(function(index) {
            const ownerNumber = index + 1;
            const $card = $(this); /* Update Heading */
            $card.find('.owner-name h4').text(`Owner ${ownerNumber}`); /* Update ALL input names */
            $card.find('input, textarea, select').each(function() {
                const $field = $(this); 
                
                /* Update Name */
                const oldName = $field.attr('name');
                if (oldName) {
                    const newName = oldName.replace(/owner_\d+/g, `owner_${ownerNumber}`);
                    $field.attr('name', newName);
                } 
                
                /* Update Radio IDs */
                if ($field.attr('type') === 'radio') {
                    const oldId = $field.attr('id');
                    if (oldId) {
                        const newId = oldId.replace(/\d+$/g, ownerNumber); /* Update label FIRST */
                        $card.find(`label[for="${oldId}" ]`).attr('for', newId); /* Update input id */
                        $field.attr('id', newId);
                    }
                }
            });
        }); 
        
        /* Rebuild LocalStorage */
        let updatedOwnerData = {};
        $ownersWrapper.find('.card-gray').each(function() {
            $(this).find('input, textarea, select').each(function() {
                const $field = $(this);
                const name = $field.attr('name');
                if (!name) return; /* Skip hidden empty custom select fields */
                if ($field.attr('type') === 'hidden' && !$field.val()) {
                    return;
                } 
                
                /* Radio */
                if ($field.attr('type') === 'radio') {
                    if ($field.is(':checked')) {
                        updatedOwnerData[name] = $field.val();
                    }
                } /* Normal Fields */
                else {
                    updatedOwnerData[name] = $field.val();
                }
            });
        }); 
        /* Save Updated LocalStorage */
        var current_step = localStorage.getItem('current_form_step');
        localStorage.setItem(`step_${current_step}_data_inserted`, JSON.stringify(updatedOwnerData)); 
        
        /* Save Correct Owner Count */
        const totalOwners = $ownersWrapper.find('.owner-item').length;
        localStorage.setItem('total_owners', totalOwners);
        console.log(localStorage.getItem('total_owners'));
        console.log(' Owner removed successfully');
        console.log(updatedOwnerData);
    }); 
    /* ADD CLAIM */
    $(document).on('click', '#add-claim-btn', function() {
        const $detailsCard = $(this).closest('.details-card');
        const $lastClaim = $detailsCard.find('.claim-item').last();
        const totalClaims = $detailsCard.find('.claim-item').length;
        const newClaimNumber = totalClaims + 1;
        const $newClaim = $lastClaim.clone();
        $newClaim.attr('data-claim', newClaimNumber);
        $newClaim.find('.claim-name h4').text(`Claim #${newClaimNumber}`);
        $newClaim.find('input[type="text" ], textarea').val('');
        $newClaim.find('input[type="hidden" ]').val('');
        $newClaim.find('.custom-select').each(function() {
            const $select = $(this);
            const $hiddenInput = $select.find('input[type="hidden" ]');
            const inputName = $hiddenInput.attr('name');
            if (inputName === 'claim_policy_type[]') {
                $select.find('.selected-text').text('Select');
            } else if (inputName === 'claim_status[]') {
                $select.find('.selected-text').text('Select');
            } else if (inputName === 'loss_type[]') {
                $select.find('.selected-text').text('Select Loss Type');
            }
        });
        $newClaim.find('.option').removeClass('active');
        $newClaim.find('input[type="radio" ]').prop('checked', false);
        $newClaim.find('.toggle-btn-group').each(function() {
            const $group = $(this);
            $group.find('input[type="radio" ]').each(function() {
                const $radio = $(this);
                const oldName = $radio.attr('name');
                const oldId = $radio.attr('id');
                if (!oldName || !oldId) return;
                let baseName = oldName.replace(/_\d+$/, '');
                const newName = `${baseName}_${newClaimNumber}`;
                let newId = oldId.replace(/-\d+$/, '');
                newId = `${newId}-${newClaimNumber}`;
                $radio.attr({
                    name: newName,
                    id: newId
                });
                $group.find(`label[for="${oldId}" ]`).attr('for', newId);
            });
        });
        $newClaim.find('input[value="yes" ]').first().prop('checked', true);
        $detailsCard.find('.claim-item').last().after($newClaim);
        
        /*  Save Claim Count to LocalStorage */
        localStorage.setItem('total_claims', newClaimNumber);
        console.log(` Claim ${newClaimNumber} saved to localStorage`);
        if (typeof initializeCustomSelect === 'function') {
            initializeCustomSelect();
        }
    }); /* initializeCustomSelect */
    window.initializeCustomSelect = function() {
        const $customSelects = $('.custom-select');
        $customSelects.each(function() {
            const $customSelect = $(this);
            const $selectBox = $customSelect.find('.select-box');
            const $selectedText = $customSelect.find('.selected-text');
            const $hiddenInput = $customSelect.find('input[type="hidden" ]');
            $selectBox.off('click').on('click', function(e) {
                e.stopPropagation();
                $customSelects.not($customSelect).removeClass('active');
                $customSelect.toggleClass('active');
            });
            $customSelect.find('.option').off('click').on('click', function() {
                const $option = $(this);
                const value = $option.data('value') || '';
                $selectedText.text($option.text().trim());
                if ($hiddenInput.length) {
                    $hiddenInput.val(value);
                }
                $customSelect.find('.option').removeClass('active');
                $option.addClass('active');
                $customSelect.removeClass('active');
            });
        });
    }
    $(document).on('click', '.claim-name .close-icon', function() {
        const $claimCard = $(this).closest('.claim-item'); /* Find claims wrapper */
        const $claimsWrapper = $claimCard.closest('.claims-wrapper'); /* Prevent deleting last claim */
        if ($claimsWrapper.find('.claim-item').length <= 1) {
            return;
        } 
        /* Remove Claim */
        $claimCard.remove(); 
        /* Re-number Remaining Claims */
        $claimsWrapper.find('.claim-item').each(function(index) {
            const claimNumber = index + 1;
            const $card = $(this); /* Update claim data attr */
            $card.attr('data-claim', claimNumber); /* Update Heading */
            $card.find('.claim-name h4').text(`Claim #${claimNumber}`); /* Update ALL input names + ids */
            $card.find('input, textarea, select').each(function() {
                const $field = $(this);
                /* Update radio names Example: missed_work_3=> missed_work_1 */
                const oldName = $field.attr('name');
                if (oldName) {
                    let newName = oldName;
                    /* Only update names that end with _number */
                    if (/_\d+$/.test(oldName)) {
                        newName = oldName.replace(/_\d+$/,`_${claimNumber}`);
                        $field.attr('name', newName);
                    }
                }

                /* Update Radio IDs */
                if ($field.attr('type') === 'radio') {
                    const oldId = $field.attr('id');
                    if (oldId) {
                        const newId = oldId.replace(/-\d+$/,`-${claimNumber}`);
                        /* Update label */
                        $card.find(`label[for="${oldId}"]`).attr('for', newId);

                        /* Update id */
                        $field.attr('id', newId);
                    }
                }
            });
        });

        /* Rebuild LocalStorage */

        let updatedClaimData = {};
        $claimsWrapper.find('.claim-item').each(function() {
            $(this).find('input, textarea, select').each(function() {
                const $field = $(this);
                const name = $field.attr('name');
                if (!name) return;
                const type = $field.attr('type');
                /* Skip file input */
                if (type === 'file') {
                    return;
                }
                /* Radio */
                if (type === 'radio') {
                    if ($field.is(':checked')) {
                        if (name.includes('[]')) {
                            if (!updatedClaimData[name]) {
                                updatedClaimData[name] = [];
                            }
                            updatedClaimData[name].push($field.val());
                        } else {
                            updatedClaimData[name] = $field.val();
                        }
                    }
                }
                /* Array Fields */
                else if (name.includes('[]')) {
                    if (!updatedClaimData[name]) {
                        updatedClaimData[name] = [];
                    }
                    updatedClaimData[name].push($field.val());
                }
                /* Normal Fields */
                else {
                    updatedClaimData[name] = $field.val();
                }
            });
        });

        /* Save Updated LocalStorage */
        var current_step = localStorage.getItem('current_form_step');
        localStorage.setItem(`step_${current_step}_data_inserted`, JSON.stringify(updatedClaimData));

        /* Save Correct Claim Count */

        const totalClaims = $claimsWrapper.find('.claim-item').length;
        localStorage.setItem('total_claims', totalClaims);
        console.log(' Claim removed successfully');
        console.log(updatedClaimData);

    });



    $(document).on('click', '.add-location-btn', function() {
        const $detailsCard = $(this).closest('.locations-wrapper');
        /* Get Last Location */
        const $lastLocation = $detailsCard.find('.location-item').last();
        if (!$lastLocation.length) {
            console.error('No location block found');
            return;
        }
        /* Total Locations */
        const totalLocations = $detailsCard.find('.location-item').length;
        const newLocationNumber = totalLocations + 1;

        /* Clone */
        const $newLocation = $lastLocation.clone();

        /* Update Heading */
        $newLocation.find('.owner-name h4').text(`Location ${newLocationNumber}`);

        /* Reset Inputs */
        $newLocation.find('input[type="text"]').val('');
        $newLocation.find('textarea').val('');

        /* set Custom Select */
        $newLocation.find('.custom-select').each(function() {
            const $select = $(this);
            $select.find('.selected-text').text('Select');
            $select.find('.option').removeClass('active');
            $select.find('input[type="hidden"]').val('');
        });

        /* Update Names */
        $newLocation.find('input, textarea, select').each(function() {
            const $field = $(this);
            const oldName = $field.attr('name');
            if (!oldName) return;
            const newName = oldName.replace(/location_\d+/g, `location_${newLocationNumber}`);
            $field.attr('name', newName);

        });

        /* Append */

        $detailsCard.append($newLocation);

        /* Save Count */
        localStorage.setItem('total_locations', newLocationNumber);

        /* Reinitialize Select */
        if (typeof initializeCustomSelect === 'function') {
            initializeCustomSelect();
        }
        console.log(` Location ${newLocationNumber} added`);

    });

    $(document).on('click', '.add-location-btn-bop', function() {
        const $detailsCard = $(this).closest('.locations-wrapper-bop');
        /* Get Last Location */
        const $lastLocation = $detailsCard.find('.location-item-bop').last();
        if (!$lastLocation.length) {
            console.error('No location block found');
            return;
        }
        /* Total Locations */
        const totalLocations = $detailsCard.find('.location-item-bop').length;
        const newLocationNumber = totalLocations + 1;

        /* Clone */
        const $newLocation = $lastLocation.clone();

        /* Update Heading */
        $newLocation.find('.owner-name h4').text(`Location ${newLocationNumber}`);

        /* Reset Inputs */
        $newLocation.find('input[type="text"]').val('');
        $newLocation.find('textarea').val('');

        /* set Custom Select */
        $newLocation.find('.custom-select').each(function() {
            const $select = $(this);
            $select.find('.selected-text').text('Select');
            $select.find('.option').removeClass('active');
            $select.find('input[type="hidden"]').val('');
        });

        /* Update Names */
        $newLocation.find('input, textarea, select').each(function() {
            const $field = $(this);
            const oldName = $field.attr('name');
            if (!oldName) return;
            const newName = oldName.replace(/location_\d+/g, `location_${newLocationNumber}`);
            $field.attr('name', newName);

        });

        /* Append */
        $lastLocation.after($newLocation);

        /* Save Count */
        localStorage.setItem('total_locations', newLocationNumber);

        /* Reinitialize Select */
        if (typeof initializeCustomSelect === 'function') {
            initializeCustomSelect();
        }
        console.log(` Location ${newLocationNumber} added`);

    });


    /* REMOVE LOCATION */

    $(document).on('click', '.location-item .close-icon', function() {
        const $locationCard = $(this).closest('.location-item');
        const $locationsWrapper = $locationCard.closest('.locations-wrapper');
        /* Prevent deleting last location */

        if ($locationsWrapper.find('.location-item').length <= 1) {
            return;
        } 
        /* Remove Location */
        $locationCard.remove(); /* Re-number Locations */
        $locationsWrapper.find('.location-item').each(function(index) {
            const locationNumber = index + 1;
            const $card = $(this); /* Update Heading*/
            $card.find('.owner-name h4').text(`Location ${locationNumber}`); /* Update Names */
            $card.find('input, textarea, select').each(function() {
                const $field = $(this);
                const oldName = $field.attr('name');
                if (!oldName) return;
                const newName = oldName.replace(/location_\d+/g, `location_${locationNumber}`);
                $field.attr('name', newName);
            });
        });
        /* Rebuild LocalStorage */
        let updatedLocationData = {};
        $locationsWrapper.find('.location-item').each(function() {
            $(this).find('input, textarea, select').each(function() {
                const $field = $(this);
                const name = $field.attr('name');
                if (!name) return; /* Skip empty hidden select */
                if ($field.attr('type') === 'hidden' && !$field.val()) {
                    return;
                }
                updatedLocationData[name] = $field.val();
            });
        }); 
        /* Save Data */
        const current_step = localStorage.getItem('current_form_step');
        localStorage.setItem(`step_${current_step}_data_inserted`, JSON.stringify(updatedLocationData)); /* Save Total Count */
        const totalLocations = $locationsWrapper.find('.location-item').length;
        localStorage.setItem('total_locations', totalLocations);
        console.log(' Location removed successfully');
    });
});