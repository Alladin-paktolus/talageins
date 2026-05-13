<?php
/*
Template Name: Policy Forms
*/

get_header();

?>
<div class="container-large">
    <section class="page-title">
        <h1>General Liability Application</h1>
        <p>Complete all steps to submit your application.</p>
    </section>

    <!-- STEPPER -->
    <section class="stepper-wrapper" aria-label="Application progress">
        <div class="stepper">
            <div class="step-item active" aria-current="step">
                <div class="step-number">1</div>
                <p>BASICS</p>
            </div>

            <div class="step-item disabled" aria-disabled="true">
                <div class="step-number">2</div>
                <p>POLICY</p>
            </div>

            <div class="step-item disabled" aria-disabled="true">
                <div class="step-number">3</div>
                <p>CARRIERS</p>
            </div>

            <div class="step-item disabled" aria-disabled="true">
                <div class="step-number">4</div>
                <p>BUSINESS</p>
            </div>

            <div class="step-item disabled" aria-disabled="true">
                <div class="step-number">5</div>
                <p>CLAIMS</p>
            </div>

            <div class="step-item disabled" aria-disabled="true">
                <div class="step-number">6</div>
                <p>OPERATIONS</p>
            </div>

            <div class="step-item disabled" aria-disabled="true">
                <div class="step-number">7</div>
                <p>QUESTIONS</p>
            </div>

            <div class="step-item disabled" aria-disabled="true">
                <div class="step-number">8</div>
                <p>DISCLOSURES</p>
            </div>
        </div>
    </section>

    <form id="multiStepForm">

        <!-- STEP 1 -->
        <section class="form-section form-step form-step-1 active" role="main">
            <?php get_template_part( 'template-parts/form-steps/step-1', 'basic-details' ); ?>
        </section>

        <!-- STEP 2 -->
        <section class="form-section form-step form-step-2" role="main">
            <?php get_template_part( 'template-parts/form-steps/step-2', 'policy-details' ); ?>
        </section>

        <!-- STEP 3 -->
        <section class="form-section form-step form-step-3" role="main">
            <?php get_template_part( 'template-parts/form-steps/step-3', 'carriers-details' ); ?>
        </section>

        <!-- STEP 4 -->
        <section class="form-section form-step form-step-4" role="main">
            <?php get_template_part( 'template-parts/form-steps/step-4', 'business-details' ); ?>
        </section>

        <!-- STEP 5 -->
        <section class="form-section form-step form-step-5" role="main">
            <?php get_template_part( 'template-parts/form-steps/step-5', 'claims-history' ); ?>
        </section>

        <!-- STEP 6 -->
        <section class="form-section form-step form-step-6" role="main">
            <?php get_template_part( 'template-parts/form-steps/step-6', 'operations-details' ); ?>
        </section>

        <!-- STEP 7 -->
        <section class="form-section form-step form-step-7" role="main">
            <?php get_template_part( 'template-parts/form-steps/step-7', 'underwriting-questions' ); ?>
        </section>

        <!-- STEP 8 -->
        <section class="form-section form-step form-step-8" aria-labelledby="disclosure-heading">
            <?php get_template_part( 'template-parts/form-steps/step-8', 'agreements-disclosures' ); ?>
        </section>

        <!-- FOOTER -->
        <section class="footer-section">

            <div class="form-footer">

                <button
                    type="button"
                    class="btn btn-outline back-btn disabled"
                    aria-disabled="true"
                >
                    <i class="fa-solid fa-arrow-left"></i>

                    Back
                </button>

                <button
                    type="button"
                    class="btn btn-primary next-btn"
                >
                    Save & Continue

                    <i class="fa-solid fa-arrow-right"></i>
                </button>

            </div>

        </section>

    </form>
</div>
<?php
get_footer();
?>