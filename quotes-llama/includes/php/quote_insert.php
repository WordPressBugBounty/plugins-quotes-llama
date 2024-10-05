<?php
/**
 * Quotes Llama insert quote.
 *
 * Description. $_POST for inserting a quote into the table.
 *
 * @Link        http://wordpress.org/plugins/quotes-llama/
 * @package     quotes-llama
 * @since       3.0.0
 * License:     Copyheart
 * License URI: http://copyheart.org
 */

namespace Quotes_Llama;

if ( check_admin_referer( 'quotes_llama_form_nonce', 'quotes_llama_form_nonce' ) ) {
	$allowed_html = $this->allowed_html( 'style' );

	if ( isset( $_POST['quote'] ) ) {
		$quote = wp_check_invalid_utf8( wp_unslash( $_POST['quote'] ) ); // phpcs:ignore
		$quote = wp_kses( trim( $quote ), $allowed_html );
	} else {
		$quote = '';
	}

	if ( isset( $_POST['source'] ) ) {
		$source = wp_check_invalid_utf8( wp_unslash( $_POST['source'] ) ); // phpcs:ignore
		$source = wp_kses( trim( $source ), $allowed_html );
	} else {
		$source = '';
	}

	$title_name  = isset( $_POST['title_name'] ) ? sanitize_text_field( wp_unslash( $_POST['title_name'] ) ) : '';
	$first_name  = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last_name   = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$img_url     = isset( $_POST['img_url'] ) ? sanitize_text_field( wp_unslash( $_POST['img_url'] ) ) : '';
	$author_icon = isset( $_POST['author_icon'] ) ? sanitize_text_field( wp_unslash( $_POST['author_icon'] ) ) : $this->check_option( 'author_icon' );
	$source_icon = isset( $_POST['source_icon'] ) ? sanitize_text_field( wp_unslash( $_POST['source_icon'] ) ) : $this->check_option( 'source_icon' );
	$category    = isset( $_POST['ql_category'] ) ? map_deep( wp_unslash( $_POST['ql_category'] ), 'sanitize_text_field' ) : array();
	$category    = implode( ', ', $category );
	$this->msg   = $this->insert( $quote, $title_name, $first_name, $last_name, $source, $img_url, $author_icon, $source_icon, $category );
} else {
	$this->msg = $this->message( '', 'nonce' );
}


