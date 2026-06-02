<?php
/**
 * Quotes Llama $_GET for bulk delete confirmation.
 *
 * Description. $_GET for bulk delete confirmation.
 *
 * @Link        http://wordpress.org/plugins/quotes-llama/
 * @package     quotes-llama
 * @since       3.0.0
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Quotes_Llama;

$nonce = isset( $_GET['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ) : '';


// Lower select box is action2.
if ( wp_verify_nonce( $nonce, 'llama_admin_delete_bulk' ) ) {
	$bd = isset( $_GET['bd'] ) ? sanitize_text_field( wp_unslash( $_GET['bd'] ) ) : '';

	// Success.
	if ( 1 <= $bd ) {
		$this->msg = $this->message( esc_html__( 'Transaction completed: ', 'quotes-llama' ) . $bd . ' ' . esc_html__( 'Quotes deleted.', 'quotes-llama' ), 'yay' );
	}

	// Failed.
	if ( 'n' === $bd ) {
		$this->msg = $this->message( esc_html__( 'Transaction failed: Unable to delete quotes.', 'quotes-llama' ), 'nay' );
	}

	// Empty checks.
	if ( 'u' === $bd ) {
		$this->msg = $this->message( esc_html__( 'Transaction failed: No quotes selected.', 'quotes-llama' ), 'nay' );
	}

	// Empty params.
	if ( 'p' === $bd ) {
		$this->msg = $this->message( esc_html__( 'Transaction failed: Select a bulk action from the drop-down.', 'quotes-llama' ), 'nay' );
	}
} else {
	$this->msg = $this->message( '', 'nonce' );
}