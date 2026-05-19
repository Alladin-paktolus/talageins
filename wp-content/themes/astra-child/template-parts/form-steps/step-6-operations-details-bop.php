<div class="details-card gap-32 locations-wrapper-bop">
    <div class="policy-claim-history" data-set="BOP">
        <div class="heading-section">
            <div class="form-title">
                <h2>Operations</h2>
                <p>Add each business location. Carrier-specific building <br>questions appear based on your selected insurers.</p>
            </div>
            <button type="button" class="btn btn-outline add-location-btn-bop">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add Location
            </button>
        </div>
        <div class="card-gray-border">
            <div class="gap-26 location-item-bop mtb-24">
                <div class="owner-name full-width mb-16">
                    <h4>Location 1</h4>
                    <i class="fa fa-times close-icon" aria-hidden="true"></i>
                </div>
                <div class="form-grid full-width">
                    <!-- Street Address -->
                    <div class="form-group">
                        <label for="street-address-1">Street Address <span class="asteric" aria-hidden="true">*</span>
                        </label>
                        <input id="street-address-1" type="text" name="street_address" value="" placeholder=""
                            autocomplete="street-address" aria-required="true" required />
                    </div>
                    <!-- Apartment -->
                    <div class="form-group">
                        <label for="address-line2-1">Apartment / Suite / Other</label>
                        <input id="address-line2-1" type="text" name="address_line2" value=""
                            autocomplete="address-line2" />
                    </div>
                    <!-- City -->
                    <div class="form-group">
                        <label for="city-1">City <span class="asteric" aria-hidden="true">*</span>
                        </label>
                        <input id="city-1" type="text" name="city" value="" autocomplete="address-level2"
                            aria-required="true" required />
                    </div>
                    <!-- State -->
                    <div class="form-group">
                        <label id="state-label-1" for="state-select-1">State <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <div class="custom-select full-width">
                            <div id="state-select-1" class="select-box" tabindex="0" role="combobox"
                                aria-haspopup="listbox" aria-expanded="false"
                                aria-labelledby="state-label-1 state-selected-1" aria-controls="state-options-1">
                                <span class="selected-text" id="state-selected-1">AZ</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox" id="state-options-1">
                                <div class="option" role="option" data-value="AZ" aria-selected="true">AZ</div>
                            </div>
                            <input type="hidden" name="state" value="AZ" />
                        </div>
                    </div>
                    <!-- Zip Code -->
                    <div class="form-group">
                        <label for="zip-code-1">Zip Code <span class="asteric" aria-hidden="true">*</span>
                        </label>
                        <input id="zip-code-1" type="text" name="zip_code" value="" inputmode="numeric"
                            autocomplete="postal-code" aria-required="true" required />
                    </div>
                    <div class="form-group">
                        <label></label>
                    </div>
                    <!-- Full Time Employees -->
                    <div class="form-group">
                        <label for="full-time-employee-1">Full-Time Employees (excl. sub) <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <input id="full-time-employee-1" type="text" name="full_time_employees" value=""
                            inputmode="numeric" aria-required="true" required />
                    </div>
                    <!-- Part Time Employees -->
                    <div class="form-group">
                        <label for="part-time-employee-1">Part-Time Employees (excl. sub) <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <input id="part-time-employee-1" type="text" name="part_time_employees" value=""
                            inputmode="numeric" aria-required="true" required />
                    </div>
                    <!-- Building Limit -->
                    <div class="form-group">
                        <label id="building-limit-label">Building Limit <span class="asteric">*</span>
                        </label>
                        <input type="text" name="building_limit" value="" placeholder="$"
                            aria-labelledby="building-limit-label" aria-required="true"
                            aria-describedby="building-limit-note" />
                        <p class="note-lbl" id="building-limit-note">Building OR BPP required</p>
                    </div>
                    <!-- BPP Limit -->
                    <div class="form-group">
                        <label id="bpp-limit-label">Business Personal Property Limit <span class="asteric">*</span>
                        </label>
                        <input type="text" name="bpp_limit" value="" placeholder="$" aria-labelledby="bpp-limit-label"
                            aria-required="true" aria-describedby="bpp-limit-note" />
                        <p class="note-lbl" id="bpp-limit-note">Building OR BPP required</p>
                    </div>
                    <!-- Own Property -->
                    <fieldset class="form-group full-width radio-button" aria-labelledby="own-property-label">
                        <legend id="own-property-label">
                            <div>Do you own this property? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="own_property" id="own-yes" value="yes" checked class="sr-only" />
                            <label for="own-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="own_property" id="own-no" value="no" class="sr-only" />
                            <label for="own-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <!-- Sprinkler -->
                    <fieldset class="form-group full-width radio-button" aria-labelledby="property-sprinkler-label">
                        <legend id="property-sprinkler-label">
                            <div>Is property sprinkler equipped? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="property_sprinkler" id="property-sprinkler-yes" value="yes"
                                checked class="sr-only" />
                            <label for="property-sprinkler-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="property_sprinkler" id="property-sprinkler-no" value="no"
                                class="sr-only" />
                            <label for="property-sprinkler-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <!-- Construction Type -->
                    <div class="form-group">
                        <label>Construction Type <span class="asteric">*</span>
                        </label>
                        <div class="custom-select full-width" tabindex="0" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-controls="frame-options" aria-label="Frame select dropdown">
                            <div class="select-box" aria-hidden="true">
                                <span class="selected-text" id="frame-selected">Frame</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" id="frame-options" role="listbox">
                                <div class="option" role="option" data-value="Frame" tabindex="-1" aria-selected="true">
                                    Frame </div>
                            </div>
                            <input type="hidden" name="construction_type" value="Frame" />
                        </div>
                    </div>
                    <!-- Fire Alarm Type -->
                    <div class="form-group">
                        <label>Fire Alarm Type <span class="asteric">*</span>
                        </label>
                        <div class="custom-select full-width" tabindex="0" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-controls="centralstation-options"
                            aria-label="Central Station select dropdown">
                            <div class="select-box" aria-hidden="true">
                                <span class="selected-text" id="centralstation-selected">Central Station without
                                    keys</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" id="centralstation-options" role="listbox">
                                <div class="option" role="option" data-value="Central Station without keys"
                                    tabindex="-1" aria-selected="true">Central Station without keys</div>
                            </div>
                            <input type="hidden" name="fire_alarm_type" value="Central Station without keys" />
                        </div>
                    </div>
                    <!-- Stories -->
                    <div class="form-group">
                        <label for="stories">Number of Stories <span class="asteric">*</span>
                        </label>
                        <input id="stories" type="text" name="stories" value="" aria-required="true" />
                    </div>
                    <!-- Year Built -->
                    <div class="form-group">
                        <label id="year-built-label">Year Built <span class="asteric">*</span>
                        </label>
                        <div class="custom-select full-width" tabindex="0" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-labelledby="year-built-label" aria-controls="year-built-options">
                            <div class="select-box" aria-hidden="true">
                                <span class="selected-text">YYYY</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox" id="year-built-options">
                                <div class="option" role="option" data-value="YYYY" tabindex="-1">YYYY</div>
                            </div>
                            <input type="hidden" name="year_built" value="" />
                        </div>
                    </div>
                    <!-- Roofing Year -->
                    <div class="form-group">
                        <label id="roofing-year-label">Roofing Improvement Year <span class="asteric">*</span>
                        </label>
                        <div class="custom-select full-width" tabindex="0" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-labelledby="roofing-year-label"
                            aria-controls="roofing-year-options">
                            <div class="select-box" aria-hidden="true">
                                <span class="selected-text">YYYY</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox" id="roofing-year-options">
                                <div class="option" role="option" data-value="YYYY" tabindex="-1">YYYY</div>
                            </div>
                            <input type="hidden" name="roofing_year" value="" />
                        </div>
                    </div>
                    <!-- Wiring Year -->
                    <div class="form-group">
                        <label id="wiring-year-label">Wiring Improvement Year <span class="asteric">*</span>
                        </label>
                        <div class="custom-select full-width" tabindex="0" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-labelledby="wiring-year-label"
                            aria-controls="wiring-year-options">
                            <div class="select-box" aria-hidden="true">
                                <span class="selected-text">YYYY</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox" id="wiring-year-options">
                                <div class="option" role="option" data-value="YYYY" tabindex="-1">YYYY</div>
                            </div>
                            <input type="hidden" name="wiring_year" value="" />
                        </div>
                    </div>
                    <!-- Heating Year -->
                    <div class="form-group">
                        <label id="heating-year-label">Heating Improvement Year <span class="asteric">*</span>
                        </label>
                        <div class="custom-select full-width" tabindex="0" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-labelledby="heating-year-label"
                            aria-controls="heating-year-options">
                            <div class="select-box" aria-hidden="true">
                                <span class="selected-text">YYYY</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox" id="heating-year-options">
                                <div class="option" role="option" data-value="YYYY" tabindex="-1">YYYY</div>
                            </div>
                            <input type="hidden" name="heating_year" value="" />
                        </div>
                    </div>
                    <!-- Plumbing Year -->
                    <div class="form-group">
                        <label id="plumbing-year-label">Plumbing Improvement Year <span class="asteric">*</span>
                        </label>
                        <div class="custom-select full-width" tabindex="0" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-labelledby="plumbing-year-label"
                            aria-controls="plumbing-year-options">
                            <div class="select-box" aria-hidden="true">
                                <span class="selected-text">YYYY</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox" id="plumbing-year-options">
                                <div class="option" role="option" data-value="YYYY" tabindex="-1">YYYY</div>
                            </div>
                            <input type="hidden" name="plumbing_year" value="" />
                        </div>
                    </div>
                    <!-- Square Feet -->
                    <div class="form-group">
                        <label for="sqft">Square Feet (Rented/Occupied) <span class="asteric">*</span>
                        </label>
                        <input id="sqft" type="text" name="square_feet" value="" aria-required="true" />
                    </div>
                    <!-- Payroll -->
                    <div class="form-group">
                        <label for="payroll">Payroll <span class="asteric">*</span>
                        </label>
                        <input id="payroll" type="text" name="payroll" value="" placeholder="$" aria-required="true" />
                    </div>
                    <!-- Roof Type -->
                    <div class="form-group">
                        <label id="roof-type-label">Roofing Type (All carriers) <span class="asteric">*</span>
                        </label>
                        <div class="custom-select full-width" tabindex="0" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-labelledby="roof-type-label" aria-controls="roof-type-options">
                            <div class="select-box" aria-hidden="true">
                                <span class="selected-text">Choose one</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox" id="roof-type-options">
                                <div class="option" role="option" data-value="Choose one" tabindex="-1">Choose one</div>
                            </div>
                            <input type="hidden" name="roof_type" value="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- CNA Building Questions -->
            <div class="card-gray claim-carrier-card" data-carrier="CNA">
                <h4 class="mb-24">CNA — Building Questions</h4>
                <div class="form-grid full-width">
                    <fieldset class="form-group full-width radio-button" aria-labelledby="single-occupancy-label">
                        <legend id="single-occupancy-label">
                            <div>Is this a single-occupancy building? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="single_occupancy" id="single-occupancy-yes" value="yes" checked
                                class="sr-only" />
                            <label for="single-occupancy-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="single_occupancy" id="single-occupancy-no" value="no"
                                class="sr-only" />
                            <label for="single-occupancy-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button disabled"
                        aria-labelledby="multi-occupancy-label">
                        <legend id="multi-occupancy-label">
                            <div>Is this multi-occupancy building high hazard? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="multi_occupancy" id="multi-occupancy-yes" value="yes"
                                class="sr-only" />
                            <label for="multi-occupancy-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="multi_occupancy" id="multi-occupancy-no" value="no" checked
                                class="sr-only" />
                            <label for="multi-occupancy-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="occupied-sqft">Square feet of building occupied (all tenants) <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <input id="occupied-sqft" type="text" name="occupied_sqft" value="" />
                    </div>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-grid full-width">
                    <fieldset class="form-group full-width radio-button" aria-labelledby="basement-label">
                        <legend id="basement-label">
                            <div>Are there any basements at this location? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="basements" id="basements-yes" value="yes" 
                                class="sr-only" />
                            <label for="basements-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="basements" id="basements-no" value="no" checked class="sr-only" />
                            <label for="basements-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <div class="form-group disabled">
                        <label for="basement-count">How many basements?</label>
                        <input id="basement-count" type="text" name="basement_count" value=""/>
                    </div>
                    <div class="form-group disabled">
                        <label for="finished-basement">Total sq ft of finished basement</label>
                        <input id="finished-basement" type="text" name="finished_basement_sqft" value="" />
                    </div>
                    <div class="form-group disabled">
                        <label for="unfinished-basement">Total sq ft of unfinished basement</label>
                        <input id="unfinished-basement" type="text" name="unfinished_basement_sqft" value="" />
                    </div>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-grid full-width">
                    <fieldset class="form-group full-width radio-button" aria-labelledby="common-area-label">
                        <legend id="common-area-label">
                            <div>Does the occupant maintain common areas? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="maintain_common" id="maintain-yes" value="yes" checked
                                class="sr-only" />
                            <label for="maintain-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="maintain_common" id="maintain-no" value="no" class="sr-only" />
                            <label for="maintain-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="hydrant-distance">Distance (ft) to closest fire hydrant</label>
                        <input id="hydrant-distance" type="text" name="hydrant_distance" value="" />
                    </div>
                    <div class="form-group">
                        <label for="station-distance">Distance (mi) to closest fire station</label>
                        <input id="station-distance" type="text" name="station_distance" value="" />
                    </div>
                </div>
            </div>
            <!-- Acuity Building Questions -->
            <div class="card-gray claim-carrier-card" data-carrier="Acuity">
                <h4 class="mb-24">Acuity — Building Questions</h4>
                <div class="form-grid full-width">
                    <div class="form-group">
                        <label for="acuity-sqft-unoccupied">Square feet of building unoccupied <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <input id="acuity-sqft-unoccupied" type="text" name="acuity_sqft_unoccupied" value="" />
                    </div>
                    <div class="form-group">
                        <label>Roof construction type</label>
                        <div class="custom-select full-width">
                            <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox"
                                aria-expanded="false">
                                <span class="selected-text">Select one</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox">
                                <div class="option" role="option" data-value="Select one" tabindex="-1">Select one</div>
                            </div>
                            <input type="hidden" name="acuity_roof_construction" value="" />
                        </div>
                    </div>
                    <fieldset class="form-group full-width radio-button" aria-labelledby="basement-label">
                        <legend id="basement-label">
                            <div>Are there any basements? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="any_basements" id="any-basements-yes" value="yes" checked
                                class="sr-only" />
                            <label for="any-basements-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="any_basements" id="any-basements-no" value="no" class="sr-only" />
                            <label for="any-basements-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button disabled" aria-labelledby="basement-finished-label">
                        <legend id="basement-finished-label">
                            <div>Is this basement finished? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="basements_finished" id="basements-finished-yes" value="yes"
                                checked class="sr-only" />
                            <label for="basements-finished-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="basements_finished" id="basements-finished-no" value="no"
                                class="sr-only" />
                            <label for="basements-finished-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-grid full-width">
                    <div class="form-group">
                        <label for="gross-sales">Total gross sales at this location <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <input id="gross-sales" type="text" name="gross_sales" value="" />
                    </div>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-grid full-width">
                    <fieldset class="form-group full-width radio-button" aria-labelledby="unoccupied-label">
                        <legend id="unoccupied-label">
                            <div>Any portion expected to be unoccupied/vacant during policy? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="unoccupied" id="unoccupied-yes" value="yes" checked
                                class="sr-only" />
                            <label for="unoccupied-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="unoccupied" id="unoccupied-no" value="no" class="sr-only" />
                            <label for="unoccupied-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button" aria-labelledby="unrepaired-label">
                        <legend id="unrepaired-label">
                            <div>Any prior unrepaired roof losses? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="unrepaired" id="unrepaired-yes" value="yes" checked
                                class="sr-only" />
                            <label for="unrepaired-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="unrepaired" id="unrepaired-no" value="no" class="sr-only" />
                            <label for="unrepaired-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label>Current roof valuation <span class="asteric" aria-hidden="true">*</span>
                        </label>
                        <div class="custom-select full-width">
                            <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox">
                                <span class="selected-text">ACV</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox">
                                <div class="option" role="option" data-value="ACV" tabindex="-1">ACV</div>
                            </div>
                            <input type="hidden" name="roof_valuation" value="ACV" />
                        </div>
                        <p class="note-lbl" role="note">Activity / NCCI state code</p>
                    </div>
                    <fieldset class="form-group full-width radio-button" aria-labelledby="roof-cosmetic-label">
                        <legend id="roof-cosmetic-label">
                            <div>Roof cosmetic exclusion? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="roof_cosmetic" id="Roof-cosmetic-yes" value="yes" checked
                                class="sr-only" />
                            <label for="Roof-cosmetic-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="roof_cosmetic" id="Roof-cosmetic-no" value="no" class="sr-only" />
                            <label for="Roof-cosmetic-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-grid full-width">
                    <div class="form-group">
                        <label for="hydrant-ft">Distance (ft) to closest fire hydrant</label>
                        <input id="hydrant-ft" type="text" name="acuity_hydrant_distance" value="" />
                    </div>
                    <div class="form-group">
                        <label for="fire-station-mi">Distance (mi) to closest fire station</label>
                        <input id="fire-station-mi" type="text" name="acuity_station_distance" value="" />
                    </div>
                    <div class="form-group">
                        <label>Roof geometry <span class="asteric" aria-hidden="true">*</span>
                        </label>
                        <div class="custom-select full-width">
                            <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox">
                                <span class="selected-text">Complex</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox">
                                <div class="option" role="option" data-value="Complex" tabindex="-1">Complex</div>
                            </div>
                            <input type="hidden" name="roof_geometry" value="Complex" />
                        </div>
                        <p class="note-lbl" role="note">Activity / NCCI state code</p>
                    </div>
                    <div class="form-group">
                        <label for="other-occupancy">Sq ft of building occupied by others <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <input id="other-occupancy" type="text" name="other_occupancy_sqft" value="" />
                    </div>
                    <div class="form-group full-width">
                        <label for="occupancy-desc">Describe the occupancy at this location <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <textarea id="occupancy-desc" name="occupancy_description" class="textarea"
                            aria-required="true"></textarea>
                    </div>
                </div>
            </div>
            <!-- Liberty Mutual Building Questions -->
            <div class="card-gray claim-carrier-card" data-carrier="Liberty Mutual">
                <h4 class="mb-24" tabindex="0">Liberty Mutual — Building Questions</h4>
                <div class="form-grid full-width">
                    <div class="form-group">
                        <label for="roof-construction">Roof construction type</label>
                        <div class="custom-select full-width" id="roof-construction-select">
                            <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox"
                                aria-expanded="false">
                                <span class="selected-text">Select one</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox">
                                <div class="option" role="option" data-value="Select one" tabindex="0">Select one</div>
                            </div>
                            <input type="hidden" name="lm_roof_construction" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sprinkler">Sprinkler percent coverage <span class="asteric">*</span>
                        </label>
                        <input id="sprinkler" type="text" name="lm_sprinkler_coverage" value="" placeholder=""
                            aria-required="true" />
                    </div>
                    <div class="form-group">
                        <label for="sqft-occupied">Sq ft of building occupied by others <span class="asteric">*</span>
                        </label>
                        <input id="sqft-occupied" type="text" name="lm_sqft_occupied" value="" aria-required="true" />
                    </div>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-group full-width gap-24">
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Glass > 50% of exterior construction? <span class="asteric">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="glass_exterior" id="glass-yes" value="yes" class="sr-only"
                                checked />
                            <label for="glass-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="glass_exterior" id="glass-no" value="no" class="sr-only" />
                            <label for="glass-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Commercial cooking ops producing smoke/grease? <span class="asteric">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="commercial_cooking" id="cooking-yes" value="yes" class="sr-only"
                                checked />
                            <label for="cooking-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="commercial_cooking" id="cooking-no" value="no" class="sr-only" />
                            <label for="cooking-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Spray paint / welding / manufacturing operations? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="spray_welding" id="spray-yes" value="yes" class="sr-only"
                                checked />
                            <label for="spray-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="spray_welding" id="spray-no" value="no" class="sr-only" />
                            <label for="spray-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Building occupied insured with one of our underwriting companies? <span
                                    class="asteric">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="building_occupied" id="building-yes" value="yes" class="sr-only"
                                checked />
                            <label class="toggle-btn" for="building-yes">YES</label>
                            <input type="radio" name="building_occupied" id="building-no" value="no" class="sr-only" />
                            <label class="toggle-btn" for="building-no">NO</label>
                        </div>
                    </fieldset>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-grid full-width">
                    <div class="form-group">
                        <label for="coinsurance-building">Coinsurance % for Building <span class="asteric">*</span>
                        </label>
                        <input id="coinsurance-building" type="text" name="coinsurance_building" value=""
                            aria-required="true" />
                    </div>
                    <div class="form-group">
                        <label for="coinsurance-bpp">Coinsurance % for BPP <span class="asteric">*</span>
                        </label>
                        <input id="coinsurance-bpp" type="text" name="coinsurance_bpp" value="" aria-required="true" />
                    </div>
                    <div class="form-group">
                        <label>Occupancy Type Category</label>
                        <div class="custom-select full-width">
                            <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox"
                                aria-expanded="false">
                                <span class="selected-text">Select Category</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox">
                                <div class="option" role="option" data-value="Retail" tabindex="0">Retail</div>
                                <div class="option" role="option" data-value="Office" tabindex="0">Office</div>
                                <div class="option" role="option" data-value="Restaurant" tabindex="0">Restaurant</div>
                                <div class="option" role="option" data-value="Warehouse" tabindex="0">Warehouse</div>
                            </div>
                            <input type="hidden" name="occupancy_category" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Occupancy Type</label>
                        <div class="custom-select full-width">
                            <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox"
                                aria-expanded="false">
                                <span class="selected-text">Select Occupancy Type</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox">
                                <div class="option" role="option" data-value="Owner Occupied" tabindex="0">Owner
                                    Occupied
                                </div>
                                <div class="option" role="option" data-value="Tenant Occupied" tabindex="0">Tenant
                                    Occupied
                                </div>
                                <div class="option" role="option" data-value="Mixed Occupancy" tabindex="0">Mixed
                                    Occupancy
                                </div>
                            </div>
                            <input type="hidden" name="occupancy_type" value="" />
                        </div>
                    </div>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-grid full-width">
                    <fieldset class="form-group full-width radio-button">
                        <legend>Premises protected by Central Station alarm?</legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="central_station_alarm" id="central-alarm-yes" value="yes"
                                class="sr-only" checked />
                            <label class="toggle-btn" for="central-alarm-yes">YES</label>
                            <input type="radio" name="central_station_alarm" id="central-alarm-no" value="no"
                                class="sr-only" />
                            <label class="toggle-btn" for="central-alarm-no">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>Mgmt policy requiring UL 300 system?</legend>
                        <div class="toggle-btn-group">
                            <input type="radio" name="ul300_system" id="ul300-yes" value="yes" class="sr-only"
                                checked />
                            <label class="toggle-btn" for="ul300-yes">YES</label>
                            <input type="radio" name="ul300_system" id="ul300-no" value="no" class="sr-only" />
                            <label class="toggle-btn" for="ul300-no">NO</label>
                        </div>
                    </fieldset>
                </div>
                <hr class="full-width mtb-24" />
                <div class="form-grid full-width">
                    <div class="form-group full-width">
                        <label for="unoccupied-details">Details regarding unoccupied areas of the building <span
                                class="asteric">*</span>
                        </label>
                        <textarea class="textarea" id="unoccupied-details" name="unoccupied_details"
                            aria-required="true"></textarea>
                    </div>
                    <div class="form-group full-width">
                        <label for="hazard-details">Details regarding hazardous operations (spray paint, welding,
                            etc.)</label>
                        <textarea class="textarea" id="hazard-details" name="hazard_details" aria-disabled="true"
                            disabled></textarea>
                    </div>
                </div>
            </div>
            <!-- Chubb Building Questions -->
            <div class="card-gray claim-carrier-card" data-carrier="Chubb">
                <h4 class="mb-24" tabindex="0">Chubb — Building Questions</h4>
                <div class="form-grid full-width">
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Operations include 24-hour exposure? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="exposure_24" id="exposure-yes" value="yes" class="sr-only"
                                checked />
                            <label for="exposure-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="exposure_24" id="exposure-no" value="no" class="sr-only" />
                            <label for="exposure-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Electrical panels updated from fuses to circuit breakers?</div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="circuit_breakers" id="circuit-yes" value="yes" class="sr-only"
                                checked />
                            <label for="circuit-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="circuit_breakers" id="circuit-no" value="no" class="sr-only" />
                            <label for="circuit-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>(NY only) Hurricane resistant laminated glass windows/doors? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="hurricane_glass" id="hurricane-glass-yes" value="yes"
                                class="sr-only" checked />
                            <label for="hurricane-glass-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="hurricane_glass" id="hurricane-glass-no" value="no"
                                class="sr-only" />
                            <label for="hurricane-glass-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Third floor used solely for storage or vacant? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="third_floor" id="third-yes" value="yes" class="sr-only" checked />
                            <label for="third-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="third_floor" id="third-no" value="no" class="sr-only" />
                            <label for="third-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Building has at least two fully enclosed stairwells? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="stairwells" id="stairs-yes" value="yes" class="sr-only" checked />
                            <label for="stairs-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="stairwells" id="stairs-no" value="no" class="sr-only" />
                            <label for="stairs-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Is the building vacant? <span class="asteric" aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="building_vacant" id="vacant-yes" value="yes" class="sr-only"
                                checked />
                            <label for="vacant-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="building_vacant" id="vacant-no" value="no" class="sr-only" />
                            <label for="vacant-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Functioning central burglar alarm with monitoring contract? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="burglar_alarm" id="alarm-yes" value="yes" class="sr-only"
                                checked />
                            <label for="alarm-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="burglar_alarm" id="alarm-no" value="no" class="sr-only" />
                            <label for="alarm-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Exterior security cameras covering all entry points & lots? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="security_cameras" id="camera-yes" value="yes" class="sr-only"
                                checked />
                            <label for="camera-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="security_cameras" id="camera-no" value="no" class="sr-only" />
                            <label for="camera-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Continuous exterior lighting between sunset and sunrise? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="exterior_lighting" id="light-yes" value="yes" class="sr-only"
                                checked />
                            <label for="light-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="exterior_lighting" id="light-no" value="no" class="sr-only" />
                            <label for="light-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Automatic fire alarm protecting entire building, central station? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="fire_alarm" id="fire-yes" value="yes" class="sr-only" checked />
                            <label for="fire-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="fire_alarm" id="fire-no" value="no" class="sr-only" />
                            <label for="fire-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Central station alarm + security cameras at location? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="alarm_camera" id="alarmcam-yes" value="yes" class="sr-only"
                                checked />
                            <label for="alarmcam-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="alarm_camera" id="alarmcam-no" value="no" class="sr-only" />
                            <label for="alarmcam-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                    <fieldset class="form-group full-width radio-button">
                        <legend>
                            <div>Building retrofitted to meet earthquake building codes? <span class="asteric"
                                    aria-hidden="true">*</span>
                            </div>
                        </legend>
                        <div class="toggle-btn-group" role="radiogroup">
                            <input type="radio" name="earthquake_codes" id="quake-yes" value="yes" class="sr-only"
                                checked />
                            <label for="quake-yes" class="toggle-btn">YES</label>
                            <input type="radio" name="earthquake_codes" id="quake-no" value="no" class="sr-only" />
                            <label for="quake-no" class="toggle-btn">NO</label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!-- AmTrust Building Questions -->
            <div class="card-gray claim-carrier-card" data-carrier="AmTrust">
                <h4 class="mb-24" tabindex="0">AmTrust — Building Questions</h4>
                <div class="form-grid full-width">
                    <div class="form-group full-width">
                        <label id="roof-label">Roof construction type <span class="asteric" aria-hidden="true">*</span>
                        </label>
                        <div class="custom-select full-width" role="combobox" aria-labelledby="roof-label"
                            aria-haspopup="listbox" aria-expanded="false" tabindex="0">
                            <div class="select-box" role="button" tabindex="0"
                                aria-label="Select roof construction type">
                                <span class="selected-text">Select one</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox">
                                <div class="option" role="option" data-value="Select one" tabindex="0">Select one</div>
                            </div>
                            <input type="hidden" name="amtrust_roof_construction" value="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Travelers Building Questions -->
            <div class="card-gray claim-carrier-card" data-carrier="Travelers">
                <h4 class="mb-24" tabindex="0">Travelers — Building Questions</h4>
                <div class="form-grid full-width">
                    <div class="form-group">
                        <label id="sprinkler-label">Sprinkler System Type <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <div class="custom-select full-width" role="combobox" aria-labelledby="sprinkler-label"
                            aria-haspopup="listbox" aria-expanded="false" tabindex="0">
                            <div class="select-box" role="button" tabindex="0"
                                aria-label="Select sprinkler system type">
                                <span class="selected-text">None</span>
                                <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                            </div>
                            <div class="options-container" role="listbox">
                                <div class="option" role="option" data-value="None" tabindex="0">None</div>
                            </div>
                            <input type="hidden" name="travelers_sprinkler_type" value="None" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sprinkler-percent">Sprinkler Percent Coverage <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="sprinkler-percent" name="travelers_sprinkler_coverage" value=""
                            placeholder="" aria-required="true" />
                    </div>
                </div>
            </div>
            <!-- Rainbow Building Questions -->
            <div class="card-gray claim-carrier-card" data-carrier="Rainbow">
                <h4 class="mb-24" tabindex="0">Rainbow — Building Questions</h4>
                <div class="form-grid full-width">
                    <div class="form-group full-width">
                        <label for="tiib-limit">Tenant's Improvements & Betterments Limit <span class="asteric"
                                aria-hidden="true">*</span>
                        </label>
                        <input type="text" id="tiib-limit" name="tiib_limit" value="" placeholder=""
                            aria-required="true" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>