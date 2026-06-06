<?php
/**
 * Quotes Llama Search.
 *
 * Description. $_GET for search in page and search bar..
 *
 * @Link        http://wordpress.org/plugins/quotes-llama/
 * @package     quotes-llama
 * @since       3.0.0
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Quotes_Llama;

// Deny access except through WordPress.
defined( 'ABSPATH' ) || die( 'Cannot access pages directly.' );

if ( isset( $_SERVER['HTTP_HOST'] ) ) {
	$quotes_llama_server_host = esc_url_raw( wp_unslash( $_SERVER['HTTP_HOST'] ) );
	if ( isset( $_SERVER['REQUEST_URI'] ) ) {
		$quotes_llama_server_uri = esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) );
		if ( ! empty( $quotes_llama_server_host && $quotes_llama_server_uri ) ) {
			$quotes_llama_current_url = $quotes_llama_server_host . $quotes_llama_server_uri;
			$quotes_llama_new_url     = remove_query_arg(
				array( '_wp_http_referer', 'as', 'paged', 'action', 'action2' ),
				stripslashes( $quotes_llama_current_url )
			);

			if ( wp_safe_redirect( $quotes_llama_new_url ) ) {
				exit;
			}
		}
	}
}
