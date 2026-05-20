<div class="form-container">
  <div class="form-heading">
    <h2>Basic Details</h2>
    <p class="sub-title"> Tell us about your agency and the business being insured. </p>
  </div>
  <div class="form-grid">
    <!-- Agency -->
    <div class="form-group">
      <label> Agency <span class="asteric">*</span>
      </label>
      <div class="custom-select agency-select">
        <input type="hidden" name="agency" value="">
        <input type="hidden" id="agency_id" name="agency_id" value="">
        <input type="hidden" id="industryCodeId" name="industryCodeId" value="">
        <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox" aria-expanded="false">
          <span class="selected-text"> Select Agency </span>
          <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
        </div>
        <div class="options-container" role="listbox">
          <div class="option" role="option"></div>
        </div>
      </div>
    </div>
   
    <!-- Agency Location -->
    <div class="form-group">
      <label> Agency Location <span class="asteric">*</span>
      </label>
      <div class="custom-select">
        <input type="hidden" name="agency_location" value="">
        <div class="select-box" tabindex="0" role="button">
          <span class="selected-text"> Los Angeles, CA - 555 W 5th St </span>
          <i class="fa-solid fa-chevron-down arrow-icon"></i>
        </div>
        <div class="options-container">
          <div class="option" data-value="Los Angeles, CA - 555 W 5th St" selected> Los Angeles, CA - 555 W 5th St </div>
          <div class="option" data-value="New York, NY - 100 Park Ave"> New York, NY - 100 Park Ave </div>
        </div>
      </div>
    </div>
    <!-- NAICS -->
    <div class="form-group">
      <label>NAICS Code</label>
      <input type="text" id="naics_code" name="naics_code" placeholder="e.g. 722511" maxlength="6">
    </div>
    <!-- SIC -->
    <div class="form-group">
      <label>SIC Code</label>
      <input type="text" id="sic_code" name="sic_code" placeholder="-">
    </div>
    <!-- Industry -->
    <div class="form-group">
      <label> Industry <span class="asteric">*</span>
      </label>
      <div class="custom-select industry-select">
        <input type="hidden" name="industry" value="Retail">
        <div class="select-box">
          <span class="selected-text"> Retail </span>
          <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
        </div>
        <div class="options-container">
          <div class="option active" data-value="Retail"> Retail </div>
          <div class="option" data-value="Healthcare"> Healthcare </div>
        </div>
      </div>
    </div>
    <!-- Profession -->
    <div class="form-group">
      <label>Profession</label>
      <input type="text" id="profession" name="profession" placeholder="Select profession" disabled>
    </div>
    <!-- Business Name -->
    <div class="form-group">
      <label> Business Name <span class="asteric">*</span>
      </label>
      <input type="text" name="business_name" autocomplete="organization">
    </div>
    <!-- DBA -->
    <div class="dba-wrapper">
      <div class="form-group">
        <label> DBA? <span class="asteric">*</span>
        </label>
        <div class="toggle-btn-group">
          <input type="radio" name="dba" id="dba-yes" value="yes" checked hidden>
          <label for="dba-yes" class="toggle-btn"> YES </label>
          <input type="radio" name="dba" id="dba-no" value="no" hidden>
          <label for="dba-no" class="toggle-btn"> NO </label>
        </div>
      </div>
      <!-- DBA Name -->
      <div class="form-group dba-name-field">
        <label> DBA Name <span class="asteric">*</span>
        </label>
        <input type="text" name="dba_name">
      </div>
    </div>
    <!-- Customer Name -->
    <div class="form-group">
      <label> Customer Name <span class="asteric">*</span>
      </label>
      <input type="text" name="customer_name">
    </div>
    <!-- Phone -->
    <div class="form-group">
      <label> Phone Number <span class="asteric">*</span>
      </label>
      <input type="tel" name="phone_number" placeholder="(555) 123-4567">
    </div>
    <!-- Email -->
    <div class="form-group">
      <label> Email Address <span class="asteric">*</span>
      </label>
      <input type="email" name="email_address">
    </div>
    <!-- Zip -->
    <div class="form-group">
      <label> Zip Code <span class="asteric">*</span>
      </label>
      <input type="text" name="zip_code">
    </div>
    <!-- Application Tag -->
    <div class="form-group">
      <label>Application Tag</label>
      <input type="text" name="application_tag" placeholder="Optional reference">
    </div>
    <
  </div>
</div>