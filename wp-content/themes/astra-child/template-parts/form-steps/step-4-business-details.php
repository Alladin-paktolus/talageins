<div class="form-container">
  <div class="form-heading">
    <h2>Business Details</h2>
    <p class="sub-title"> Legal structure, ownership, and operations. </p>
  </div>
  <div class="form-grid">
    <!-- LEGAL ENTITY -->
    <div class="form-group">
      <label> Legal Entity Type <span class="asteric">*</span>
      </label>
      <div class="custom-select full-width legal-entity-select">
        <!-- HIDDEN INPUT -->
        <input type="hidden" name="legal_entity_type" />
        <!-- SELECT BOX -->
        <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox" aria-expanded="false">
          <span class="selected-text"> Select entity type </span>
          <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
        </div>
        <!-- OPTIONS -->
        <div class="options-container" role="listbox">
          <div class="option" role="option" data-value="Sole Proprietorship"> Sole Proprietorship </div>
          <div class="option" role="option" data-value="Partnership"> Partnership </div>
          <div class="option" role="option" data-value="Limited Liability Company (LLC)"> Limited Liability Company (LLC) </div>
          <div class="option" role="option" data-value="Corporation"> Corporation </div>
          <div class="option" role="option" data-value="Nonprofit Organization"> Nonprofit Organization </div>
        </div>
      </div>
    </div>
    <!-- EIN -->
    <div class="form-group">
      <label>EIN</label>
      <input type="text" name="ein" autocomplete="off" />
    </div>
    <!-- ANNUAL SALES -->
    <div class="form-group">
      <label>Annual Sales</label>
      <input type="text" name="annual_sales" autocomplete="off" inputmode="numeric" />
    </div>
    <!-- WEBSITE AVAILABLE -->
    <div class="form-group full-width radio-button">
      <label class="radio-btn-label"> Do you have a website? <span class="asteric">*</span>
      </label>
      <div class="toggle-btn-group">
        <!-- YES -->
        <input type="radio" name="website_available" id="website-yes" value="yes" hidden />
        <label for="website-yes" class="toggle-btn"> YES </label>
        <!-- NO -->
        <input type="radio" name="website_available" id="website-no" value="no" checked hidden />
        <label for="website-no" class="toggle-btn"> NO </label>
      </div>
    </div>
    <!-- WEBSITE URL -->
    <div class="form-group">
      <label> Website URL <span class="asteric">*</span>
      </label>
      <input type="url" name="website_url" placeholder="https://" autocomplete="url" />
    </div>
    <!-- FOUNDED YEAR -->
    <div class="form-group">
      <label> Founded Year <span class="asteric">*</span>
      </label>
      <input type="text" name="founded_year" placeholder="YYYY" inputmode="numeric" maxlength="4" />
    </div>
  </div>
  <hr class="m-0" />
  <!-- OWNERS -->
  <div class="details-card gap-16 owners-wrapper">
    <div class="heading-section">
      <h3>Owners</h3>
        <button type="button" id="add-owner-btn" class="btn btn-outline add-owner-btn">
          <i class="fa fa-plus" aria-hidden="true"></i> Add Owner
        </button>
    </div>
    <!-- OWNER 1 -->
    <div class="card-gray gap-24">
      <div class="owner-name full-width">
        <h4>Owner 1</h4>
        <i class="fa fa-times close-icon" aria-hidden="true"></i>
      </div>
      <div class="form-grid full-width">
        <!-- NAME -->
        <div class="form-group">
          <label> Name & Title <span class="asteric">*</span>
          </label>
          <input type="text" name="owner_1_name_title" placeholder="Jane Doe, CEO" autocomplete="name" />
        </div>
        <!-- OWNERSHIP -->
        <div class="form-group">
          <label> Percentage of Ownership <span class="asteric">*</span>
          </label>
          <input type="text" name="owner_1_ownership_percentage" placeholder="%" inputmode="numeric" />
        </div>
        <!-- PAYROLL -->
        <div class="form-group">
          <label> Include in Payroll <span class="asteric">*</span>
          </label>
          <div class="toggle-btn-group">
            <!-- INCLUDE -->
            <input type="radio" name="owner_1_payroll" id="include-payroll-1" value="include" hidden />
            <label for="include-payroll-1" class="toggle-btn payroll-toggle"> INCLUDE </label>
            <!-- EXCLUDE -->
            <input type="radio" name="owner_1_payroll" id="exclude-payroll-1" value="exclude" checked hidden />
            <label for="exclude-payroll-1" class="toggle-btn payroll-toggle"> EXCLUDE </label>
          </div>
        </div>
        <!-- OFFICER PAYROLL -->
        <div class="form-group">
          <label> Officer Payroll <span class="asteric">*</span>
          </label>
          <input type="text" name="owner_1_officer_payroll" placeholder="0" inputmode="numeric" />
        </div>
      </div>
    </div>
    <!-- OWNER 2 -->
    <div class="card-gray gap-32">
      <div class="owner-name full-width">
        <h4>Owner 2</h4>
        <i class="fa fa-times close-icon" aria-hidden="true"></i>
      </div>
      <div class="form-grid full-width">
        <!-- NAME -->
        <div class="form-group">
          <label> Name & Title <span class="asteric">*</span>
          </label>
          <input type="text" name="owner_2_name_title" placeholder="Jane Doe, CEO" autocomplete="name" />
        </div>
        <!-- OWNERSHIP -->
        <div class="form-group">
          <label> Percentage of Ownership <span class="asteric">*</span>
          </label>
          <input type="text" name="owner_2_ownership_percentage" placeholder="%" inputmode="numeric" />
        </div>
        <!-- PAYROLL -->
        <div class="form-group">
          <label> Include in Payroll <span class="asteric">*</span>
          </label>
          <div class="toggle-btn-group">
            <!-- INCLUDE -->
            <input type="radio" name="owner_2_payroll" id="include-payroll-2" value="include" hidden />
            <label for="include-payroll-2" class="toggle-btn payroll-toggle"> INCLUDE </label>
            <!-- EXCLUDE -->
            <input type="radio" name="owner_2_payroll" id="exclude-payroll-2" value="exclude" checked hidden />
            <label for="exclude-payroll-2" class="toggle-btn payroll-toggle"> EXCLUDE </label>
          </div>
        </div>
        <!-- OFFICER PAYROLL -->
        <div class="form-group">
          <label> Officer Payroll <span class="asteric">*</span>
          </label>
          <input type="text" name="owner_2_officer_payroll" placeholder="0" inputmode="numeric" />
        </div>
      </div>
    </div>
  </div>
</div>