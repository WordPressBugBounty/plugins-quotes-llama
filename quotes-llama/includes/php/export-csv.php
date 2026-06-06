<?php
/**
 * Quotes Llama Export CSV.
 *
 * Description. Export quotes to a .csv file.
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

	$quotes_llama_export_csv = new QuotesLlama_Backup( $this->check_option( 'export_delimiter' ) );
	$quotes_llama_export_csv->create_csv();

} else {
	$this->msg = $this->message( '', 'nonce' );
}
