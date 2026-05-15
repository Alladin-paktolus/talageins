<div class="form-step form-step-7">
  <div class="form-container">
    <div class="form-heading">
      <h2>Underwriting Questions</h2>
      <p class="sub-title"> Answer the following questions for the selected carriers. </p>
    </div>
    <!-- CONTINUOUS COVERAGE -->
    <div class="form-group full-width radio-button gap-24">
      <label> Has there been three years of continuous insurance coverage for the same exposures requested? <span class="asteric">*</span>
      </label>
      <div class="toggle-btn-group">
        <!-- YES -->
        <input type="radio" name="continuous_coverage" id="continuous-coverage-yes" value="yes" checked hidden />
        <label for="continuous-coverage-yes" class="toggle-btn"> YES </label>
        <!-- NO -->
        <input type="radio" name="continuous_coverage" id="continuous-coverage-no" value="no" hidden />
        <label for="continuous-coverage-no" class="toggle-btn"> NO </label>
      </div>
    </div>
    <!-- LIBERTY MUTUAL QUESTIONS -->
    <div class="card-gray gap-24">
      <h4>Liberty Mutual Questions</h4>
      <!-- CURRENT CARRIER DETAILS -->
      <div class="form-group full-width">
        <label> Please provide details of prior coverage and Applicant's current carrier <span class="asteric">*</span>
        </label>
        <input type="text" name="prior_coverage_details" placeholder="" autocomplete="organization" aria-required="true" />
      </div>
      <!-- SUBSIDIARIES -->
      <div class="form-group full-width radio-button gap-24">
        <label> Does the applicant have any subsidiaries or is the applicant a subsidiary of another entity? <span class="asteric">*</span>
        </label>
        <div class="toggle-btn-group">
          <!-- YES -->
          <input type="radio" name="subsidiary_policy" id="subsidiary-policy-yes" value="yes" checked hidden />
          <label for="subsidiary-policy-yes" class="toggle-btn"> YES </label>
          <!-- NO -->
          <input type="radio" name="subsidiary_policy" id="subsidiary-policy-no" value="no" hidden />
          <label for="subsidiary-policy-no" class="toggle-btn"> NO </label>
        </div>
      </div>
      <!-- SOLD / ACQUIRED -->
      <div class="form-group full-width radio-button gap-24">
        <label> Have any operations been sold, acquired or discontinued in the last 5 years? <span class="asteric">*</span>
        </label>
        <div class="toggle-btn-group">
          <!-- YES -->
          <input type="radio" name="sold_operations_policy" id="sold-policy-yes" value="yes" checked hidden />
          <label for="sold-policy-yes" class="toggle-btn"> YES </label>
          <!-- NO -->
          <input type="radio" name="sold_operations_policy" id="sold-policy-no" value="no" hidden />
          <label for="sold-policy-no" class="toggle-btn"> NO </label>
        </div>
      </div>
      <!-- INTERESTS -->
      <div class="form-group full-width radio-button gap-24">
        <label> Are there any additional interests, interested parties, mortgagees or loss payees to be added or modified with this transaction? <span class="asteric">*</span>
        </label>
        <div class="toggle-btn-group">
          <!-- YES -->
          <input type="radio" name="additional_interests_policy" id="interests-policy-yes" value="yes" checked hidden />
          <label for="interests-policy-yes" class="toggle-btn"> YES </label>
          <!-- NO -->
          <input type="radio" name="additional_interests_policy" id="interests-policy-no" value="no" hidden />
          <label for="interests-policy-no" class="toggle-btn"> NO </label>
        </div>
      </div>
      <!-- CRIME HISTORY -->
      <div class="form-group full-width radio-button gap-24">
        <label> During the last five years (ten in RI), has any applicant been indicted for or convicted of any degree of the crime of fraud, bribery, arson or any other arson-related crime? <span class="asteric">*</span>
        </label>
        <div class="toggle-btn-group">
          <!-- YES -->
          <input type="radio" name="crime_policy" id="crime-policy-yes" value="yes" checked hidden />
          <label for="crime-policy-yes" class="toggle-btn"> YES </label>
          <!-- NO -->
          <input type="radio" name="crime_policy" id="crime-policy-no" value="no" hidden />
          <label for="crime-policy-no" class="toggle-btn"> NO </label>
        </div>
      </div>
      <!-- YEAR STARTED -->
      <div class="form-group full-width">
        <label> Year Started <span class="asteric">*</span>
        </label>
        <input type="text" name="year_started" placeholder="YYYY" inputmode="numeric" maxlength="4" aria-required="true" />
      </div>
      <!-- PRIOR POLICY -->
      <div class="form-group full-width radio-button gap-24">
        <label> Was insurance coverage in force for the same exposures for the prior policy period? <span class="asteric">*</span>
        </label>
        <div class="toggle-btn-group">
          <!-- YES -->
          <input type="radio" name="prior_policy_coverage" id="prior-policy-yes" value="yes" checked hidden />
          <label for="prior-policy-yes" class="toggle-btn"> YES </label>
          <!-- NO -->
          <input type="radio" name="prior_policy_coverage" id="prior-policy-no" value="no" hidden />
          <label for="prior-policy-no" class="toggle-btn"> NO </label>
        </div>
      </div>
    </div>
  </div>
</div>