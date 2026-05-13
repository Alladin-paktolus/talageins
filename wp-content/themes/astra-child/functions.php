<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style(
            'chld_thm_cfg_child',
                get_stylesheet_directory_uri() . '/style.css',
            array('astra-theme-css'),
            filemtime(get_stylesheet_directory() . '/style.css')
        );

         wp_enqueue_style(
            'font-awesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css',
            array(),
            '6.7.2'
        );

        wp_enqueue_script(
            'chld_thm_cfg_child',
                get_stylesheet_directory_uri() . '/js/script.js',
            array('jquery'),
            filemtime(
                get_stylesheet_directory() . '/js/script.js'
            ),
            true
        );

        wp_localize_script(
            'chld_thm_cfg_child',
            'policy_form',
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('policy_form_nonce'),
            )
        );

    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

include_once get_stylesheet_directory() . '/inc/business-form.php';

