=== Safe Login Changer ===
Contributors: famaserver
Donate link: https://famaserver.com/
Tags: login, security, wp-login, custom url, hide login, brute force protection
Requires at least: 5.0
Tested up to: 6.7
Stable tag: 1.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Securely change the default WordPress login URL (wp-login.php) to a custom URL slug of your choice.  
This helps protect your site from unauthorized access attempts and brute-force attacks by hiding the standard login page.

== Description ==

Safe Login Changer enables you to change the WordPress default login URL to a custom slug for enhanced security.

Key Features:
* Easily set a custom login URL slug from the plugin settings page.
* Protects your site against brute-force attacks by hiding the default login page.
* Supports multiple languages: Persian (fa_IR), Arabic (ar), Turkish (tr), Russian (ru), Spanish (es), French (fr).
* Lightweight and simple to use with no dependencies.

== Installation ==

1. Upload the entire `safe-login-changer` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Navigate to Settings > Login URL to set your custom login slug.
4. Save settings and access your login page at yoursite.com/your-custom-slug

== Frequently Asked Questions ==

= How do I access the login page if I forget the custom URL? =

If you forget your custom login URL, you have a few options:
- Check your database for the option named `slc_login_slug` in the `wp_options` table to find the current slug.
- Temporarily rename or deactivate the plugin via FTP or hosting file manager to restore access to the default `wp-login.php`.
- Alternatively, you can set the slug again via database or re-upload plugin with default settings.

= Does this plugin change the WordPress login URL permanently? =

Yes, it safely intercepts the login requests and only allows access through your custom slug while blocking access to `wp-login.php`.

== Screenshots ==

1. Plugin settings page to set custom login URL slug.

== Changelog ==

= 1.0 =
* Initial release

== Upgrade Notice ==

Upgrade to 1.0 for the initial stable version of Safe Login Changer.

== Additional Notes ==

Make sure to remember your custom login URL or store it safely to avoid lockout. If locked out, use FTP or hosting panel to deactivate the plugin.

== License ==

This plugin is licensed under the GPLv2 or later.

== Credits ==

Developed by Famaserver - https://famaserver.com/
