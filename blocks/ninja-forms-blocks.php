<?php

/** IMPORTANT: This file MUST be PHP 5.2 compatible */

// Check for the autoloader - common development issue.
if(file_exists($autoloader = plugin_dir_path(__FILE__) . '../vendor/autoload.php')) {
    require $autoloader;
} else {
    add_action( 'admin_notices', 'ninja_forms_blocks_autoloader_notice' );
    function ninja_forms_blocks_autoloader_notice() {
        if( defined('WP_DEBUG') && WP_DEBUG ){
            echo sprintf(
                '<div class="notice notice-error"><p>%s</p></div>',
                __( 'Autoloader not found for Ninja Forms Blocks - try running <code>composer install</code>' )
            );
        } else {
            echo sprintf(
                '<div class="notice notice-error"><p>%s</p></div>',
                __( 'Ninja Forms Blocks was unable to load.' )
            );
        }
    }
    return;
}

// Check for PHP version compatibility.
if (!version_compare(PHP_VERSION, '7.1.0', '>=')) {
    return;
}

include_once plugin_dir_path(__FILE__) . '/bootstrap.php';
