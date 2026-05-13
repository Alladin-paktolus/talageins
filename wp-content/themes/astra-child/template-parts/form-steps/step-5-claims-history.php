<div class="form-container">
    <div class="form-heading">
        <h2>Claims History</h2>

        <p class="sub-title">
            Upload loss runs and provide details on past claims.
        </p>
    </div>
    <div class="form-grid">
        <div class="form-group full-width">
            <label>Loss Run Reports <span class="asteric">*</span></label>
            <div class="custom-upload">
                <input type="file" id="fileUpload" hidden aria-describedby="fileHelp" />
                <div class="upload-box" tabindex="0" role="button" aria-label="Upload loss run reports"
                    onclick="document.getElementById('fileUpload').click()"
                    onkeydown="triggerFileUpload(event)">
                    <!-- Upload Icon -->
                    <div class="icon">
                        <img src="/image/upload.svg" alt="upload icon" aria-hidden="true" />
                    </div>

                    <!-- Main Text -->
                    <div class="main-text">
                        Click here to upload loss run reports
                    </div>

                    <!-- Sub Text -->
                    <div class="sub-text">PDF, XLSX, CSV — max 50MB</div>
                </div>
                <p class="upload-note" id="fileHelp">Maximum file size 50MB</p>
            </div>
        </div>
    </div>
    <div class="form-group full-width radio-button">
        <label class="radio-btn-label">
            Any claims in the past four years?
            <span class="asteric">*</span>
        </label>

        <div class="toggle-btn-group">
            <!-- YES -->

            <input type="radio" name="past-claims" id="gl-yes" checked hidden />

            <label for="gl-yes" class="toggle-btn"> YES </label>

            <!-- NO -->

            <input type="radio" name="past-claims" id="gl-no" hidden />

            <label for="gl-no" class="toggle-btn"> NO </label>
        </div>
    </div>
    <hr class="m-0" />
    <div class="details-card gap-16">
        <div class="heading-section">
            <h3>Claim Details (1)</h3>
            <button class="btn btn-outline add-owner-btn">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Claim
            </button>
        </div>
        <!-- =========================
Claim #1
========================= -->

        <div class="card-gray gap-24">
            <div class="owner-name full-width">
                <h4>Claim #1</h4>

                <i class="fa fa-times close-icon" aria-hidden="true"></i>
            </div>

            <div class="form-grid full-width">
                <!-- Policy Type* -->

                <!-- POLICY TYPE -->

                <div class="form-group">
                    <label> Policy Type<span class="asteric">*</span> </label>

                    <div class="custom-select full-width">
                        <!-- SELECT BOX -->

                        <div class="select-box" tabindex="0" role="button" aria-haspopup="listbox"
                            aria-expanded="false">
                            <span class="selected-text"> GL</span>

                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <!-- OPTIONS -->

                        <div class="options-container" role="listbox">
                            <div class="option" role="option">GL</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>
                        When did this claim happen?<span class="asteric">*</span>
                    </label>

                    <input type="text" value="" aria-required="true" autocomplete="off" />
                </div>

                <!-- CLAIM STATUS -->

                <div class="form-group">
                    <label> Claim Status<span class="asteric">*</span> </label>

                    <div class="custom-select full-width">
                        <!-- SELECT BOX -->

                        <div class="select-box">
                            <span class="selected-text">Closed</span>

                            <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                        </div>

                        <!-- OPTIONS -->

                        <div class="options-container" role="listbox">
                            <div class="option active">Closed</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Amount Paid<span class="asteric">*</span> </label>

                    <input type="text" value="" placeholder="0" inputmode="numeric" aria-required="true" />
                </div>
            </div>
            <div class="form-group full-width radio-button">
                <label class="radio-btn-label">
                    Did this person miss work due to this claim?
                    <span class="asteric">*</span>
                </label>

                <div class="toggle-btn-group">
                    <!-- YES -->

                    <input type="radio" name="missed-work" id="work-yes" checked hidden />

                    <label for="work-yes" class="toggle-btn"> YES </label>

                    <!-- NO -->

                    <input type="radio" name="missed-work" id="work-no" hidden />

                    <label for="work-no" class="toggle-btn"> NO </label>
                </div>
            </div>
            <div class="form-group full-width">
                <label> Loss Type (CNA)<span class="asteric">*</span> </label>

                <div class="custom-select full-width">
                    <!-- SELECT BOX -->

                    <div class="select-box">
                        <span class="selected-text"></span>

                        <i class="fa-solid fa-chevron-down arrow-icon" aria-hidden="true"></i>
                    </div>

                    <!-- OPTIONS -->

                    <div class="options-container" role="listbox">
                        <div class="option" role="option"></div>
                    </div>
                </div>
            </div>
            <div class="form-group full-width radio-button">
                <label class="radio-btn-label">
                    Is this loss in subrogation?
                    <span class="asteric">*</span>
                </label>

                <div class="toggle-btn-group">
                    <!-- YES -->

                    <input type="radio" name="subrogation-loss" id="loss-yes" checked hidden />

                    <label for="loss-yes" class="toggle-btn"> YES </label>

                    <!-- NO -->

                    <input type="radio" name="subrogation-loss" id="loss-no" hidden />

                    <label for="loss-no" class="toggle-btn"> NO </label>
                </div>
            </div>
            <div class="form-group full-width">
                <label>Claim Summary<span class="asteric">*</span> </label>

                <textarea class="textarea" placeholder="Describe what happened…"
                    aria-required="true"></textarea>
            </div>
        </div>
    </div>
</div>