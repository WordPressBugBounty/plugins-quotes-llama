<?php
/**
 * Quotes Llama delete quote.
 *
 * Description. $_POST for deleting a quote from the table.
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

$quotes_llama_nonce = isset( $_GET['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ) : '';
$quotes_llama_id    = isset( $_GET['quote_id'] ) ? sanitize_text_field( wp_unslash( $_GET['quote_id'] ) ) : '';
$quotes_llama_s     = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
$quotes_llama_s     = ! empty( $quotes_llama_s ) ? '&s=' . $quotes_llama_s : '';
$quotes_llama_sc    = isset( $_GET['sc'] ) ? sanitize_text_field( wp_unslash( $_GET['sc'] ) ) : '';
$quotes_llama_sc    = ! empty( $quotes_llama_sc ) ? '&sc=' . $quotes_llama_sc : '';
$quotes_llama_paged = isset( $_GET['paged'] ) ? sanitize_text_field( wp_unslash( $_GET['paged'] ) ) : '';
$quotes_llama_paged = ! empty( $quotes_llama_paged ) ? '&paged=' . $quotes_llama_paged : '';

// Include Delete class.
if ( ! class_exists( 'QuotesLlama_Delete' ) ) {
	require_once QL_PATH . 'includes/classes/class-quotesllama-delete.php';
}

$quotes_llama_delete = new QuotesLlama_Delete();

if ( wp_verify_nonce( $quotes_llama_nonce, 'delete_edit' ) ) {
	$quotes_llama_d = $quotes_llama_delete->ql_delete( $quotes_llama_id );
	header( 'Location: ' . get_bloginfo( 'wpurl' ) . '/wp-admin/admin.php?page=quotes-llama&d=' . $quotes_llama_d . $quotes_llama_s . $quotes_llama_sc . $quotes_llama_paged . '&_wpnonce=' . $quotes_llama_nonce );
} else {
	$this->msg = $this->message( '', 'nonce' );
}


