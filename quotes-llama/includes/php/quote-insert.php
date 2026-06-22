<?php
/**
 * Quotes Llama insert quote.
 *
 * Description. $_POST for inserting a quote into the table.
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

if ( check_admin_referer( 'quotes_llama_form_nonce', 'quotes_llama_form_nonce' ) ) {
	$quotes_llama_allowed_html = $this->allowed_html( 'style' );

	if ( isset( $_POST['quote'] ) ) {
		$quotes_llama_quote = wp_check_invalid_utf8( wp_unslash( $_POST['quote'] ) ); // phpcs:ignore
		$quotes_llama_quote = wp_kses( trim( $quotes_llama_quote ), $quotes_llama_allowed_html );
	} else {
		$quotes_llama_quote = '';
	}

	if ( isset( $_POST['source'] ) ) {
		$quotes_llama_source = wp_check_invalid_utf8( wp_unslash( $_POST['source'] ) ); // phpcs:ignore
		$quotes_llama_source = wp_kses( trim( $quotes_llama_source ), $quotes_llama_allowed_html );
	} else {
		$quotes_llama_source = '';
	}

	$quotes_llama_title_name  = isset( $_POST['title_name'] ) ? sanitize_text_field( wp_unslash( $_POST['title_name'] ) ) : '';
	$quotes_llama_first_name  = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$quotes_llama_last_name   = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$quotes_llama_img_url     = isset( $_POST['img_url'] ) ? sanitize_text_field( wp_unslash( $_POST['img_url'] ) ) : '';
	$quotes_llama_author_icon = isset( $_POST['author_icon'] ) ? sanitize_text_field( wp_unslash( $_POST['author_icon'] ) ) : $this->check_option( 'author_icon' );
	$quotes_llama_source_icon = isset( $_POST['source_icon'] ) ? sanitize_text_field( wp_unslash( $_POST['source_icon'] ) ) : $this->check_option( 'source_icon' );
	$quotes_llama_category    = isset( $_POST['ql_category'] ) ? map_deep( wp_unslash( $_POST['ql_category'] ), 'sanitize_text_field' ) : array();
	$quotes_llama_category    = implode( ', ', $quotes_llama_category );
	$this->msg                = $this->insert( $quotes_llama_quote, $quotes_llama_title_name, $quotes_llama_first_name, $quotes_llama_last_name, $quotes_llama_source, $quotes_llama_img_url, $quotes_llama_author_icon, $quotes_llama_source_icon, $quotes_llama_category );
} else {
	$this->msg = $this->message( '', 'nonce' );
}
