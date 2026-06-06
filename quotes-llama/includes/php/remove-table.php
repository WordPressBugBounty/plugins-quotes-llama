<?php
/**
 * Quotes Llama Remove table.
 *
 * Description. Remove quotes table from database.
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

if ( check_admin_referer( 'quotes_llama_remove_table_nonce', 'quotes_llama_remove_table_nonce' ) ) {
	$quotes_llama_sql = $this->db_remove();
} else {
	$this->msg = $this->message( '', 'nonce' );
}
