<?php
/**
 * Quotes Llama bulk delete quotes.
 *
 * Description. $_GET for bulk deleting quotes from the table.
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

$quotes_llama_nonce = isset( $_GET['llama_admin_delete_bulk'] ) ? sanitize_text_field( wp_unslash( $_GET['llama_admin_delete_bulk'] ) ) : '';
$quotes_llama_paged = isset( $_GET['paged'] ) ? '&paged=' . sanitize_text_field( wp_unslash( $_GET['paged'] ) ) : '';

if ( wp_verify_nonce( $quotes_llama_nonce, 'llama_admin_delete_bulk' ) ) {

	// Include Delete class.
	if ( ! class_exists( 'QuotesLlama_Delete' ) ) {
		require_once QL_PATH . 'includes/classes/class-quotesllama-delete.php';
	}

	$quotes_llama_delete = new QuotesLlama_Delete();

	if ( isset( $_GET['bulkcheck'] ) ) { // Sanitizes each value below. Generates phpcs error.
		$quotes_llama_checks    = $_GET['bulkcheck']; // phpcs:ignore
		$quotes_llama_bulkcheck = array();
		foreach ( $quotes_llama_checks as $quotes_llama_key => $quotes_llama_val ) {
			$quotes_llama_bulkcheck[ $quotes_llama_key ] = ( isset( $checks[ $quotes_llama_key ] ) ) ? sanitize_text_field( wp_unslash( $quotes_llama_val ) ) : '';
		}

		$quotes_llama_bd = $quotes_llama_delete->quotes_delete_bulk( $quotes_llama_bulkcheck );
		header( 'Location: ' . get_bloginfo( 'wpurl' ) . '/wp-admin/admin.php?page=quotes-llama&bd=' . $quotes_llama_bd . '&_wpnonce=' . $quotes_llama_nonce . $quotes_llama_paged );
	} else { // If no quotes selected.
		header( 'Location: ' . get_bloginfo( 'wpurl' ) . '/wp-admin/admin.php?page=quotes-llama&bd=u&_wpnonce=' . $quotes_llama_nonce . $quotes_llama_paged );
	}
} else {
	$this->msg = $this->message( '', 'nonce' );
}
