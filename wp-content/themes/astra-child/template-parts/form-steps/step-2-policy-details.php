<div class="form-container">
  <div class="form-heading">
    <h2>Policy Details</h2>
    <p class="sub-title"> Configure the General Liability policy you're quoting. </p>
  </div>
  <!-- POLICY TYPES -->
  <div class="form-group full-width">
    <label> Select Policy Type <span class="asteric">*</span>
    </label>
    <div class="checkbox-group-wrapper select-policy-type">
      <!-- BOP -->
      <label class="custom-checkbox">
        <input type="checkbox" name="policy_type_bop" value="BOP" />
        <span class="checkmark"></span>
        <span class="checkbox-text"> BOP </span>
      </label>
      <!-- GL -->
      <label class="custom-checkbox">
        <input type="checkbox" name="policy_type_gl" value="GL" />
        <span class="checkmark"></span>
        <span class="checkbox-text"> GL </span>
      </label>
      <!-- WC -->
      <label class="custom-checkbox">
        <input type="checkbox" name="policy_type_wc" value="WC" />
        <span class="checkmark"></span>
        <span class="checkbox-text"> WC </span>
      </label>
      <!-- Cyber -->
      <label class="custom-checkbox">
        <input type="checkbox" name="policy_type_cyber" value="Cyber" />
        <span class="checkmark"></span>
        <span class="checkbox-text"> Cyber </span>
      </label>
    </div>
  </div>
  <div class="form-grid">
    <!-- EFFECTIVE DATE -->
    <div class="form-group">
      <label> Effective Date <span class="asteric">*</span>
      </label>
      <input type="date" name="effective_date" />
    </div>
    <!-- COVERAGE AMOUNT -->
    <div class="form-group">
      <label> Coverage Amount <span class="asteric">*</span>
      </label>
      <div class="custom-select coverage-select">
        <input type="hidden" name="coverage_amount" />
        <div class="select-box">
          <span class="selected-text"> Select Coverage </span>
          <i class="fa-solid fa-chevron-down arrow-icon"></i>
        </div>
        <div class="options-container">
          <div class="option" data-value="$300,000 / $600,000 / $600,000"> $300,000 / $600,000 / $600,000 </div>
          <div class="option" data-value="$500,000 / $1,000,000 / $1,000,000"> $500,000 / $1,000,000 / $1,000,000 </div>
          <div class="option" data-value="$1,000,000 / $2,000,000 / $2,000,000"> $1,000,000 / $2,000,000 / $2,000,000 </div>
          <div class="option" data-value="$2,000,000 / $4,000,000 / $4,000,000"> $2,000,000 / $4,000,000 / $4,000,000 </div>
        </div>
      </div>
    </div>
    <!-- DEDUCTIBLE -->
    <div class="form-group">
      <label> Desired Deductible <span class="asteric">*</span>
      </label>
      <div class="custom-select deductible-select">
        <input type="hidden" name="desired_deductible" />
        <div class="select-box">
          <span class="selected-text"> Select Deductible </span>
          <i class="fa-solid fa-chevron-down arrow-icon"></i>
        </div>
        <div class="options-container">
          <div class="option" data-value="$1,500"> $1,500 </div>
          <div class="option" data-value="$2,500"> $2,500 </div>
          <div class="option" data-value="$5,000"> $5,000 </div>
          <div class="option" data-value="$10,000"> $10,000 </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="mb-8" />
  <div class="form-grid policy-form" data-set="GL">
    <!-- GL POLICY -->
    <div class="form-group full-width radio-button">
      <label class="radio-btn-label"> Do you have a General Liability Policy today? <span class="asteric">*</span>
      </label>
      <div class="toggle-btn-group">
        <!-- YES -->
        <input type="radio" name="gl_policy" id="gl-policy-yes" value="yes" hidden />
        <label for="gl-policy-yes" class="toggle-btn"> YES </label>
        <!-- NO -->
        <input type="radio" name="gl_policy" id="gl-policy-no" value="no" checked hidden />
        <label for="gl-policy-no" class="toggle-btn"> NO </label>
      </div>
    </div>
    <!-- PREMIUM -->
    <div class="form-group">
      <label> How much are you currently paying in premium? <span class="asteric">*</span>
      </label>
      <input type="text" name="current_premium" placeholder="$" />
    </div>
    <!-- CARRIER -->
    <div class="form-group">
      <label> Who is your current insurance carrier? <span class="asteric">*</span>
      </label>
      <input type="text" name="current_carrier" />
    </div>
    <!-- YEARS -->
    <div class="form-group">
      <label> Years with GL Insurance? <span class="asteric">*</span>
      </label>
      <input type="text" name="years_with_gl" />
    </div>
  </div>
  
   <fieldset class="form-grid policy-form" data-set="BOP" style="display:none;">
      <div class="form-group full-width radio-button">
        <legend class="radio-btn-label" id="bop-policy-label"> 
          <div> Do you have a Business Owners Policy today? <span class="asteric" aria-hidden="true">*</span> </div>
        </legend>
        <div class="toggle-btn-group" role="radiogroup" aria-labelledby="bop-policy-label">
          <!-- YES -->
          <input type="radio" name="bop-policy" value="yes" id="bop-policy-yes" class="sr-only" />
          <label for="bop-policy-yes" class="toggle-btn"> YES </label>
          <!-- NO -->
          <input type="radio" name="bop-policy" value="no" id="bop-policy-no" class="sr-only" checked />
          <label for="bop-policy-no" class="toggle-btn"> NO </label>
        </div>
      </div>
      <!-- PREMIUM -->
      
      <div class="form-group">
        <label for="premium-input"> How much are you currently paying in premium? <span class="asteric" aria-hidden="true">*</span>
        </label>
        <input id="premium-input" type="text" placeholder="$" inputmode="numeric" aria-required="true" required />
      </div>
      <!-- CURRENT CARRIER -->
      <div class="form-group">
        <label for="current-carrier"> Who is your current insurance carrier? <span class="asteric" aria-hidden="true">*</span>
        </label>
        <input id="current-carrier" type="text" autocomplete="organization" aria-required="true" required />
      </div>
      <!-- YEARS WITH GL -->
      <div class="form-group">
        <label for="years-gl"> Years with BOP Insurance? <span class="asteric" aria-hidden="true">*</span>
        </label>
        <input id="years-gl" type="text" inputmode="numeric" aria-required="true" required />
      </div>
    </fieldset>
</div>