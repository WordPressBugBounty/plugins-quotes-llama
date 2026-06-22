<?php
/**
 * Quotes Llama URL
 *
 * Description. Get quotes from Authors first and/or last names.
 *
 * @Link        http://wordpress.org/plugins/quotes-llama/
 * @package     quotes-llama
 * @since       3.1.6
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Quotes_Llama;

/**
 * Class Queries.
 */
class QuotesLlama_URL {

	/**
	 * Constructor.
	 *
	 * @since 3.1.6
	 * @access public
	 */
	public function __construct() {
	}

	/**
	 * [quotes-llama mode='url']
	 * Renders a number of quotes from all or category.
	 *
	 * @since 3.1.6
	 * @access public
	 *
	 * @param string $nonce - Nonce.
	 *
	 * @return String - HTML.
	 */
	public function quotes_from_url( $nonce = '' ) {

		if ( wp_verify_nonce( $nonce, 'quotes_llama_url' ) ) {

			global $wpdb;

			// Get first and last names from URL.
			$first = isset( $_GET['first'] ) ? sanitize_text_field( wp_unslash( $_GET['first'] ) ) : '';
			$last  = isset( $_GET['last'] ) ? sanitize_text_field( wp_unslash( $_GET['last'] ) ) : '';

			// If no Author in url.
			if ( empty( $first ) || empty( $last ) ) {
				return '<p>No author specified.</p>';
			}

			$ql = new QuotesLlama();

			// bool Make image round border.
			$border_radius = $ql->check_option( 'border_radius' );

			// bool Center image above quote.
			$image_at_top = $ql->check_option( 'image_at_top' );

			// bool Display image.
			$show_image = $ql->check_option( 'show_page_image' );

			// string Seperator or new line.
			$source_newline = $ql->check_option( 'source_newline' );

			// int Character limit.
			$char_limit = $ql->check_option( 'character_limit' );

			// Enqueue conditional css.
			$ql->css_conditionals();

			// URL css.
			wp_enqueue_style( 'quotes-llama-css-url' );

			// Uses Ajax if center image or text.
			if ( $image_at_top || $border_radius || $char_limit ) {
				$ql->scripts_localize_js();
				wp_enqueue_script( 'quotesllamaAjax' );
			}

			$quotes_data = $wpdb->get_results( // phpcs:ignore
				$wpdb->prepare(
					'SELECT * FROM ' . $wpdb->prefix . 'quotes_llama WHERE first_name = %s AND last_name = %s',
					$first,
					$last
				)
			);

			// Name and Image.
			$show_name_image = 1;

			foreach ( $quotes_data as $quote ) {

				// Set default icons if none. This is for backwards compatibility.
				if ( empty( $quote->author_icon ) ) {
					$quote->author_icon = $ql->check_option( 'author_icon' );
				}

				if ( empty( $quote->source_icon ) ) {
					$quote->source_icon = $ql->check_option( 'source_icon' );
				}

				// If first quote, display name and image.
				if ( $show_name_image ) {
					echo '<ul class="quotes-llama-url-list">';
					echo '<span class="quotes-llama-url-author">';

					if ( $quote->img_url ) {
						echo '<img src="' . esc_url( $quote->img_url ) . '" class="quotes-llama-url-img" hspace="5">';
					}

					$allowed_html = $ql->allowed_html( 'qform' );
					echo '<p>';
					echo wp_kses( $ql->show_icon( $quote->author_icon ), $allowed_html );
					echo wp_kses_post(
						$ql->clickable(
							trim(
								$quote->title_name . ' ' . $quote->first_name . ' ' . $quote->last_name
							)
						)
					);
					echo '</p>';
					echo '</span>';
				}

				// Or just the quote.
				echo '<li>';
					echo '<p class="quotes-llama-url-quote">';
					echo wp_kses( $ql->show_icon( $quote->author_icon ), $allowed_html );
					echo '<span class="quotes-llama-widget-more quotes-llama-url-span">';
					echo wp_kses_post( $ql->clickable( nl2br( $quote->quote ) ) );
					echo '</span>';
					echo '</p>';
				echo '</li>';
				$show_name_image = 0;
			}

			echo '</ul>';
		}
	}
}
