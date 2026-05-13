<?php
add_action('wp_ajax_save_policy_step', 'save_policy_step');
add_action('wp_ajax_nopriv_save_policy_step', 'save_policy_step');

function save_policy_step() {
    check_ajax_referer('policy_form_nonce', 'nonce');

    $step      = $_POST['step'] ?? '';
    $form_data = $_POST['form_data'] ?? array();
    wp_send_json_success(array(
        'message' => 'Step saved successfully',
        'step'    => $step,
        'data'    => $form_data
    ));
}