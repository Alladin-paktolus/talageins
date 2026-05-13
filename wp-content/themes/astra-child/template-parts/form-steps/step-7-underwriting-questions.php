<div class="form-container">
    <div class="form-heading">
        <h2>Underwriting Questions</h2>

        <p class="sub-title">
            Answer the following questions for the selected carriers.
        </p>
    </div>
    <div class="form-group full-width radio-button gap-24">
        <label>Has there been three years of continuous insurance coverage for the
            same exposures requested?<span class="asteric">*</span>
        </label>

        <div class="toggle-btn-group">
            <!-- YES -->


            <input type="radio" name="exposure-policy" id="exposure-policy-yes" checked hidden />

            <label for="exposure-policy-yes" class="toggle-btn">
                YES
            </label>

            <!-- NO -->

            <input type="radio" name="exposure-policy" id="exposure-policy-no" hidden />

            <label for="exposure-policy-no" class="toggle-btn">
                NO
            </label>
        </div>
    </div>
    <div class="card-gray gap-24">
        <h4>Liberty Mutual Questions</h4>
        <div class="form-group full-width">
            <label>
                Please provide details of prior coverage and Applicant's current
                carrier
                <span class="asteric">*</span>
            </label>

            <input type="text" placeholder="" aria-required="true" autocomplete="organization" />
        </div>

        <div class="form-group full-width radio-button gap-24">
            <label>Does the applicant have any subsidiaries or is the applicant a
                subsidiary of another entity?<span class="asteric">*</span>
            </label>

            <div class="toggle-btn-group">
                <!-- YES -->

                <input type="radio" name="subsidiary-policy" id="subsidiary-policy-yes" checked hidden />

                <label for="subsidiary-policy-yes" class="toggle-btn">
                    YES
                </label>


                <!-- NO -->


                <input type="radio" name="subsidiary-policy" id="subsidiary-policy-no" hidden />

                <label for="subsidiary-policy-no" class="toggle-btn">
                    NO
                </label>
            </div>
        </div>
        <div class="form-group full-width radio-button gap-24">
            <label>Have any operations been sold, acquired or discontinued in the last
                5 years?<span class="asteric">*</span>
            </label>

            <div class="toggle-btn-group">
                <!-- YES -->

                <input type="radio" name="sold-policy" id="sold-policy-yes" checked hidden />

                <label for="sold-policy-yes" class="toggle-btn">
                    YES
                </label>

                <!-- NO -->

                <input type="radio" name="sold-policy" id="sold-policy-no" hidden />

                <label for="sold-policy-no" class="toggle-btn">
                    NO
                </label>
            </div>
        </div>
        <div class="form-group full-width radio-button gap-24">
            <label>Are there any additional interests, interested parties, mortgagees
                or loss payees to be added or modified with this transaction?*<span class="asteric">*</span>
            </label>

            <div class="toggle-btn-group">
                <!-- YES -->

                <input type="radio" name="interests-policy" id="interests-policy-yes" checked hidden />

                <label for="interests-policy-yes" class="toggle-btn">
                    YES
                </label>

                <!-- NO -->

                <input type="radio" name="interests-policy" id="interests-policy-no" hidden />

                <label for="interests-policy-no" class="toggle-btn">
                    NO
                </label>
            </div>
        </div>
        <div class="form-group full-width radio-button gap-24">
            <label>During the last five years (ten in RI), has any applicant been
                indicted for or convicted of any degree of the crime of fraud,
                bribery, arson or any other arson-related crime?<span class="asteric">*</span>
            </label>

            <div class="toggle-btn-group">
                <!-- YES -->

                <input type="radio" name="crime-policy" id="crime-policy-yes" checked hidden />

                <label for="crime-policy-yes" class="toggle-btn">
                    YES
                </label>

                <!-- NO -->

                <input type="radio" name="crime-policy" id="crime-policy-no" hidden />

                <label for="crime-policy-no" class="toggle-btn">
                    NO
                </label>
            </div>
        </div>
        <div class="form-group full-width">
            <label>
                Year Started
                <span class="asteric">*</span>
            </label>

            <input type="text" placeholder="YYYY" inputmode="numeric" aria-required="true" />
        </div>
        <div class="form-group full-width radio-button gap-24">
            <label>Was insurance coverage in force for the same exposures for the prior policy period?<span
                    class="asteric">*</span>
            </label>

            <div class="toggle-btn-group">
                <!-- YES -->

                <input type="radio" name="prior-policy" id="prior-policy-yes" checked hidden />

                <label for="prior-policy-yes" class="toggle-btn">
                    YES
                </label>

                <!-- NO -->


                <input type="radio" name="prior-policy" id="prior-policy-no" hidden />

                <label for="prior-policy-no" class="toggle-btn">
                    NO
                </label>
            </div>
        </div>
    </div>
</div>