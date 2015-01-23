<?php
/**
 * Plugin Name: WooCustomer
 * Plugin URI: https://github.com/k4ml/woocustomer
 * Description: Custom customer management for woocommerce.
 * Version: 0.1
 * Author: k4ml
 * Author URI: http://k4ml.github.io/
 * Requires at least: 3.8
 * Tested up to: 4.1
 *
 * Text Domain: woocommerce
 * Domain Path: /i18n/languages/
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function add_woocustomer_menu() {    
    add_menu_page(
        'Add Customer',
        'Add Customer',
        'manage_options',
        'woocustomer/add-customer.php',
        ''
    );
}

add_action('admin_menu', 'add_woocustomer_menu');
add_action('init', function() {
    if ($_POST['addcustomer']) {
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];

        if (null == username_exists($email)) {
            $password = wp_generate_password(12, false);
            $user_id = wp_create_user($email, $password, $email);
            wp_update_user(array(
                    'ID' => $user_id,
                    'nickname' => $email,
                )
            );

            $user = new WP_User($user_id);
            $user->set_role('customer');
            $redirect = add_query_arg(array('page' => 'woocustomer/add-customer.php'), 'admin.php' );
            wp_redirect($redirect);
            die();
        }
    }
});
