<div class="form-container">
  <div class="form-heading">
    <h2>Select Carriers</h2>
    <p class="sub-title"> All carriers are pre-selected. Uncheck to exclude. </p>
  </div>
  <div class="form-grid">
    <div class="form-group full-width">
      <label> Select Insurers <span class="asteric">*</span>
      </label>
      <div class="border-div">
        <!-- CHECKBOXES -->
        <div class="checkbox-group-wrapper" role="group" aria-label="Select insurers">
          <!-- Liberty Mutual -->
          <label class="custom-checkbox">
            <input type="checkbox" name="carrier_liberty_mutual" value="Liberty Mutual" />
            <span class="checkmark" aria-hidden="true"></span>
            <span class="checkbox-text"> Liberty Mutual </span>
          </label>
          <!-- Hartford -->
          <label class="custom-checkbox">
            <input type="checkbox" name="carrier_hartford" value="Hartford" />
            <span class="checkmark" aria-hidden="true"></span>
            <span class="checkbox-text"> Hartford </span>
          </label>
        </div>
      </div>
    </div>
  </div>
  <!-- HARTFORD CARD -->
  <div class="card-gray gap-12">
    <h4>Hartford-Specific</h4>
    <div class="form-group full-width">
      <label> Profession Type (per Hartford standard) <span class="asteric">*</span>
      </label>
      <!-- CUSTOM SELECT -->
      <div class="custom-select-wrapper">
        <div class="custom-select full-width hartford-profession-select" tabindex="0" role="combobox" aria-label="Profession Type" aria-expanded="false">
          <!-- HIDDEN INPUT -->
          <input type="hidden" name="hartford_profession_type" />
          <!-- SELECT BOX -->
          <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox" aria-label="Select Hartford profession class">
            <span class="selected-text"> Select Hartford profession class </span>
            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
          </div>
          <!-- OPTIONS -->
          <div class="options-container" role="listbox">
            <div class="option" role="option" tabindex="0" data-value="Class A - Low Risk Office"> Class A - Low Risk Office </div>
            <div class="option" role="option" tabindex="0" data-value="Class B - Light Retail"> Class B - Light Retail </div>
            <div class="option" role="option" tabindex="0" data-value="Class C - Standard Services"> Class C - Standard Services </div>
            <div class="option" role="option" tabindex="0" data-value="Class D - Light Construction"> Class D - Light Construction </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- NOTE -->
  <p class="note" role="note"> Liberty Mutual selected - additional questions will appear in Step 7. </p>
</div>