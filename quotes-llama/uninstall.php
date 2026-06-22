<?php
/**
 * Quotes Llama Uninstall
 *
 * Description. Uninstall plugin.
 *
 * @Link        http://wordpress.org/plugins/quotes-llama/
 * @package     quotes-llama
 * @since       1.0.0
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

// If options exist.
if ( get_option( 'quotes-llama-settings' ) ) {
	delete_option( 'quotes-llama-settings' );
	unregister_setting( 'quotes-llama-settings', 'quotes-llama-settings' );
}
