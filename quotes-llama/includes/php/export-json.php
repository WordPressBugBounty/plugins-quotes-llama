<?php
/**
 * Quotes Llama Export JSON.
 *
 * Description. Export quotes to a .json file.
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

if ( check_admin_referer( 'quotes_llama_export_nonce', 'quotes_llama_export_nonce' ) ) {

	if ( ! class_exists( 'QuotesLlama_Backup' ) ) {
		require_once QL_PATH . 'includes/classes/class-quotesllama-backup.php';
	}

	$quotes_llama_export_json = new QuotesLlama_Backup( $this->check_option( 'export_delimiter' ) );
	$quotes_llama_nonce       = wp_create_nonce( 'quotes_llama_export_json' );
	$quotes_llama_export_json->create_json( $quotes_llama_nonce );

} else {
	$this->msg = $this->message( '', 'nonce' );
}
