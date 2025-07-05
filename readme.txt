=== Safe Login Changer ===
Contributors: famaserver
Tags: login, wp-login, custom login url, security, hide login, change login
Requires at least: 5.5
Tested up to: 6.5
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Securely change the default WordPress login URL (wp-login.php) to a custom slug like `secret-login` to protect your site from brute-force attacks.

== Description ==

**Safe Login Changer** lets you hide the default WordPress login page by replacing `wp-login.php` with a custom URL of your choice, such as `https://example.com/secret-login`.

This enhances your site's security by reducing exposure to automated login attempts and bots.

= Key Features =

* Change the default login URL to anything you want.
* Easy to use – just choose a custom slug like `secret-login`.
* Blocks direct access to wp-login.php.
* Lightweight and fast, no dependencies like Composer or jQuery.
* Fully translatable (supports .po and .mo language files).

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/safe-login-changer` directory, or install it via the WordPress Plugin Repository.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to **Settings > Safe Login Changer**.
4. Set your custom login slug (e.g., `secret-login`) and click save.
5. Next time you want to log in, use: `https://yoursite.com/secret-login`

== Frequently Asked Questions ==

= What happens to wp-login.php? =

Access to `wp-login.php` is blocked with a message: “This page is not accessible.”

= What if I forget the custom login URL? =

You can disable the plugin by renaming its folder via FTP, or access your WordPress database and remove the `slc_login_slug` option.

== Changelog ==

= 1.0 =
* Initial release with custom login URL functionality.

== Upgrade Notice ==

= 1.0 =
Initial release – change the login URL to enhance your site's security.
