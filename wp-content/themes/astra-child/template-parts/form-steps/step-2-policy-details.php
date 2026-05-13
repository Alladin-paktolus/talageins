<div class="form-container">
    <div class="form-heading">
        <h2>Policy Details</h2>

        <p class="sub-title">
            Configure the General Liability policy you're quoting.
        </p>
    </div>
    <div class="form-group full-width">
        <label> Select Policy Type<span class="asteric">*</span></label>

        <div class="checkbox-group-wrapper">
            <!-- ITEM -->


            <label class="custom-checkbox">
                <input
                    type="checkbox"
                    aria-label="BOP Policy Type" />

                <span
                    class="checkmark"
                    aria-hidden="true"></span>

                <span class="checkbox-text">
                    BOP
                </span>
            </label>

            <!-- ITEM -->

            <label class="custom-checkbox">
                <input
                    type="checkbox"
                    aria-label="GL Policy Type" />

                <span
                    class="checkmark"
                    aria-hidden="true"></span>

                <span class="checkbox-text">
                    GL
                </span>
            </label>

            <!-- ITEM -->
            <label class="custom-checkbox">
                <input
                    type="checkbox"
                    aria-label="WC Policy Type" />

                <span
                    class="checkmark"
                    aria-hidden="true"></span>

                <span class="checkbox-text">
                    WC
                </span>
            </label>

            <!-- ITEM -->
            <label class="custom-checkbox">
                <input
                    type="checkbox"
                    aria-label="Cyber Policy Type" />

                <span
                    class="checkmark"
                    aria-hidden="true"></span>

                <span class="checkbox-text">
                    Cyber
                </span>
            </label>
        </div>
    </div>

    <div class="form-grid">
        <div class="form-group">
            <label>Effective Date<span class="asteric">*</span></label>
            <input
                type="date"
                aria-required="true" />
        </div>

        <!-- COVERAGE AMOUNT -->

        <div class="form-group">
            <label> Coverage Amount<span class="asteric">*</span> </label>


            <div class="custom-select">
                <!-- SELECT BOX -->

                <div
                    class="select-box"
                    tabindex="0"
                    role="button"
                    aria-haspopup="listbox"
                    aria-expanded="false">
                    <span class="selected-text">
                        $300,000 / $600,000 / $600,000
                    </span>

                    <i
                        class="fa-solid fa-chevron-down arrow-icon"
                        aria-hidden="true"></i>
                </div>

                <!-- OPTIONS -->

                <div
                    class="options-container"
                    role="listbox">
                    <div
                        class="option active"
                        role="option"
                        aria-selected="true">
                        $300,000 / $600,000 / $600,000
                    </div>

                    <div
                        class="option"
                        role="option">
                        $500,000 / $1,000,000 / $1,000,000
                    </div>

                    <div
                        class="option"
                        role="option">
                        $1,000,000 / $2,000,000 / $2,000,000
                    </div>

                    <div
                        class="option"
                        role="option">
                        $2,000,000 / $4,000,000 / $4,000,000
                    </div>
                </div>
            </div>
        </div>

        <!-- DESIRED DEDUCTIBLE -->

        <div class="form-group">
            <label> Desired Deductible<span class="asteric">*</span> </label>

            <div class="custom-select">
                <!-- SELECT BOX -->

                <div
                    class="select-box"
                    tabindex="0"
                    role="button"
                    aria-haspopup="listbox"
                    aria-expanded="false">
                    <span class="selected-text">
                        $1,500
                    </span>

                    <i
                        class="fa-solid fa-chevron-down arrow-icon"
                        aria-hidden="true"></i>
                </div>

                <!-- OPTIONS -->

                <div
                    class="options-container"
                    role="listbox">
                    <div
                        class="option active"
                        role="option"
                        aria-selected="true">
                        $1,500
                    </div>

                    <div
                        class="option"
                        role="option">
                        $2,500
                    </div>

                    <div
                        class="option"
                        role="option">
                        $5,000
                    </div>

                    <div
                        class="option"
                        role="option">
                        $10,000
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mb-8" />
    <div class="form-grid">

        <!-- GL POLICY -->

        <div class="form-group full-width radio-button">

            <label class="radio-btn-label">
                Do you have a General Liability Policy today?
                <span class="asteric">*</span>
            </label>

            <div class="toggle-btn-group">

                <!-- YES -->

                <input
                    type="radio"
                    name="gl-policy"
                    id="gl-policy-yes"
                    checked
                    hidden />

                <label
                    for="gl-policy-yes"
                    class="toggle-btn">
                    YES
                </label>

                <!-- NO -->

                <input
                    type="radio"
                    name="gl-policy"
                    id="gl-policy-no"
                    hidden />

                <label
                    for="gl-policy-no"
                    class="toggle-btn">
                    NO
                </label>

            </div>

        </div>

        <!-- PREMIUM -->

        <div class="form-group">

            <label>
                How much are you currently paying in premium?
                <span class="asteric">*</span>
            </label>

            <input
                type="text"
                placeholder="$"
                inputmode="numeric"
                aria-required="true" />

        </div>

        <!-- CURRENT CARRIER -->

        <div class="form-group">

            <label>
                Who is your current insurance carrier?
                <span class="asteric">*</span>
            </label>

            <input
                type="text"
                autocomplete="organization"
                aria-required="true" />

        </div>

        <!-- YEARS WITH GL -->

        <div class="form-group">

            <label>
                Years with GL Insurance?
                <span class="asteric">*</span>
            </label>

            <input
                type="text"
                inputmode="numeric"
                aria-required="true" />

        </div>

    </div>
</div>