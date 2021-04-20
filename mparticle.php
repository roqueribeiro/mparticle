<?php

/**
 * @package mParticle
 * @version 1.7.2
 */
/*
Plugin Name: mParticle Wordpress
Plugin URI: http://levelhard.com.br
Description: mParticle Wordpress Integrator
Author: Roque Ribeiro
Version: 1.0.0
Author URI: http://levelhard.com.br
*/

require_once(plugin_dir_path(__FILE__) . 'class.mparticle.php');

function insert_scripts()
{
    // Create fake script element with authentication data parameters
    wp_enqueue_script('auth_parameters', plugin_dir_url(__FILE__) . '#', array(), '1.0.0', false);

    wp_enqueue_script('load_sample', plugin_dir_url(__FILE__) . 'events/load_sample.js', array(), '1.0.0', false);
    wp_enqueue_script('click_sample', plugin_dir_url(__FILE__) . 'events/click_sample.js', array(), '1.0.0', false);
}

// Add encripted data to fake element of authentication
function add_data_attribute($tag, $handle)
{
    $auth_host = MParticle::auth_host();
    $auth_encoded = MParticle::auth_encoded();
    if ('auth_parameters' !== $handle) return $tag;
    return str_replace(' src', ' data-host="' . $auth_host . '" data-auth="' . $auth_encoded . '" src', $tag);
}
add_filter('script_loader_tag', 'add_data_attribute', 10, 2);

// Add scripts in wordpress
add_action('wp_head', 'insert_scripts'); // Wordpress Pages
add_action('admin_head', 'insert_scripts'); // Admin Panel
