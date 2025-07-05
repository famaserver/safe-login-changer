<?php
/**
 * Plugin Name: Safe Login Changer
 * Plugin URI: https://famaserver.com/
 * Description: Securely change the default WordPress login URL (wp-login.php) to a custom URL slug of your choice.  
 * This helps protect your site from unauthorized access attempts and brute-force attacks by hiding the standard login page.
 * Version: 1.0
 * Author: Famaserver
 * Author URI: https://famaserver.com/
 * Text Domain: safe-login-changer
 * Domain Path: /languages
 * License: GPLv2 or later
 *
 * @package SafeLoginChanger
 */

if (!defined('ABSPATH')) exit;

class SafeLoginChanger {

    private $option_name = 'slc_login_slug';

    public function __construct() {
        add_action('init', [$this, 'redirect_login']);
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('init', [$this, 'load_textdomain']); // بارگذاری ترجمه در زمان مناسب
    }

    public function load_textdomain() {
        load_plugin_textdomain('safe-login-changer', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    public function redirect_login() {
    $slug = get_option($this->option_name, 'secret-login');

    $request_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $site_path = trim(parse_url(site_url(), PHP_URL_PATH), '/');

    // مسیر مورد انتظار برای آدرس ورود
    $expected_path = trim($site_path . '/' . $slug, '/');

    // اگر دقیقاً آدرس ورود سفارشی بود
    if ($request_path === $expected_path) {
        require_once ABSPATH . 'wp-login.php';
        exit;
    }

    // اگر درخواست wp-login.php بود و هنوز مجازه (با GET)
    if ($request_path === 'wp-login.php' && $_SERVER['REQUEST_METHOD'] === 'GET') {
        wp_die(__('This page is not accessible.', 'safe-login-changer'));
    }
    }


    public function add_settings_page() {
    add_options_page(
        __('Login URL Settings', 'safe-login-changer'), // Title of settings page
        __('Safe Login Changer', 'safe-login-changer'), // Name shown in menu
        'manage_options',
        'safe-login-changer',
        [$this, 'settings_page_html']
    );
   }

    public function register_settings() {
        register_setting('slc_settings', $this->option_name);
    }

    public function settings_page_html() {
        ?>
        <div class="wrap">
            <h1><?php _e('Safe Login Changer', 'safe-login-changer'); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('slc_settings');
                do_settings_sections('slc_settings');
                $slug = get_option($this->option_name, 'secret-login');
                ?>
                <label for="slc_login_slug"><?php _e('Custom login URL slug:', 'safe-login-changer'); ?></label>
                <input type="text" id="slc_login_slug" name="<?php echo esc_attr($this->option_name); ?>" value="<?php echo esc_attr($slug); ?>" />
                <p class="description"><?php _e('For example, enter "secret-login" to access login at yoursite.com/secret-login', 'safe-login-changer'); ?></p>
                <?php submit_button(__('Save Settings', 'safe-login-changer')); ?>
            </form>
        </div>
        <?php
    }
}

new SafeLoginChanger();
