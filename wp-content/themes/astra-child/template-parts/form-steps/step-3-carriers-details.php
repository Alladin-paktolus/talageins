<div class="form-container">
  <div class="form-heading">
    <h2>Select Carriers</h2>
    <p class="sub-title"> All carriers are pre-selected. Uncheck to exclude. </p>
  </div>
  <div class="policy-form-carriers" data-set="GL" style="display:none;">
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
    <p class="note" role="note"> Liberty Mutual selected - additional questions will appear in Step 7. </p>
  </div>
  <div class="policy-form-carriers" data-set="BOP">
    <div class="form-grid">
      <div class="form-group full-width">
        <label>Select Insurers <span class="asteric">*</span>
        </label>
        <div class="border-div">
          <!-- CHECKBOXES -->
          <div class="checkbox-group-wrapper grid-view" role="group" aria-label="Select insurers">
            <!-- ITEM -->
            <label class="custom-checkbox">
              <input type="checkbox" aria-label="Acuity" value="Acuity" checked />
              <span class="checkmark" aria-hidden="true"></span>
              <span class="checkbox-text">Acuity</span>
            </label>
            <!-- ITEM -->
            <label class="custom-checkbox">
              <input type="checkbox" aria-label="AmTrust" value="AmTrust" checked />
              <span class="checkmark" aria-hidden="true"></span>
              <span class="checkbox-text">AmTrust</span>
            </label>
            <!-- ITEM -->
            <label class="custom-checkbox">
              <input type="checkbox" aria-label="Chubb" value="Chubb" checked />
              <span class="checkmark" aria-hidden="true"></span>
              <span class="checkbox-text">Chubb</span>
            </label>
            <!-- ITEM -->
            <label class="custom-checkbox">
              <input type="checkbox" aria-label="Hartford" value="Hartford" checked />
              <span class="checkmark" aria-hidden="true"></span>
              <span class="checkbox-text">Hartford</span>
            </label>
            <!-- ITEM -->
            <label class="custom-checkbox">
              <input type="checkbox" aria-label="CNA" value="CNA" checked />
              <span class="checkmark" aria-hidden="true"></span>
              <span class="checkbox-text">CNA</span>
            </label>
            <!-- ITEM -->
            <label class="custom-checkbox">
              <input type="checkbox" aria-label="Liberty Mutual" value="Liberty Mutual" checked />
              <span class="checkmark" aria-hidden="true"></span>
              <span class="checkbox-text">Liberty Mutual</span>
            </label>
            <!-- ITEM -->
            <label class="custom-checkbox">
              <input type="checkbox" aria-label="Rainbow" value="Rainbow" checked />
              <span class="checkmark" aria-hidden="true"></span>
              <span class="checkbox-text">Rainbow</span>
            </label>
            <!-- ITEM -->
            <label class="custom-checkbox">
              <input type="checkbox" aria-label="Travelers" value="Travelers" checked />
              <span class="checkmark" aria-hidden="true"></span>
              <span class="checkbox-text">Travelers</span>
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="card-gray gap-12 carrier-card" data-carrier="Acuity" >
      <h4>Acuity-Specific</h4>
      <div class="form-group full-width">
        <label> Profession Type (per Acuity standard) <span class="asteric">*</span>
        </label>
        <!-- CUSTOM SELECT -->
        <div class="custom-select-wrapper">
          <div class="custom-select full-width" id="profession-select" tabindex="0" role="combobox" aria-labelledby="profession-label profession-selected" aria-haspopup="listbox" aria-expanded="false" aria-controls="profession-options">
            <!-- SELECT BOX -->
            <div class="select-box" role="button" tabindex="0" aria-label="Select Hartford profession class">
              <span class="selected-text" id="profession-selected"> Select Hartford profession class </span>
              <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
            </div>
            <!-- OPTIONS -->
            <div class="options-container" role="listbox" id="profession-options" aria-labelledby="profession-label">
              <div class="option active" role="option" aria-selected="true" tabindex="0"> Select Hartford profession class </div>
              <div class="option" role="option" tabindex="0"> Class A - Low Risk Office </div>
              <div class="option" role="option" tabindex="0"> Class B - Light Retail </div>
              <div class="option" role="option" tabindex="0"> Class C - Standard Services </div>
              <div class="option" role="option" tabindex="0"> Class D - Light Construction </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- amtrust specific card start -->
    <div class="card-gray gap-12 carrier-card" data-carrier="AmTrust" >
      <h4>AmTrust-Specific</h4>
      <div class="form-group full-width">
        <label id="profession-label"> Profession Type (per AmTrust standard) <span class="asteric">*</span>
        </label>
        <!-- CUSTOM SELECT -->
        <div class="custom-select-wrapper">
          <div class="custom-select full-width" id="profession-select" tabindex="0" role="combobox" aria-labelledby="profession-label profession-selected" aria-haspopup="listbox" aria-expanded="false" aria-controls="profession-options" aria-activedescendant="">
            <!-- SELECT BOX (FIXED) -->
            <div class="select-box" role="button" tabindex="0" aria-label="Select Hartford profession class">
              <span class="selected-text" id="profession-selected"> Select Hartford profession class </span>
              <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
            </div>
            <!-- OPTIONS -->
            <div class="options-container" role="listbox" id="profession-options">
              <div class="option active" role="option" id="option-0" aria-selected="true" tabindex="-1"> Select Hartford profession class </div>
              <div class="option" role="option" id="option-1" tabindex="-1"> Class A - Low Risk Office </div>
              <div class="option" role="option" id="option-2" tabindex="-1"> Class B - Light Retail </div>
              <div class="option" role="option" id="option-3" tabindex="-1"> Class C - Standard Services </div>
              <div class="option" role="option" id="option-4" tabindex="-1"> Class D - Light Construction </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- amtrust specific card end -->
    <!-- Chubb-Specific card start -->
    <div class="card-gray gap-12 carrier-card" data-carrier="Chubb" >
      <h4>Chubb-Specific</h4>
      <div class="form-group full-width">
        <label> Profession Type (per Chubb standard) <span class="asteric">*</span>
        </label>
        <!-- CUSTOM SELECT -->
        <div class="custom-select-wrapper">
          <div class="custom-select full-width" tabindex="0" role="combobox" aria-label="Profession Type" aria-haspopup="listbox" aria-expanded="false" aria-controls="profession-options" aria-activedescendant="">
            <!-- SELECT BOX (FIXED: removed tabindex + role is fine, but kept safe) -->
            <div class="select-box" role="button" tabindex="0" aria-label="Select Hartford profession class">
              <span class="selected-text"> Select profession class </span>
              <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
            </div>
            <!-- OPTIONS -->
            <div class="options-container" role="listbox" id="profession-options">
              <div class="option active" role="option" aria-selected="true" tabindex="-1"> Select profession class </div>
              <div class="option" role="option" tabindex="-1"> Class A - Low Risk Office </div>
              <div class="option" role="option" tabindex="-1"> Class B - Light Retail </div>
              <div class="option" role="option" tabindex="-1"> Class C - Standard Services </div>
              <div class="option" role="option" tabindex="-1"> Class D - Light Construction </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Chubb-Specific card end -->
    <!-- Hartford-Specific card start -->
    <div class="card-gray gap-12 carrier-card" data-carrier="Hartford" >
      <h4>Hartford-Specific</h4>
      <div class="form-group full-width">
        <label> Profession Type (per Hartford standard) <span class="asteric">*</span>
        </label>
        <!-- CUSTOM SELECT -->
        <div class="custom-select-wrapper">
          <div class="custom-select full-width" tabindex="0" role="combobox" aria-label="Profession Type" aria-haspopup="listbox" aria-expanded="false" aria-controls="profession-options" aria-activedescendant="">
            <!-- SELECT BOX -->
            <div class="select-box" role="button" tabindex="0" aria-label="Select Hartford profession class">
              <span class="selected-text"> Select profession class </span>
              <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
            </div>
            <!-- OPTIONS -->
            <div class="options-container" role="listbox" id="profession-options">
              <div class="option active" role="option" aria-selected="true" tabindex="-1"> Select profession class </div>
              <div class="option" role="option" tabindex="-1"> Class A - Low Risk Office </div>
              <div class="option" role="option" tabindex="-1"> Class B - Light Retail </div>
              <div class="option" role="option" tabindex="-1"> Class C - Standard Services </div>
              <div class="option" role="option" tabindex="-1"> Class D - Light Construction </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hartford-Specific card end -->
    <!-- CNA-Specific card start -->
    <div class="card-gray gap-12 carrier-card" data-carrier="CNA" >
      <h4>CNA-Specific</h4>
      <div class="form-group full-width">
        <label> Profession Type (per CNA standard) <span class="asteric">*</span>
        </label>
        <!-- CUSTOM SELECT -->
        <div class="custom-select-wrapper">
          <div class="custom-select full-width" tabindex="0" role="combobox" aria-label="Profession Type" aria-haspopup="listbox" aria-expanded="false" aria-controls="profession-options" aria-activedescendant="">
            <!-- SELECT BOX -->
            <div class="select-box" role="button" tabindex="0" aria-label="Select Hartford profession class">
              <span class="selected-text"> Select profession class </span>
              <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
            </div>
            <!-- OPTIONS -->
            <div class="options-container" role="listbox" id="profession-options">
              <div class="option active" role="option" aria-selected="true" tabindex="-1"> Select profession class </div>
              <div class="option" role="option" tabindex="-1"> Class A - Low Risk Office </div>
              <div class="option" role="option" tabindex="-1"> Class B - Light Retail </div>
              <div class="option" role="option" tabindex="-1"> Class C - Standard Services </div>
              <div class="option" role="option" tabindex="-1"> Class D - Light Construction </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CNA-Specific card end -->
    <!-- Liberty Mutual-Specific card start -->
    <div class="card-gray gap-12 carrier-card" data-carrier="Liberty Mutual" >
      <h4>Liberty Mutual-Specific</h4>
      <div class="form-group full-width">
        <label> Profession Type (per Liberty Mutual standard) <span class="asteric">*</span>
        </label>
        <!-- CUSTOM SELECT -->
        <div class="custom-select-wrapper">
          <div class="custom-select full-width" tabindex="0" role="combobox" aria-label="Profession Type" aria-haspopup="listbox" aria-expanded="false" aria-controls="profession-options" aria-activedescendant="">
            <!-- SELECT BOX -->
            <div class="select-box" role="button" tabindex="0" aria-label="Select Hartford profession class">
              <span class="selected-text"> Select profession class </span>
              <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
            </div>
            <!-- OPTIONS -->
            <div class="options-container" role="listbox" id="profession-options">
              <div class="option active" role="option" aria-selected="true" tabindex="-1"> Select profession class </div>
              <div class="option" role="option" tabindex="-1"> Class A - Low Risk Office </div>
              <div class="option" role="option" tabindex="-1"> Class B - Light Retail </div>
              <div class="option" role="option" tabindex="-1"> Class C - Standard Services </div>
              <div class="option" role="option" tabindex="-1"> Class D - Light Construction </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Liberty Mutual-Specific card end -->
    <!-- Rainbow-Specific card start -->
    <div class="card-gray gap-12 carrier-card" data-carrier="Rainbow" >
      <h4>Rainbow-Specific</h4>
      <div class="form-group full-width">
        <label> Profession Type (per Rainbow standard) <span class="asteric">*</span>
        </label>
        <!-- CUSTOM SELECT -->
        <div class="custom-select-wrapper">
          <div class="custom-select full-width" tabindex="0" role="combobox" aria-label="Profession Type" aria-haspopup="listbox" aria-expanded="false" aria-controls="profession-options" aria-activedescendant="">
            <!-- SELECT BOX -->
            <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox" aria-label="Select Hartford profession class">
              <span class="selected-text"> Select profession class </span>
              <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
            </div>
            <!-- OPTIONS -->
            <div class="options-container" role="listbox" id="profession-options">
              <div class="option active" role="option" aria-selected="true" tabindex="-1"> Select profession class </div>
              <div class="option" role="option" tabindex="-1"> Class A - Low Risk Office </div>
              <div class="option" role="option" tabindex="-1"> Class B - Light Retail </div>
              <div class="option" role="option" tabindex="-1"> Class C - Standard Services </div>
              <div class="option" role="option" tabindex="-1"> Class D - Light Construction </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-gray gap-12 carrier-card" data-carrier="Travelers" >
      <h4>Travelers-Specific</h4>
      <div class="form-group full-width">
        <label> Profession Type (per Travelers standard) <span class="asteric">*</span>
        </label>
        <!-- CUSTOM SELECT -->
        <div class="custom-select-wrapper">
          <div class="custom-select full-width" tabindex="0" role="combobox" aria-label="Profession Type" aria-haspopup="listbox" aria-expanded="false" aria-controls="profession-options" aria-activedescendant="">
            <!-- SELECT BOX -->
            <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox" aria-label="Select Hartford profession class">
              <span class="selected-text"> Select profession class </span>
              <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
            </div>
            <!-- OPTIONS -->
            <div class="options-container" role="listbox" id="profession-options">
              <div class="option active" role="option" aria-selected="true" tabindex="-1"> Select profession class </div>
              <div class="option" role="option" tabindex="-1"> Class A - Low Risk Office </div>
              <div class="option" role="option" tabindex="-1"> Class B - Light Retail </div>
              <div class="option" role="option" tabindex="-1"> Class C - Standard Services </div>
              <div class="option" role="option" tabindex="-1"> Class D - Light Construction </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <p class="note" role="note"> Travelers selected — they do not require this level of detail.. </p>
  </div>
  <!-- NOTE -->
</div>