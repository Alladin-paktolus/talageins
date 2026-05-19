<div class="form-step form-step-7 policy-underwriting-question" data-set="BOP">
    <div class="form-container">
        <header class="form-heading">
            <h2 id="optional-coverages-title"> Optional Coverages & Underwriting Questions </h2>
            <p class="sub-title" id="optional-coverages-desc"> Carrier-specific add-ons and underwriting disclosures.
                Sections appear based on the carriers you selected. </p>
        </header>
        <div class="mt-20" aria-labelledby="optional-coverages-heading">
            <h3 id="optional-coverages-heading">Optional Coverages</h3>
            <hr class="mt-9" />
        </div>
        <div class="card-gray gap-24" aria-labelledby="epli-title">
            <h4 id="epli-title"> Chubb — Employment Practices Liability (EPLI) </h4>
            <div class="form-grid full-width" id="epli-section">
                <!-- EPLI Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Does the applicant want EPLI Coverage?<span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="epli_coverage" value="yes" id="epli-yes" class="sr-only" />
                        <label for="epli-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="epli_coverage" value="no" id="epli-no" checked class="sr-only" />
                        <label for="epli-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Chubb EPLI aggregate limit -->
                <div class="form-group disabled epli-dependent">

                    <label id="epli-limit-label">
                        Chubb EPLI aggregate limit
                    </label>

                    <div class="custom-select full-width" role="combobox" tabindex="0" aria-disabled="true"
                        aria-haspopup="listbox" aria-expanded="false"
                        aria-labelledby="epli-limit-label epli-limit-value" aria-controls="epli-limit-options">

                        <div class="select-box" aria-hidden="true">
                            <span class="selected-text" id="epli-limit-value">
                                $25,000
                            </span>

                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <div class="options-container" id="epli-limit-options" role="listbox" aria-hidden="true">
                            <div class="option" role="option" aria-selected="true">
                                $25,000
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Prior EPL claim -->
                <fieldset class="form-group full-width radio-button disabled epli-dependent">
                    <legend> Prior EPL claim or aware of circumstance? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="prior_claim" value="yes" id="prior-yes" class="sr-only" />
                        <label for="prior-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="prior_claim" value="no" id="prior-no" checked class="sr-only" />
                        <label for="prior-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Layoffs -->
                <fieldset class="form-group full-width radio-button disabled epli-dependent">
                    <legend> Layoffs / mergers / acquisitions in past 5 yrs or next 2? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="layoffs" value="yes" id="layoff-yes" class="sr-only" />
                        <label for="layoff-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="layoffs" value="no" id="layoff-no" checked class="sr-only" />
                        <label for="layoff-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Retroactive date -->
                <div class="form-group disabled epli-dependent">
                    <label for="retroactive-date">Retroactive date</label>
                    <input id="retroactive-date" type="date" aria-readonly="true" aria-describedby="retroactive-help" />
                    <small id="retroactive-help"> This field is not editable for the selected configuration </small>
                </div>
                <!-- Continuous EPLI -->
                <fieldset class="form-group full-width radio-button disabled epli-dependent">
                    <legend> Continuous EPLI coverage? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="continuous_epli" value="yes" id="continuous-yes" class="sr-only" />
                        <label for="continuous-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="continuous_epli" value="no" id="continuous-no" checked
                            class="sr-only" />
                        <label for="continuous-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Previous EPLI limit -->
                <fieldset class="form-group full-width radio-button disabled epli-dependent">
                    <legend> Has applicant had an EPLI limit previously? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="previous_limit" value="yes" id="limit-yes" class="sr-only" />
                        <label for="limit-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="previous_limit" value="no" id="limit-no" checked class="sr-only" />
                        <label for="limit-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Reason for increasing -->
                <div class="form-group disabled epli-dependent">

                    <label id="epli-reason-label">
                        Reason for increasing EPLI limit <span class="asteric" aria-hidden="true">*</span>
                    </label>

                    <div class="custom-select full-width" role="combobox" aria-haspopup="listbox" aria-expanded="false"
                        aria-disabled="true" aria-labelledby="epli-reason-label epli-reason-selected"
                        aria-controls="epli-reason-options" tabindex="0">

                        <div class="select-box" aria-hidden="true">
                            <span class="selected-text" id="epli-reason-selected">
                                Increased Employee Count
                            </span>
                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <div class="options-container" role="listbox" id="epli-reason-options">
                            <div class="option" role="option" aria-selected="true">
                                Increased Employee Count
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- gray-card for Chubb — Hired Auto & Non-Owned Auto -->
        <div class="card-gray gap-24">
            <h4>Chubb — Hired Auto & Non-Owned Auto</h4>
            <div class="form-grid full-width">
                <!-- Hired Auto / Non-Owned Auto Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Hired Auto / Non-Owned Auto Coverage?
                            <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="hired_auto" value="yes" id="hired-auto-yes" checked class="sr-only" />
                        <label for="hired-auto-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="hired_auto" value="no" id="hired-auto-no" class="sr-only" />
                        <label for="hired-auto-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Delivery Services -->
                <fieldset class="form-group full-width radio-button chubb-auto-coverage">
                    <legend class="radio-btn-label mb-0">
                        <div>
                            Delivery services using rental or employee-owned vehicles?
                            <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="delivery_services" value="yes" id="delivery-yes"
                            class="sr-only" />
                        <label for="delivery-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="delivery_services" value="no" id="delivery-no" checked class="sr-only" />
                        <label for="delivery-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Own Vehicles -->
                <fieldset class="form-group full-width radio-button chubb-auto-coverage">
                    <legend class="radio-btn-label mb-0"> Does the applicant own any vehicles? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="own_vehicles" value="yes" id="vehicles-yes" class="sr-only" />
                        <label for="vehicles-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="own_vehicles" value="no" id="vehicles-no" checked class="sr-only" />
                        <label for="vehicles-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for Chubb — Liability & Property Enhancements -->
        <div class="card-gray gap-24">
            <h4>Chubb — Liability & Property Enhancements</h4>
            <div class="form-grid full-width">
                <!-- Business Owners Liability Enhancement -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Business Owners Liability Enhancement?
                            <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="liability_enhancement" value="yes" id="liability-yes"
                            class="sr-only" />
                        <label for="liability-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="liability_enhancement" value="no" id="liability-no" checked
                            class="sr-only" />
                        <label for="liability-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Business Property Enhancement -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Business Property Enhancement? <span class="asteric">*</span></div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="property_enhancement" value="yes" id="property-yes" class="sr-only" />
                        <label for="property-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="property_enhancement" value="no" id="property-no" checked
                            class="sr-only" />
                        <label for="property-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Chubb Property Enhancement Limit (no radio → keep label only) -->
                <div class="form-group disabled">
                    <label id="chubb-label">
                        Chubb Property Enhancement Limit <span class="asteric" aria-hidden="true">*</span>
                    </label>

                    <div class="custom-select full-width" role="combobox" tabindex="0" aria-disabled="true"
                        aria-haspopup="listbox" aria-expanded="false" aria-labelledby="chubb-label chubb-value"
                        aria-controls="chubb-options">

                        <div class="select-box" aria-hidden="true">
                            <span class="selected-text" id="chubb-value">
                                $50,000
                            </span>

                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <div class="options-container" id="chubb-options" role="listbox" aria-hidden="true">
                            <div class="option" role="option" aria-selected="true">
                                $50,000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for Chubb — Electronic Data Liability -->
        <div class="card-gray gap-24">
            <h4>Chubb — Electronic Data Liability</h4>
            <div class="form-grid full-width">
                <!-- Electronic Data Liability Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Electronic Data Liability Coverage?
                            <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="edl_coverage" value="yes" id="edl-yes" checked class="sr-only" />
                        <label for="edl-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="edl_coverage" value="no" id="edl-no" class="sr-only" />
                        <label for="edl-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- EDL Claims -->
                <fieldset class="form-group full-width radio-button disabled">
                    <legend class="radio-btn-label mb-0">
                        <div> Any EDL claims in last 5 years? </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="edl_claims" value="yes" id="claims-yes" checked class="sr-only" />
                        <label for="claims-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="edl_claims" value="no" id="claims-no" class="sr-only" />
                        <label for="claims-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Chubb EDL Standard Coverage Limit -->
                <div class="form-group disabled">

                    <label id="edl-label">
                        Chubb EDL standard coverage limit <span class="asteric" aria-hidden="true">*</span>
                    </label>
                    <div class="custom-select full-width" role="combobox" tabindex="0" aria-disabled="true"
                        aria-haspopup="listbox" aria-expanded="false" aria-labelledby="edl-label edl-value"
                        aria-controls="edl-options">

                        <div class="select-box" aria-hidden="true">
                            <span class="selected-text" id="edl-value">
                                $25000
                            </span>
                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <div class="options-container" id="edl-options" role="listbox" aria-hidden="true">
                            <div class="option" role="option" aria-selected="true">
                                $25000
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for Chubb — Employee Dishonesty / ERISA -->
        <div class="card-gray gap-24">
            <h4>Chubb — Employee Dishonesty / ERISA</h4>
            <div class="form-grid full-width">
                <!-- Greater Employee Dishonesty / ERISA Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div> Greater Employee Dishonesty / ERISA Coverage?
                            <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="erisa_coverage" value="yes" id="erisa-yes" checked class="sr-only" />
                        <label for="erisa-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="erisa_coverage" value="no" id="erisa-no" class="sr-only" />
                        <label for="erisa-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- EMPD Claims -->
                <fieldset class="form-group full-width radio-button disabled erisa-dependent">
                    <legend class="radio-btn-label mb-0">
                        <div>Any EMPD claims in last 5 years?
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="empd_claims" value="yes" id="empd-yes" checked class="sr-only" />
                        <label for="empd-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="empd_claims" value="no" id="empd-no" class="sr-only" />
                        <label for="empd-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- EMPD Standard Coverage Limit -->
                <div class="form-group disabled erisa-dependent">

                    <label id="empd-label">
                        Chubb EMPD standard coverage limit <span class="asteric" aria-hidden="true">*</span>
                    </label>

                    <div class="custom-select full-width" role="combobox" tabindex="0" aria-disabled="true"
                        aria-haspopup="listbox" aria-expanded="false" aria-labelledby="empd-label empd-value"
                        aria-controls="empd-options">

                        <div class="select-box" aria-hidden="true">
                            <span class="selected-text" id="empd-value">
                                $25,000
                            </span>

                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <div class="options-container" id="empd-options" role="listbox" aria-hidden="true">
                            <div class="option" role="option" aria-selected="true">
                                $25,000
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Benefit Plan Coverage -->
                <fieldset class="form-group full-width radio-button disabled erisa-dependent">
                    <legend class="radio-btn-label mb-0"> Include Benefit Plan Coverage? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="benefit_plan" value="yes" id="benefit-yes" checked class="sr-only" />
                        <label for="benefit-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="benefit_plan" value="no" id="benefit-no" class="sr-only" />
                        <label for="benefit-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Plan / Pension Name -->
                <div class="form-group ">
                    <label for="plan-pension-name">
                        Plan / pension name
                    </label>

                    <input id="plan-pension-name" type="text" aria-disabled="true" />

                </div>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for Acuity — Cyber Suite Coverage -->
        <div class="card-gray gap-24">
            <h4>Acuity — Cyber Suite Coverage</h4>
            <div class="form-grid full-width">
                <!-- Acuity Cyber Suite Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Acuity Cyber Suite Coverage? <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="acuity_cyber" value="yes" id="acuity-yes" class="sr-only" />
                        <label for="acuity-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="acuity_cyber" value="no" id="acuity-no" checked class="sr-only" />
                        <label for="acuity-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Coverage Limit -->
                <div class="form-group">
                    <label for="coverage-limit">
                        Coverage Limit <span aria-hidden="true">*</span>
                    </label>

                    <input id="coverage-limit" type="text" value="" readonly />

                </div>
                <!-- Cyber Incident -->
                <fieldset class="form-group full-width radio-button disabled acuity-cyber-dependent">
                    <legend class="radio-btn-label mb-0"> Cyber incident &gt; $10k or lawsuit in past 3 years?
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="cyber_incident" value="yes" id="incident-yes" class="sr-only" />
                        <label for="incident-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="cyber_incident" value="no" id="incident-no" checked class="sr-only" />
                        <label for="incident-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Weekly Backups -->
                <fieldset class="form-group full-width radio-button disabled acuity-cyber-dependent">
                    <legend class="radio-btn-label mb-0">
                        Weekly backups of computer &amp; critical data? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="weekly_backups" value="yes" id="backup-yes" class="sr-only" />
                        <label for="backup-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="weekly_backups" value="no" id="backup-no" checked class="sr-only" />
                        <label for="backup-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Restrict Access -->
                <fieldset class="form-group full-width radio-button disabled acuity-cyber-dependent">
                    <legend class="radio-btn-label mb-0"> Restrict employee/external access to PI on need-to-know
                        basis? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="restrict_access" value="yes" id="access-yes" class="sr-only" />
                        <label for="access-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="restrict_access" value="no" id="access-no" checked class="sr-only" />
                        <label for="access-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Firewalls -->
                <fieldset class="form-group full-width radio-button disabled acuity-cyber-dependent">
                    <legend class="radio-btn-label mb-0">
                        All internet access points secured by firewalls? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="firewalls" value="yes" id="firewall-yes" class="sr-only" />
                        <label for="firewall-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="firewalls" value="no" id="firewall-no" checked class="sr-only" />
                        <label for="firewall-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Anti Virus -->
                <fieldset class="form-group full-width radio-button disabled acuity-cyber-dependent">
                    <legend class="radio-btn-label mb-0"> Up-to-date anti-virus / anti-malware on all endpoints?
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="anti_virus" value="yes" id="antivirus-yes" class="sr-only" />
                        <label for="antivirus-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="anti_virus" value="no" id="antivirus-no" checked class="sr-only" />
                        <label for="antivirus-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Encrypt Data -->
                <fieldset class="form-group full-width radio-button disabled acuity-cyber-dependent">
                    <legend class="radio-btn-label mb-0"> Encrypt all mobile devices and confidential data? </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="encrypt_data" value="yes" id="encrypt-yes" class="sr-only" />
                        <label for="encrypt-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="encrypt_data" value="no" id="encrypt-no" checked class="sr-only" />
                        <label for="encrypt-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for Acuity — HNOA & Equipment Breakdown -->
        <div class="card-gray gap-24">
            <h4>Acuity — HNOA & Equipment Breakdown</h4>
            <div class="form-grid full-width">
                <!-- Acuity Hired Auto & Non-Owned Auto Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Acuity Hired Auto &amp; Non-Owned Auto Coverage?
                            <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="acuity_hired_auto" value="yes" id="acuity-auto-yes" class="sr-only" />
                        <label for="acuity-auto-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="acuity_hired_auto" value="no" id="acuity-auto-no" checked
                            class="sr-only" />
                        <label for="acuity-auto-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Acuity Equipment Breakdown Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>
                            Acuity Equipment Breakdown Coverage?
                            <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="acuity_equipment" value="yes" id="equipment-yes" class="sr-only" />
                        <label for="equipment-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="acuity_equipment" value="no" id="equipment-no" checked
                            class="sr-only" />
                        <label for="equipment-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
            </div>
        </div>
        <!-- end  -->

        <div class="mt-20" aria-labelledby="underwriting-questions-heading">
            <h3 id="underwriting-questions-heading">Underwriting Questions</h3>
            <hr class="mt-9">
        </div>

        <!-- gray-card for All Carriers -->
        <div class="card-gray gap-24">
            <h4>All Carriers</h4>
            <div class="form-grid full-width">
                <!-- Continuous Insurance Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Three years of continuous insurance coverage for the same
                            exposures? <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="continuous_insurance" value="yes" id="insurance-yes" class="sr-only" />
                        <label for="insurance-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="continuous_insurance" value="no" id="insurance-no" checked class="sr-only" />
                        <label for="insurance-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
                <!-- Serve Alcohol -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Does the applicant serve alcohol?
                            <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="serve_alcohol"value="yes" id="alcohol-yes" class="sr-only" />
                        <label for="alcohol-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="serve_alcohol" value="no" id="alcohol-no" checked class="sr-only" />
                        <label for="alcohol-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for CNA & Liberty Mutual -->
        <div class="card-gray gap-24" aria-labelledby="cna-liberty-title">
            <h4 id="cna-liberty-title"> CNA & Liberty Mutual </h4>
            <div class="form-grid full-width">
                <!-- Prior Coverage -->

                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>
                            Coverage in force for same exposures during prior policy
                            period (excl. new ventures)? <span class="asteric">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group">
                        <input type="radio" name="prior_coverage" value="yes" id="prior_coverage-yes" class="sr-only" />
                        <label for="prior_coverage-yes" class="toggle-btn"> YES </label>
                        <input type="radio" name="prior_coverage" value="no" id="prior_coverage-no" checked class="sr-only" />
                        <label for="prior_coverage-no" class="toggle-btn"> NO </label>
                    </div>
                </fieldset>


                <!-- Years with Previous Carrier -->
                <div class="form-group">
                    <label for="prev-years"> How many years was the business with the previous carrier? </label>
                    <input id="prev-years" type="text" />
                </div>
                <!-- Details Textarea -->
                <div class="form-group full-width">
                    <label for="prior-details"> Details of prior coverage and applicant's current carrier </label>
                    <textarea id="prior-details" class="textarea"></textarea>
                </div>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for CNA -->
        <div class="card-gray gap-24" aria-labelledby="cna-title">

            <h4 id="cna-title">CNA</h4>

            <div class="form-grid full-width">

                <!-- Medical Limit -->
                <div class="form-group">

                    <label id="medical-limit-label">
                        Medical Limit <span class="asteric" aria-hidden="true">*</span>
                    </label>

                    <div class="custom-select full-width" role="combobox" tabindex="0" aria-haspopup="listbox"
                        aria-expanded="false" aria-labelledby="medical-limit-label medical-limit-value"
                        aria-controls="medical-limit-options">

                        <div class="select-box" aria-hidden="true">
                            <span id="medical-limit-value"> $5,000 </span>
                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <div id="medical-limit-options" role="listbox" hidden>
                            <div role="option" aria-selected="true">$5,000</div>
                        </div>

                    </div>
                </div>

                <!-- Management Experience -->
                <div class="form-group">

                    <label for="mgmt-exp">
                        Years of management experience in this industry
                        <span class="asteric" aria-hidden="true">*</span>
                    </label>

                    <input id="mgmt-exp" type="text" />

                </div>

                <!-- CNA Choice -->
                <div class="form-group">

                    <label id="cna-choice-label">
                        CNA Choice endorsement to include <span class="asteric" aria-hidden="true">*</span>
                    </label>

                    <div class="custom-select full-width" role="combobox" tabindex="0" aria-haspopup="listbox"
                        aria-expanded="false" aria-labelledby="cna-choice-label cna-choice-value"
                        aria-controls="cna-choice-options">

                        <div class="select-box" aria-hidden="true">
                            <span id="cna-choice-value"> None </span>
                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <div id="cna-choice-options" role="listbox" hidden>
                            <div role="option" aria-selected="true">None</div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for Liberty Mutual -->
        <div class="card-gray gap-24">
            <h4>Liberty Mutual</h4>
            <div class="form-grid full-width">
                <!-- Used Goods -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>
                            Insured sells used and/or refurbished goods?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup" aria-labelledby="used-goods-label">
                        <input type="radio" name="used_goods" value="yes" id="used-yes" class="sr-only" />
                        <label for="used-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="used_goods" value="no" id="used-no" class="sr-only" checked />
                        <label for="used-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Subsidiaries -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Applicant has subsidiaries or is a subsidiary?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="subsidiary" value="yes" id="subsidiary-yes" class="sr-only" />
                        <label for="subsidiary-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="subsidiary" value="no" id="subsidiary-no" class="sr-only" checked />
                        <label for="subsidiary-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Operations Sold -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Operations sold, acquired or discontinued in last 5 years?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="operations_changes" value="yes" id="operations-yes" class="sr-only" />
                        <label for="operations-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="operations_changes" value="no" id="operations-no" class="sr-only" checked />
                        <label for="operations-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Non-pay cancellations -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div> 2+ non-pay cancellations or non-compliant audits in last 3
                            years? <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="non_pay" value="yes" id="nonpay-yes" class="sr-only" />
                        <label for="nonpay-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="non_pay" value="no" id="nonpay-no" class="sr-only" checked />
                        <label for="nonpay-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Additional Interests -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div> Additional interests / mortgagees / loss payees?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="additional_interests" value="yes" id="interest-yes" class="sr-only" />
                        <label for="interest-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="additional_interests" value="no" id="interest-no" class="sr-only" checked />
                        <label for="interest-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Fraud -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div> Indicted/convicted of fraud, bribery, arson in last 5 yrs?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="fraud_history" value="yes" id="fraud-yes" class="sr-only" />
                        <label for="fraud-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="fraud_history" value="no" id="fraud-no" class="sr-only" checked />
                        <label for="fraud-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Manufacturing -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Manufactures, mixes, relabels or repackages products?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="manufacturing" value="yes" id="manufacturing-yes" class="sr-only" />
                        <label for="manufacturing-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="manufacturing" value="no" id="manufacturing-no" class="sr-only" checked />
                        <label for="manufacturing-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Sales -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Annual sales at any one location > $15,000,000?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="annual_sales" value="yes" id="sales-yes" class="sr-only" />
                        <label for="sales-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="annual_sales" value="no" id="sales-no" class="sr-only" checked />
                        <label for="sales-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Import Merchandise -->
                <fieldset class="form-group full-width radio-button">
                    <legend class="radio-btn-label mb-0">
                        <div>Import any merchandise directly from manufacturer?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="import_merchandise" value="yes" id="import-yes" class="sr-only" />
                        <label for="import-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="import_merchandise" value="no" id="import-no" class="sr-only" checked />
                        <label for="import-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Text inputs remain normal -->
                <div class="form-group">
                    <label for="income">Business income needs exceed $10,000?</label>
                    <input id="income" type="text" />
                </div>
                <div class="form-group full-width">
                    <label for="management-details">Management experience details</label>
                    <textarea id="management-details" class="textarea"></textarea>
                </div>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for Chubb -->
        <div class="card-gray gap-24">
            <h4 id="chubb-title">Chubb</h4>
            <div class="form-grid full-width" aria-labelledby="chubb-title">
                <!-- Medical Expenses (Custom Select) -->
                <div class="form-group">
                    <label id="medical-expenses-label" for="medical-expenses-select"> Medical Expenses <span
                            class="asteric" aria-hidden="true">*</span>
                    </label>
                    <div class="custom-select">
                        <div id="medical-expenses-select" class="select-box" tabindex="0" role="combobox"
                            aria-haspopup="listbox" aria-expanded="false"
                            aria-labelledby="medical-expenses-label industry-selected-text"
                            aria-controls="industry-options">
                            <span class="selected-text" id="industry-selected-text"> >$5,000 </span>
                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>
                        <div class="options-container" role="listbox" id="medical-expenses-options">
                            <div class="option active" role="option" aria-selected="true"> >$5,000 </div>
                            <div class="option" role="option"> >$5,000 </div>
                            <div class="option" role="option"> >$5,000 </div>

                        </div>
                    </div>
                </div>


                <!-- Bankruptcy -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Bankruptcy filed by applicant / majority owner in last 5 years?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="bankruptcy" value="yes" id="bankruptcy-yes" class="sr-only" />
                        <label for="bankruptcy-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="bankruptcy" value="no" id="bankruptcy-no" class="sr-only" checked />
                        <label for="bankruptcy-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Other Business -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Operate other business under same legal entity not
                            on this app? <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="other_business" value="yes" id="other-business-yes" class="sr-only" />
                        <label for="other-business-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="other_business" value="no" id="other-business-no" class="sr-only" checked />
                        <label for="other-business-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Prior Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Any prior coverage declined / cancelled / non-renewed in
                            last 3 years? <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="prior_coverage_declined" value="yes" id="declined-yes" class="sr-only" />
                        <label for="declined-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="prior_coverage_declined" value="no" id="declined-no" class="sr-only" checked />
                        <label for="declined-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Non Profit -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Is this company a non-profit?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="non_profit" value="yes" id="nonprofit-yes" class="sr-only" />
                        <label for="nonprofit-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="non_profit" value="no" id="nonprofit-no" class="sr-only" checked />
                        <label for="nonprofit-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Umbrella Coverage -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Include Umbrella Coverage?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="umbrella_coverage" value="yes" id="umbrella-yes" class="sr-only" />
                        <label for="umbrella-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="umbrella_coverage" value="no" id="umbrella-no" class="sr-only" checked />
                        <label for="umbrella-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Disabled Select -->
                <div class="form-group">
                    <label id="umbrella-label">
                        Desired umbrella limit
                    </label>

                    <div class="custom-select">

                        <div id="umbrella-select" class="select-box" role="combobox" aria-haspopup="listbox"
                            aria-expanded="false" aria-disabled="true"
                            aria-labelledby="umbrella-label umbrella-selected-text" aria-controls="umbrella-options"
                            tabindex="-1">

                            <span class="selected-text" id="umbrella-selected-text">
                                $1,000,000
                            </span>

                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>

                        </div>

                        <div class="options-container" role="listbox" id="umbrella-options" aria-hidden="true">
                            <div class="option" role="option" aria-selected="true">
                                $1,000,000
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end  -->
        <!-- gray-card for AmTrust -->
        <div class="card-gray gap-24">
            <h4 id="amtrust-title">AmTrust</h4>
            <div class="form-grid full-width" aria-labelledby="amtrust-title">
                <!-- Bankruptcy / Judgment / Lien -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Bankruptcy / judgment / lien currently or in last 5 years?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="bankruptcy_lien" value="yes" id="lien-yes" class="sr-only" />
                        <label for="lien-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="bankruptcy_lien" value="no" id="lien-no" class="sr-only" checked />
                        <label for="lien-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Coverage Gaps -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div> Any coverage gaps / lapses / declines in last 3
                            years (excl. non-pay)?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="coverage_gaps" value="yes" id="coverage-gap-yes" class="sr-only" />
                        <label for="coverage-gap-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="coverage_gaps" value="no" id="coverage-gap-no" class="sr-only" checked />
                        <label for="coverage-gap-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Unoccupied Buildings -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div> Any buildings > 30% unoccupied for > 60 days?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="unoccupied_buildings" value="yes" id="unoccupied-yes" class="sr-only" />
                        <label for="unoccupied-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="unoccupied_buildings" value="no" id="unoccupied-no" class="sr-only" checked />
                        <label for="unoccupied-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Structural Renovation -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Any buildings going through major / structural renovation?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="structural_renovation" value="yes" id="renovation-yes" class="sr-only" />
                        <label for="renovation-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="structural_renovation" value="no" id="renovation-no" class="sr-only" checked />
                        <label for="renovation-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Other Business -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Applicant own / operate any other business?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="other_business_operate" value="yes" id="operate-yes" class="sr-only" />
                        <label for="operate-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="other_business_operate" value="no" id="operate-no" class="sr-only" checked />
                        <label for="operate-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Additional Named Insured -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>Additional Named Insured?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="additional_named_insured" value="yes" id="named-yes" class="sr-only" />
                        <label for="named-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="additional_named_insured" value="no" id="named-no" class="sr-only" checked />
                        <label for="named-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Loss Information (Custom Select) -->

                <div class="form-group">

                    <label id="loss-info-label">
                        Applicable loss information <span class="asteric" aria-hidden="true">*</span>
                    </label>

                    <div class="custom-select full-width">

                        <div id="loss-info" class="select-box" role="combobox" tabindex="0" aria-haspopup="listbox"
                            aria-expanded="false" aria-labelledby="loss-info-label loss-info-value"
                            aria-controls="loss-info-options">

                            <span class="selected-text" id="loss-info-value">
                                Single Loss &lt; $5,000
                            </span>

                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>

                        </div>

                        <div class="options-container" id="loss-info-options" role="listbox">

                            <div class="option" role="option" tabindex="0" aria-selected="true">
                                Single Loss &lt; $5,000
                            </div>

                        </div>

                    </div>
                </div>
                <!-- Manufacturer Representatives -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div> Independent manufacturer's representatives?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="manufacturer_reps" value="yes" id="rep-yes" class="sr-only" />
                        <label for="rep-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="manufacturer_reps" value="no" id="rep-no" class="sr-only" checked />
                        <label for="rep-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Public Area -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div>More than 25% of area open to the public?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="public_area" value="yes" id="public-yes" class="sr-only" />
                        <label for="public-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="public_area" value="no" id="public-no" class="sr-only" checked />
                        <label for="public-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
                <!-- Sub Contractors -->
                <fieldset class="form-group full-width radio-button">
                    <legend>
                        <div> Sub-contractors allowed without COI ≥ insured's limits?
                            <span class="asteric" aria-hidden="true">*</span>
                        </div>
                    </legend>
                    <div class="toggle-btn-group" role="radiogroup">
                        <input type="radio" name="sub_contractors" value="yes" id="sub-yes" class="sr-only" />
                        <label for="sub-yes" class="toggle-btn" tabindex="0">YES</label>
                        <input type="radio" name="sub_contractors" value="no" id="sub-no" class="sr-only" checked />
                        <label for="sub-no" class="toggle-btn" tabindex="0">NO</label>
                    </div>
                </fieldset>
            </div>
            <!-- end  -->
        </div>
    </div>
</div>