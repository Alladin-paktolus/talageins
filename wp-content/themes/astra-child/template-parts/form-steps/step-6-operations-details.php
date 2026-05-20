<div class="form-container">
  <div class="details-card gap-32 locations-wrapper">
    <!-- LOCATION 1 -->
    <div class="policy-operation-details" data-set="GL" style="display: none;">
      <div class="heading-section">
        <div class="form-title">
          <h2>Operations</h2>
          <p>Add each location where the business operates.</p>
        </div>
        <button type="button" class="btn btn-outline add-location-btn">
          <i class="fa fa-plus" aria-hidden="true"></i> Add Location </button>
      </div>
      <div class="card-gray gap-26 location-item">
        <div class="owner-name full-width mb-16">
          <h4>Location 1</h4>
          <i class="fa fa-times close-icon" aria-hidden="true"></i>
        </div>
        <div class="form-grid full-width">
          <!-- STREET ADDRESS -->
          <div class="form-group">
            <label> Street Address <span class="asteric">*</span>
            </label>
            <input type="text" name="location_1_street_address" placeholder="Jane Doe, CEO" autocomplete="street-address" aria-required="true" />
          </div>
          <!-- APARTMENT -->
          <div class="form-group">
            <label>Apartment / Suite / Other</label>
            <input type="text" name="location_1_apartment" autocomplete="address-line2" />
          </div>
          <!-- CITY -->
          <div class="form-group">
            <label> City <span class="asteric">*</span>
            </label>
            <input type="text" name="location_1_city" autocomplete="address-level2" aria-required="true" />
          </div>
          <!-- STATE -->
          <div class="form-group">
            <label> State <span class="asteric">*</span>
            </label>
            <div class="custom-select full-width">
              <input type="hidden" name="location_1_state" value="AZ" />
              <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox" aria-expanded="false">
                <span class="selected-text">AZ</span>
                <i class="fa-solid fa-chevron-down arrow-icon"></i>
              </div>
              <div class="options-container">
                <div class="option active" data-value="AZ"> AZ </div>
                <div class="option" data-value="CA"> CA </div>
              </div>
            </div>
          </div>
          <!-- ZIP CODE -->
          <div class="form-group">
            <label> Zip Code <span class="asteric">*</span>
            </label>
            <input type="text" name="location_1_zip_code" inputmode="numeric" autocomplete="postal-code" aria-required="true" />
          </div>
          <!-- EMPLOYEE TYPE -->
          <div class="form-group">
            <label>Employees Type</label>
            <div class="custom-select full-width">
              <input type="hidden" name="location_1_employee_type" value="8742 - Outside Sales" />
              <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox" aria-expanded="false">
                <span class="selected-text"> 8742 - Outside Sales </span>
                <i class="fa-solid fa-chevron-down arrow-icon"></i>
              </div>
              <div class="options-container">
                <div class="option active" data-value="8742 - Outside Sales"> 8742 - Outside Sales </div>
              </div>
            </div>
            <p class="note-lbl"> Activity / NCCI state code </p>
          </div>
          <!-- DEFAULT CARRIER -->
          <div class="form-group">
            <label>Default Carrier</label>
            <div class="custom-select full-width">
              <input type="hidden" name="location_1_default_carrier" value="CNA" />
              <div class="select-box">
                <span class="selected-text">CNA</span>
                <i class="fa-solid fa-chevron-down arrow-icon"></i>
              </div>
              <div class="options-container">
                <div class="option active" data-value="CNA"> CNA </div>
              </div>
            </div>
          </div>
          <!-- FULL TIME -->
          <div class="form-group">
            <label> Full-Time Employees (excl. sub) <span class="asteric">*</span>
            </label>
            <input type="text" name="location_1_full_time_employee" inputmode="numeric" />
          </div>
          <!-- PART TIME -->
          <div class="form-group">
            <label> Part-Time Employees (excl. sub) <span class="asteric">*</span>
            </label>
            <input type="text" name="location_1_part_time_employee" inputmode="numeric" />
          </div>
          <!-- PAYROLL -->
          <div class="form-group">
            <label> Payroll <span class="asteric">*</span>
            </label>
            <input type="text" name="location_1_payroll" inputmode="numeric" />
            <p class="note-lbl"> Cannot be zero </p>
          </div>
        </div>
      </div>
    <!-- 
        LOCATION 2 -->
      <div class="card-gray gap-26 location-item">
        <div class="owner-name full-width mb-16">
          <h4>Location 2</h4>
          <i class="fa fa-times close-icon" aria-hidden="true"></i>
        </div>
        <div class="form-grid full-width">
          <div class="form-group">
            <label> Street Address <span class="asteric">*</span>
            </label>
            <input type="text" name="location_2_street_address" />
          </div>
          <div class="form-group">
            <label>Apartment / Suite / Other</label>
            <input type="text" name="location_2_apartment" />
          </div>
          <div class="form-group">
            <label> City <span class="asteric">*</span>
            </label>
            <input type="text" name="location_2_city" />
          </div>
          <!-- STATE -->
          <div class="form-group">
            <label> State <span class="asteric">*</span>
            </label>
            <div class="custom-select full-width">
              <input type="hidden" name="location_2_state" value="AZ" />
              <div class="select-box">
                <span class="selected-text">AZ</span>
                <i class="fa-solid fa-chevron-down arrow-icon"></i>
              </div>
              <div class="options-container">
                <div class="option active" data-value="AZ"> AZ </div>
              </div>
            </div>
          </div>
          <!-- ZIP -->
          <div class="form-group">
            <label> Zip Code <span class="asteric">*</span>
            </label>
            <input type="text" name="location_2_zip_code" />
          </div>
          <!-- EMPLOYEE TYPE -->
          <div class="form-group">
            <label>Employees Type</label>
            <div class="custom-select full-width">
              <input type="hidden" name="location_2_employee_type" value="8742 - Outside Sales" />
              <div class="select-box">
                <span class="selected-text"> 8742 - Outside Sales </span>
                <i class="fa-solid fa-chevron-down arrow-icon"></i>
              </div>
              <div class="options-container">
                <div class="option active" data-value="8742 - Outside Sales"> 8742 - Outside Sales </div>
              </div>
            </div>
            <p class="note-lbl"> Activity / NCCI state code </p>
          </div>
          <!-- DEFAULT CARRIER -->
          <div class="form-group">
            <label>Default Carrier</label>
            <div class="custom-select full-width">
              <input type="hidden" name="location_2_default_carrier" value="CNA" />
              <div class="select-box">
                <span class="selected-text">CNA</span>
                <i class="fa-solid fa-chevron-down arrow-icon"></i>
              </div>
              <div class="options-container">
                <div class="option active" data-value="CNA"> CNA </div>
              </div>
            </div>
          </div>
          <!-- FULL TIME -->
          <div class="form-group">
            <label> Full-Time Employees (excl. sub) <span class="asteric">*</span>
            </label>
            <input type="text" name="location_2_full_time_employee" inputmode="numeric" />
          </div>
          <!-- PART TIME -->
          <div class="form-group">
            <label> Part-Time Employees (excl. sub) <span class="asteric">*</span>
            </label>
            <input type="text" name="location_2_part_time_employee" inputmode="numeric" />
          </div>
          <!-- PAYROLL -->
          <div class="form-group">
            <label> Payroll <span class="asteric">*</span>
            </label>
            <input type="text" name="location_2_payroll" inputmode="numeric" />
            <p class="note-lbl"> Cannot be zero </p>
          </div>
        </div>
      </div>
    </div>
  </div>
     <?php get_template_part( 'template-parts/form-steps/step-6', 'operations-details-bop' ); ?>
</div>