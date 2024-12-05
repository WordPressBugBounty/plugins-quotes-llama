<?php
/**
 * Quotes Llama delete confirmation.
 *
 * Description. $_GET for confirmation of a quote deleted from the table.
 *
 * @Link        http://wordpress.org/plugins/quotes-llama/
 * @package     quotes-llama
 * @since       3.0.0
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Quotes_Llama;

$nonce = isset( $_GET['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ) : '';

if ( wp_verify_nonce( $nonce, 'delete_edit' ) ) {
	$d = isset( $_GET['d'] ) ? sanitize_text_field( wp_unslash( $_GET['d'] ) ) : '';

	// Success.
	if ( 'y' === $d ) {
		$this->msg = $this->message( esc_html__( 'Transaction completed: Quote deleted.', 'quotes-llama' ), 'yay' );
	}

	// Failed.
	if ( 'n' === $d ) {
		$this->msg = $this->message( esc_html__( 'Transaction failed: Unable to delete quote.', 'quotes-llama' ), 'nay' );
	}
} else {
	$this->msg = $this->message( '', 'nonce' );
}