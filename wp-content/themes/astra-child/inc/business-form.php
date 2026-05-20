<?php
add_action('wp_ajax_load_policy_form_data','load_policy_form_data');
add_action('wp_ajax_nopriv_load_policy_form_data','load_policy_form_data');
function load_policy_form_data() {

    check_ajax_referer('policy_form_nonce','nonce');

    $agency_response = talage_api_request('https://demoapi.talageins.com/v1/api/agency',array(),'GET');
    
    $agency_data = array_map(function ($agency) {
        return array(
            'name'      => $agency['name'] ?? '',
            'agencyId'  => $agency['agencyId'] ?? '',
        );

    }, $agency_response['data']);


    $industry_response = talage_api_request('https://demoapi.talageins.com/v1/api/industry-codes',array(),'GET');

    $industry_data = array_map(function ($industry) {
        return array(
            'id'          => $industry['id'] ?? '',
            'name'        => $industry['description'] ?? '', //name of the industry
            'sic'         => $industry['sic'] ?? '', //SIC code
            'naics'       => $industry['naics'] ?? '', //NAICS code
            'category'    => $industry['category'] ?? '', // Profession name
            'industryCodeCategoryId' => $industry['industryCodeCategoryId'] ?? '', // 1 for NAICS, 2 for SIC
        );
    }, $industry_response['data']);


    wp_send_json_success(array(
        'agency_data'   => $agency_data,
        'industry_data' => $industry_data,
    ));

}
add_action('wp_ajax_save_policy_step', 'talage_save_policy_step');
add_action('wp_ajax_nopriv_save_policy_step', 'talage_save_policy_step');
function talage_save_policy_step() {
    $step = isset($_POST['step'])
        ? absint($_POST['step'])
        : 1;

    $form_data = isset($_POST['form_data'])
        ? json_decode(stripslashes($_POST['form_data']), true)
        : array();

     wp_send_json_success(array(
        'message' => 'Step saved successfully.',
        'step'    => $step,
        'data'    => $form_data,
    ));
}

add_action('wp_ajax_create_policy_step', 'talage_create_policy_step');
add_action('wp_ajax_nopriv_create_policy_step', 'talage_create_policy_step');
function talage_create_policy_step() {
    // Verify Nonce
    check_ajax_referer('policy_form_nonce', 'nonce');

    // Current Step
    $step = isset($_POST['step']) ? absint($_POST['step']) : 1;

    // Form Data
    $form_data = isset($_POST['form_data']) ? json_decode(stripslashes($_POST['form_data']), true) : array();

    $customer_name = trim($form_data['customer_name'] ?? '');
    $name_parts = explode(' ', $customer_name);
    $first_name = $name_parts[0] ?? '';
    unset($name_parts[0]);
    $last_name = implode(' ', $name_parts);

    $api_payload = array(
        'agencyId' => $form_data['agency_id'] ?? '',
        'businessName' => $form_data['business_name'] ?? '',
        'contacts' => array(
            array(
                'email'            => $form_data['email_address'] ?? '',
                'firstName'      => $first_name,
                'lastName'       => $last_name,
                'optedOutOnline'   => false,
                'phone'            => $form_data['phone_number'] ?? '',
                'primary'          => true,
            )
        ),
        'corporationType' => 'C',
        'dba' => $form_data['dba_name'] ?? '',
        'ein' => '123456789',
        'entityType' => 'Corporation',
        'exposures' => array(
            array(
                'annualRevenue'    => 500000,
                'exposureAmount'   => 500000,
                'exposureType'     => 'GeneralLiability',
                'payroll'          => 100000,
                'squareFeetOfArea' => 1200,
            )
        ),
        'founded' => '2010-04-01T12:00:00.000Z',
        'industryCode' => (int) ($form_data['industryCodeId'] ?? 0),
        'locations' => array(
            array(
                'address'           => '200 S. Virginia Street',
                'address2'          => '',
                'city'              => 'Reno',
                'constructionType'  => 'Masonry',
                'county'            => 'Washoe',
                'locationName'      => 'Main Location',
                'occupied'          => true,
                'sprinklered'       => false,
                'squareFeetOfArea'  => 1200,
                'state'             => 'NV',
                'stories'           => 1,
                'yearBuilt'         => 2010,
                'zipcode'           => $form_data['zip_code'] ?? '',
            )
        ),
        'mailingAddress'  => '200 S. Virginia Street',
        'mailingAddress2' => '',
        'mailingCity' => 'Reno',
        'mailingState' => 'NV',
        'mailingZipcode' => $form_data['zip_code'] ?? '',
        'managementStructure' => 'Owner',
        'phone' => $form_data['phone_number'] ?? '',
        'website' => 'https://testcompany.com',

    );

    /*    API Call    */
      
    $response = talage_api_request(
        'https://demoapi.talageins.com/v1/api/application',
        $api_payload,
        'POST'
    );

    /*    Error Response    */

    if (!$response['success']) {
        wp_send_json_error(array(
            'message' => $response['message'],
            'status'  => $response['status'],
            'data'    => $response['data'],
        ));

    }

    /*    Success Response    */

    wp_send_json_success(array(
        'message' => 'Step saved successfully.',
        'step'    => $step,
        'data'    => $response['data'],
    ));

}


/*
Main API Request Function
*/

function talage_api_request($endpoint, $body = array(), $method = 'POST') {

    /*    Get Saved Token    */
    $token = get_option('talage_api_token');
    if (empty($token)) {

        $token = talage_generate_auth_token();

        // Save Token
        if ($token) {
            update_option('talage_api_token', $token );
        } else {
            return array(
                'success' => false,
                'status'  => 401,
                'message' => 'Unable to generate API token.',
                'data'    => array(),
            );

        }

    }
    /*    CURL Setup    */

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL            => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => $method,
        CURLOPT_POSTFIELDS     => !empty($body) ? json_encode($body) : null,

        // Local SSL Fix
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: ' . $token
        ),

    ));

    /*    Execute CURL    */

    $response   = curl_exec($curl);
    $http_code  = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($curl);

    curl_close($curl);

    /*    CURL Error    */

    if ($curl_error) {

        return array(
            'success' => false,
            'status'  => 500,
            'message' => $curl_error,
            'data'    => array(),
        );

    }

    /*    Decode Response    */

    $response_data = json_decode($response, true);

    /*    Token Expired / Unauthorized    */

    if (
        $http_code === 401 ||
        (
            isset($response_data['message']) &&
            $response_data['message'] === 'User is not authenticated'
        )
    ) {

        // Generate New Token
        $new_token = talage_generate_auth_token();

        if (!$new_token) {

            return array(
                'success' => false,
                'status'  => 401,
                'message' => 'Authentication failed.',
                'data'    => array(),
            );

        }

        // Save Token
        update_option('talage_api_token', $new_token);

        // Retry API Request
        return talage_api_request($endpoint, $body, $method);

    }

    /*    API Error    */

    if ($http_code >= 400) {

        return array(
            'success' => false,
            'status'  => $http_code,
            'message' => 'API request failed.',
            'data'    => $response_data,
        );

    }

    /*    Success    */

    return array(
        'success' => true,
        'status'  => $http_code,
        'message' => 'Success',
        'data'    => $response_data,
    );

}


/*
Generate Auth Token
*/

function talage_generate_auth_token() {

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL            => 'https://demoapi.talageins.com/v1/api/auth/keys',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,

        CURLOPT_CUSTOMREQUEST  => 'POST',

        CURLOPT_POSTFIELDS => json_encode(array(
            'apiKey'    => '0582750d-1d87-4c33-8354-70bc18f17e0c',
            'apiSecret' => 'GRvoxBbn8mfzrZcUdws3agDja07uQa5qhSWUtL5CEl+Bx7dciDl8LL48MvF93GWqL+z+ahz3pSpJ2pTIxv5euoRgaLc6UVfq7AS61D+lzqi3FVwS+p1TLmg42tHy1E3NwNJPtWADZJZqZjyIr5CVjOsNVacrsbn+aFrdWyZ0e2JakNdt9BZfnZiKDFTFlWS+IuDBdSL1gEvePFLVcM4kfstatfzHhLTm/snWcGi1HQJW5EmspTRDJJfyG8jBrXYFeA/7R7PffvrKkKFdSdTQd3lQmEjP3zv6qn6n4bajbVqyRn5COrmWdfSvmB1i5BiRt6kTfBVIzNBfepncwDtnPQ=='
        )),

        // Local SSL Fix
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,

        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),

    ));

    $response   = curl_exec($curl);
    $curl_error = curl_error($curl);

    curl_close($curl);

    if ($curl_error) {

        return false;

    }
    $response_data = json_decode($response, true);
    return $response_data['token'] ?? false;

}

add_action('wp_ajax_upload_custom_file', 'upload_custom_file');
add_action('wp_ajax_nopriv_upload_custom_file', 'upload_custom_file');
function upload_custom_file() {

    require_once ABSPATH . 'wp-admin/includes/file.php';

    if (empty($_FILES['custom_file'])) {
        wp_send_json_error('No file uploaded');
    }

    $uploadedfile = $_FILES['custom_file'];

    // Original file name
    $original_name = sanitize_file_name($uploadedfile['name']);

    // Extension
    $ext = pathinfo($original_name, PATHINFO_EXTENSION);

    // Unique file name for server
    $new_file_name = uniqid('file_') . '_' . time() . '.' . $ext;

    // Rename uploaded file
    $uploadedfile['name'] = $new_file_name;

    $upload_overrides = [
        'test_form' => false
    ];

    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    $original_name = '<a href="' . esc_url($movefile['url']) . '" target="_blank">' . esc_html($original_name) . '</a>';
    if ($movefile && !isset($movefile['error'])) {

        wp_send_json_success([
            'file_url'       => $movefile['url'],
            'real_file_name' => $original_name,
            'saved_name'     => basename($movefile['file'])
        ]);

    } else {

        wp_send_json_error($movefile['error']);

    }

    wp_die();
}


// Remove File
add_action('wp_ajax_remove_uploaded_file', 'remove_uploaded_file');
add_action('wp_ajax_nopriv_remove_uploaded_file', 'remove_uploaded_file');
function remove_uploaded_file() {
    if (!empty($_POST['file_url'])) {
        $file_url = esc_url_raw($_POST['file_url']);
        $upload_dir = wp_upload_dir();
        $file_path = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $file_url);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
    wp_send_json_success();
    wp_die();
}