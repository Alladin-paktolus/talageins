<div class="form-container">
  <div class="form-heading">
    <h2>Claims History</h2>
    <p class="sub-title"> Upload loss runs and provide details on past claims. </p>
  </div>
  <div class="form-grid">
    <!-- LOSS RUN REPORT -->
    <div class="form-group full-width">
      <label> Loss Run Reports <span class="asteric">*</span>
      </label>
      <div class="custom-upload">
        <input type="file" id="fileUpload" name="loss_run_reports" hidden aria-describedby="fileHelp" />
        <div class="upload-box" tabindex="0" role="button" aria-label="Upload loss run reports" onclick="document.getElementById('fileUpload').click()">
          <div class="icon">
            <img src="
							<?php echo get_stylesheet_directory_uri(); ?>/image/upload.svg" alt="upload icon" />
          </div>
          <div class="main-text"> Click here to upload loss run reports </div>
          <div class="sub-text"> PDF, XLSX, CSV — max 50MB </div>
        </div>
        <p class="upload-note" id="fileHelp"> Maximum file size 50MB </p>
      </div>
    </div>
  </div>
  <!-- PAST CLAIMS -->
  <div class="form-group full-width radio-button">
    <label class="radio-btn-label"> Any claims in the past four years? <span class="asteric">*</span>
    </label>
    <div class="toggle-btn-group">
      <!-- YES -->
      <input type="radio" name="past_claims" id="gl-yes" value="yes" checked hidden />
      <label for="gl-yes" class="toggle-btn"> YES </label>
      <!-- NO -->
      <input type="radio" name="past_claims" id="gl-no" value="no" hidden />
      <label for="gl-no" class="toggle-btn"> NO </label>
    </div>
  </div>
  <hr class="m-0" />
  <!-- CLAIMS WRAPPER -->
  <div class="details-card gap-16 claims-wrapper">
    <div class="heading-section">
      <h3>Claim Details</h3>
      <button type="button" id="add-claim-btn" class="btn btn-outline add-claim-btn">
        <i class="fa fa-plus" aria-hidden="true"></i> Add Claim </button>
    </div>
    <!-- CLAIM ITEM -->
    <div class="card-gray gap-24 claim-item" data-claim="1">
      <div class="owner-name full-width">
        <h4>Claim #1</h4>
        <i class="fa fa-times close-icon"></i>
      </div>
      <div class="form-grid full-width">
        <!-- POLICY TYPE -->
        <div class="form-group">
          <label> Policy Type <span class="asteric">*</span>
          </label>
          <div class="custom-select full-width">
            <input type="hidden" name="claim_policy_type[]" />
            <div class="select-box" tabindex="0">
              <span class="selected-text"> Select </span>
              <i class="fa-solid fa-chevron-down arrow-icon"></i>
            </div>
            <div class="options-container">
              <div class="option" data-value="GL"> GL </div>
              <div class="option" data-value="WC"> WC </div>
              <div class="option" data-value="BOP"> BOP </div>
            </div>
          </div>
        </div>
        <!-- CLAIM DATE -->
        <div class="form-group">
          <label> When did this claim happen? <span class="asteric">*</span>
          </label>
          <input type="text" name="claim_date[]" autocomplete="off" />
        </div>
        <!-- CLAIM STATUS -->
        <div class="form-group">
          <label> Claim Status <span class="asteric">*</span>
          </label>
          <div class="custom-select full-width">
            <input type="hidden" name="claim_status[]" />
            <div class="select-box">
              <span class="selected-text"> Select </span>
              <i class="fa-solid fa-chevron-down arrow-icon"></i>
            </div>
            <div class="options-container">
              <div class="option" data-value="Closed"> Closed </div>
              <div class="option" data-value="Open"> Open </div>
            </div>
          </div>
        </div>
        <!-- AMOUNT PAID -->
        <div class="form-group">
          <label> Amount Paid <span class="asteric">*</span>
          </label>
          <input type="text" name="amount_paid[]" placeholder="0" inputmode="numeric" />
        </div>
      </div>
      <!-- MISSED WORK -->
      <div class="form-group full-width radio-button">
        <label class="radio-btn-label"> Did this person miss work due to this claim? <span class="asteric">*</span>
        </label>
        <div class="toggle-btn-group">
          <!-- YES -->
          <input type="radio" name="missed_work_1" id="work-yes-1" value="yes" hidden />
          <label for="work-yes-1" class="toggle-btn"> YES </label>
          <!-- NO -->
          <input type="radio" name="missed_work_1" id="work-no-1" value="no" checked hidden />
          <label for="work-no-1" class="toggle-btn"> NO </label>
        </div>
      </div>
      <!-- LOSS TYPE -->
      <div class="form-group full-width">
        <label> Loss Type (CNA) <span class="asteric">*</span>
        </label>
        <div class="custom-select full-width">
          <input type="hidden" name="loss_type[]" />
          <div class="select-box">
            <span class="selected-text"> Select Loss Type </span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </div>
          <div class="options-container">
            <div class="option" data-value="Property Damage"> Property Damage </div>
            <div class="option" data-value="Injury"> Injury </div>
            <div class="option" data-value="Theft"> Theft </div>
          </div>
        </div>
      </div>
      <!-- SUBROGATION -->
      <div class="form-group full-width radio-button">
        <label class="radio-btn-label"> Is this loss in subrogation? <span class="asteric">*</span>
        </label>
        <div class="toggle-btn-group">
          <!-- YES -->
          <input type="radio" name="subrogation_loss_1" id="loss-yes-1" value="yes" hidden />
          <label for="loss-yes-1" class="toggle-btn"> YES </label>
          <!-- NO -->
          <input type="radio" name="subrogation_loss_1" id="loss-no-1" value="no" checked hidden />
          <label for="loss-no-1" class="toggle-btn"> NO </label>
        </div>
      </div>
      <!-- CLAIM SUMMARY -->
      <div class="form-group full-width">
        <label> Claim Summary <span class="asteric">*</span>
        </label>
        <textarea class="textarea" name="claim_summary[]" placeholder="Describe what happened…"></textarea>
      </div>
    </div>
  </div>
</div>