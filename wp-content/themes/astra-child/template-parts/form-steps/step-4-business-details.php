<div class="form-container">
    <div class="form-heading">
        <h2>Business Details</h2>

        <p class="sub-title">
            Legal structure, ownership, and operations.
        </p>
    </div>

    <div class="form-grid">
        <!-- LEGAL ENTITY -->

        <div class="form-group">
            <label>
                Legal Entity Type<span class="asteric">*</span>
            </label>

            <div class="custom-select full-width">
                <!-- SELECT BOX -->

                <div
                    class="select-box"
                    tabindex="0"
                    role="button"
                    aria-haspopup="listbox"
                    aria-expanded="false">
                    <span class="selected-text">
                        Select entity type
                    </span>

                    <i
                        class="fa-solid fa-chevron-down arrow-icon"
                        aria-hidden="true"></i>
                </div>

                <!-- OPTIONS -->

                <div class="options-container" role="listbox">
                    <div class="option" role="option">
                        Sole Proprietorship
                    </div>

                    <div class="option" role="option">
                        Partnership
                    </div>

                    <div class="option" role="option">
                        Limited Liability Company (LLC)
                    </div>

                    <div class="option" role="option">
                        Corporation
                    </div>

                    <div class="option" role="option">
                        Nonprofit Organization
                    </div>
                </div>
            </div>
        </div>

        <!-- EIN -->

        <div class="form-group">
            <label>EIN</label>

            <input
                type="text"
                autocomplete="off"
                aria-label="Employer Identification Number" />
        </div>

        <!-- ANNUAL SALES -->

        <div class="form-group">
            <label>Annual Sales</label>

            <input
                type="text"
                autocomplete="off"
                inputmode="numeric"
                aria-label="Annual Sales" />
        </div>

        <!-- WEBSITE RADIO -->

        <div class="form-group full-width radio-button">
            <label class="radio-btn-label">
                Do you have a website?
                <span class="asteric">*</span>
            </label>

            <div class="toggle-btn-group">
                <!-- YES -->

                <input
                    type="radio"
                    name="website-available"
                    id="website-yes"
                    checked
                    hidden />

                <label for="website-yes" class="toggle-btn">
                    YES
                </label>

                <!-- NO -->

                <input
                    type="radio"
                    name="website-available"
                    id="website-no"
                    hidden />

                <label for="website-no" class="toggle-btn">
                    NO
                </label>
            </div>
        </div>

        <!-- WEBSITE URL -->

        <div class="form-group">
            <label>
                Website URL<span class="asteric">*</span>
            </label>

            <input
                type="url"
                placeholder="https://"
                autocomplete="url"
                aria-required="true" />
        </div>

        <!-- FOUNDED YEAR -->

        <div class="form-group">
            <label>
                Founded Year<span class="asteric">*</span>
            </label>

            <input
                type="text"
                placeholder="YYYY"
                inputmode="numeric"
                maxlength="4"
                aria-required="true" />
        </div>
    </div>

    <hr class="m-0" />

    <!-- OWNERS -->

    <div class="details-card gap-16">
        <div class="heading-section">
            <h3>Owners</h3>

            <button type="button" class="btn btn-outline add-owner-btn">
                <i
                    class="fa fa-plus"
                    aria-hidden="true"></i>

                Add Owner
            </button>
        </div>

        <!-- OWNER 1 -->

        <div class="card-gray gap-24">
            <div class="owner-name full-width">
                <h4>Owner 1</h4>

                <i
                    class="fa fa-times close-icon"
                    aria-hidden="true"></i>
            </div>

            <div class="form-grid full-width">
                <!-- NAME -->

                <div class="form-group">
                    <label>
                        Name & Title<span class="asteric">*</span>
                    </label>

                    <input
                        type="text"
                        placeholder="Jane Doe, CEO"
                        autocomplete="name"
                        aria-required="true" />
                </div>

                <!-- OWNERSHIP -->

                <div class="form-group">
                    <label>
                        Percentage of Ownership
                        <span class="asteric">*</span>
                    </label>

                    <input
                        type="text"
                        placeholder="%"
                        inputmode="numeric"
                        aria-required="true" />
                </div>

                <!-- PAYROLL -->

                <div class="form-group">
                    <label>
                        Include in Payroll
                        <span class="asteric">*</span>
                    </label>

                    <div class="toggle-btn-group">
                        <!-- INCLUDE -->

                        <input
                            type="radio"
                            name="payroll-owner-1"
                            id="include-payroll-1"
                            checked
                            hidden />

                        <label
                            for="include-payroll-1"
                            class="toggle-btn payroll-toggle">
                            INCLUDE
                        </label>

                        <!-- EXCLUDE -->

                        <input
                            type="radio"
                            name="payroll-owner-1"
                            id="exclude-payroll-1"
                            hidden />

                        <label
                            for="exclude-payroll-1"
                            class="toggle-btn payroll-toggle">
                            EXCLUDE
                        </label>
                    </div>
                </div>

                <!-- OFFICER PAYROLL -->

                <div class="form-group">
                    <label>
                        Officer Payroll
                        <span class="asteric">*</span>
                    </label>

                    <input
                        type="text"
                        placeholder="0"
                        inputmode="numeric"
                        aria-required="true" />
                </div>
            </div>
        </div>

        <!-- OWNER 2 -->

        <div class="card-gray gap-32">
            <div class="owner-name full-width">
                <h4>Owner 2</h4>

                <i
                    class="fa fa-times close-icon"
                    aria-hidden="true"></i>
            </div>

            <div class="form-grid full-width">
                <!-- NAME -->

                <div class="form-group">
                    <label>
                        Name & Title<span class="asteric">*</span>
                    </label>

                    <input
                        type="text"
                        placeholder="Jane Doe, CEO"
                        autocomplete="name"
                        aria-required="true" />
                </div>

                <!-- OWNERSHIP -->

                <div class="form-group">
                    <label>
                        Percentage of Ownership
                        <span class="asteric">*</span>
                    </label>

                    <input
                        type="text"
                        placeholder="%"
                        inputmode="numeric"
                        aria-required="true" />
                </div>

                <!-- PAYROLL -->

                <div class="form-group">
                    <label>
                        Include in Payroll
                        <span class="asteric">*</span>
                    </label>

                    <div class="toggle-btn-group">
                        <!-- INCLUDE -->

                        <input
                            type="radio"
                            name="payroll-owner-2"
                            id="include-payroll-2"
                            checked
                            hidden />

                        <label
                            for="include-payroll-2"
                            class="toggle-btn payroll-toggle">
                            INCLUDE
                        </label>

                        <!-- EXCLUDE -->

                        <input
                            type="radio"
                            name="payroll-owner-2"
                            id="exclude-payroll-2"
                            hidden />

                        <label
                            for="exclude-payroll-2"
                            class="toggle-btn payroll-toggle">
                            EXCLUDE
                        </label>
                    </div>
                </div>

                <!-- OFFICER PAYROLL -->

                <div class="form-group">
                    <label>
                        Officer Payroll
                        <span class="asteric">*</span>
                    </label>

                    <input
                        type="text"
                        placeholder="0"
                        inputmode="numeric"
                        aria-required="true" />
                </div>
            </div>
        </div>
    </div>
</div>