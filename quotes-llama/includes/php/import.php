<?php
/**
 * Quotes Llama Import.
 *
 * Description. Import quotes from .csv or .json.
 *
 * @Link        http://wordpress.org/plugins/quotes-llama/
 * @package     quotes-llama
 * @since       3.0.0
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Quotes_Llama;

if ( check_admin_referer( 'quote_llama_import_nonce', 'quote_llama_import_nonce' ) ) {

	if ( ! class_exists( 'QuotesLlama_Backup' ) ) {
		require_once QL_PATH . 'includes/classes/class-quotesllama-backup.php';
	}

	$import    = new QuotesLlama_Backup( $this->check_option( 'export_delimiter' ) );
	$nonce     = wp_create_nonce( 'quotes_llama_import' );
	$this->msg = $this->message( 'Transaction completed: ' . $import->generate_import( $nonce ), 'yay' );

} else {
	$this->msg = $this->message( '', 'nonce' );
}
