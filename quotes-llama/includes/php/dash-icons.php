<?php
/**
 * Quotes Llama Dash-Icons html
 *
 * Description. Display drop-list of dash-icons and image icons.
 *
 * @Link        http://wordpress.org/plugins/quotes-llama/
 * @package     quotes-llama
 * @since       1.3.0
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Quotes_Llama;

// Deny access except through WordPress.
defined( 'ABSPATH' ) || die( 'Cannot access pages directly.' );

// These are the names of the WordPress dash-icons.
$quotes_llama_dash_icons_array = array(
	'menu',
	'menu-alt',
	'menu-alt2',
	'menu-alt3',
	'admin-site',
	'admin-site-alt',
	'admin-site-alt2',
	'admin-site-alt3',
	'dashboard',
	'admin-post',
	'admin-media',
	'admin-links',
	'admin-page',
	'admin-comments',
	'admin-appearance',
	'admin-plugins',
	'plugins-checked',
	'admin-users',
	'admin-tools',
	'admin-settings',
	'admin-network',
	'admin-home',
	'admin-generic',
	'admin-collapse',
	'filter',
	'admin-customizer',
	'admin-multisite',
	'welcome-write-blog',
	'welcome-add-page',
	'welcome-view-site',
	'welcome-widgets-menus',
	'welcome-comments',
	'welcome-learn-more',
	'format-aside',
	'format-image',
	'format-gallery',
	'format-video',
	'format-status',
	'format-quote',
	'format-chat',
	'format-audio',
	'camera',
	'camera-alt',
	'images-alt',
	'images-alt2',
	'video-alt',
	'video-alt2',
	'video-alt3',
	'media-archive',
	'media-audio',
	'media-code',
	'media-default',
	'media-document',
	'media-interactive',
	'media-spreadsheet',
	'media-text',
	'media-video',
	'playlist-audio',
	'playlist-video',
	'controls-play',
	'controls-pause',
	'controls-forward',
	'controls-skipforward',
	'controls-back',
	'controls-skipback',
	'controls-repeat',
	'controls-volumeon',
	'controls-volumeoff',
	'image-crop',
	'image-rotate',
	'image-rotate-left',
	'image-rotate-right',
	'image-flip-vertical',
	'image-flip-horizontal',
	'image-filter',
	'undo',
	'redo',
	'database-add',
	'database-export',
	'database-import',
	'database-remove 	',
	'database-view',
	'align-full-width',
	'align-pull-left',
	'align-pull-right',
	'button',
	'cloud-saved',
	'cloud-upload',
	'columns',
	'cover-image',
	'ellipsis',
	'embed-audio',
	'embed-generic',
	'embed-post',
	'embed-video',
	'exit',
	'heading',
	'html',
	'insert-after',
	'insert-before',
	'insert',
	'move',
	'shortcode',
	'info-outline',
	'table-col-after',
	'table-col-before',
	'table-col-delete',
	'table-row-after',
	'table-row-before',
	'table-row-delete',
	'saved',
	'editor-bold',
	'editor-italic',
	'editor-ul',
	'editor-ol',
	'editor-quote',
	'editor-alignleft',
	'editor-aligncenter',
	'editor-alignright',
	'editor-insertmore',
	'editor-spellcheck',
	'editor-distractionfree',
	'editor-contract',
	'editor-kitchensink',
	'editor-underline',
	'editor-justify',
	'editor-textcolor',
	'editor-paste-word',
	'editor-paste-text',
	'editor-removeformatting',
	'editor-video',
	'editor-customchar',
	'editor-outdent',
	'editor-indent',
	'editor-help',
	'editor-strikethrough',
	'editor-unlink',
	'editor-rtl',
	'editor-ltr',
	'editor-break',
	'editor-code',
	'editor-table',
	'editor-paragraph',
	'align-left',
	'align-right',
	'align-center',
	'align-none',
	'lock',
	'unlock',
	'calendar',
	'calendar-alt',
	'visibility',
	'hidden',
	'post-status',
	'edit',
	'trash',
	'sticky',
	'external',
	'arrow-up',
	'arrow-down',
	'arrow-right',
	'arrow-left',
	'arrow-up-alt',
	'arrow-down-alt',
	'arrow-right-alt',
	'arrow-left-alt',
	'arrow-up-alt2',
	'arrow-down-alt2',
	'arrow-right-alt2',
	'arrow-left-alt2',
	'sort',
	'leftright',
	'randomize',
	'list-view',
	'exerpt-view',
	'grid-view',
	'move',
	'share',
	'share-alt',
	'share-alt2',
	'email',
	'email-alt',
	'twitter',
	'rss',
	'facebook',
	'facebook-alt',
	'googleplus',
	'networking',
	'amazon',
	'google',
	'linkedin',
	'pinterest',
	'reddit',
	'podio',
	'spotify',
	'twitch',
	'whatsapp',
	'xing',
	'youtube',
	'hammer',
	'art',
	'migrate',
	'performance',
	'universal-access',
	'universal-access-alt',
	'tickets',
	'nametag',
	'clipboard',
	'heart',
	'megaphone',
	'schedule',
	'tide',
	'rest-api',
	'code-standards',
	'buddicons-activity',
	'buddicons-bbpress-logo',
	'buddicons-buddypress-logo',
	'buddicons-community',
	'buddicons-forums',
	'buddicons-friends',
	'buddicons-groups',
	'buddicons-pm',
	'buddicons-replies',
	'buddicons-topics',
	'buddicons-tracking',
	'wordpress',
	'wordpress-alt',
	'pressthis',
	'update',
	'update-alt',
	'screenoptions',
	'info',
	'cart',
	'feedback',
	'cloud',
	'translation',
	'tag',
	'category',
	'archive',
	'tagcloud',
	'text',
	'bell',
	'yes',
	'yes-alt',
	'no',
	'no-alt',
	'no-alt',
	'plus',
	'plus-alt',
	'plus-alt2',
	'minus',
	'dismiss',
	'marker',
	'star-filled',
	'star-half',
	'star-empty',
	'flag',
	'warning',
	'location',
	'location-alt',
	'vault',
	'shield',
	'shield-alt',
	'sos',
	'search',
	'slides',
	'text-page',
	'analytics',
	'chart-pie',
	'chart-bar',
	'chart-line',
	'chart-area',
	'groups',
	'businessman',
	'businesswoman',
	'businessperson',
	'id',
	'id-alt',
	'products',
	'awards',
	'forms',
	'testimonial',
	'portfolio',
	'book',
	'book-alt',
	'download',
	'upload',
	'backup',
	'lightbulb',
	'microphone',
	'desktop',
	'laptop',
	'tablet',
	'smartphone',
	'phone',
	'index-card',
	'carrot',
	'building',
	'store',
	'album',
	'palmtree',
	'tickets-alt',
	'money',
	'money-alt',
	'smiley',
	'thumbs-up',
	'thumbs-down',
	'layout',
	'paperclip',
	'color-picker',
	'edit-large',
	'edit-page',
	'airplane',
	'bank',
	'beer',
	'calculator',
	'car',
	'coffee',
	'drumstick',
	'food',
	'fullscreen-alt',
	'fullscreen-exit-alt',
	'games',
	'hourglass',
	'open-folder',
	'pdf',
	'pets',
	'printer',
	'privacy',
	'superhero',
	'superhero-alt',
);

// Image extensions.
$quotes_llama_image_extensions = array(
	'png',
	'jpg',
	'jpeg',
	'gif',
	'bmp',
	'svg',
);

$quotes_llama_upload_d  = wp_upload_dir();
$quotes_llama_icons_url = $quotes_llama_upload_d['baseurl'] . '/quotes-llama/';
$quotes_llama_icons_dir = $quotes_llama_upload_d['basedir'] . '/quotes-llama/';

// Get list of image files in upload directory.
$quotes_llama_all_img_png  = glob( $quotes_llama_icons_dir . '*.png' );
$quotes_llama_all_img_jpg  = glob( $quotes_llama_icons_dir . '*.jpg' );
$quotes_llama_all_img_jpeg = glob( $quotes_llama_icons_dir . '*.jpeg' );
$quotes_llama_all_img_gif  = glob( $quotes_llama_icons_dir . '*.gif' );
$quotes_llama_all_img_bmp  = glob( $quotes_llama_icons_dir . '*.bmp' );
$quotes_llama_all_img_svg  = glob( $quotes_llama_icons_dir . '*.svg' );
$quotes_llama_all_img      = array_merge( $quotes_llama_all_img_png, $quotes_llama_all_img_jpg, $quotes_llama_all_img_jpeg, $quotes_llama_all_img_gif, $quotes_llama_all_img_bmp, $quotes_llama_all_img_svg );

// For image icons html.
$quotes_llama_icons_img = '';

// For Dash-Icons html.
$quotes_llama_icons_dashicons = '';

// Get extenstions of image files.
$quotes_llama_ext = strtolower( pathinfo( $quotes_llama_icon_set_default, PATHINFO_EXTENSION ) );

// Current image file or dashicon.
if ( in_array( $quotes_llama_ext, $quotes_llama_image_extensions, true ) ) {
	$quotes_llama_icon_span = '<span class="quotes-llama-icons"><img src="' . $quotes_llama_icons_url . $quotes_llama_icon_set_default . '"></span>';
} else {
	$quotes_llama_icon_span = '<span class="dashicons dashicons-' . esc_attr( $quotes_llama_icon_set_default ) . '"></span></span>';
}

// Include validate image class.
if ( ! class_exists( 'QuotesLlama_Validate_Image' ) ) {
	require_once QL_PATH . 'includes/classes/class-quotesllama-validate-image.php';
}

$quotes_llama_qlv = new QuotesLlama_Validate_Image();

// Before.
$quotes_llama_icons_before = '<fieldset class="quotes-llama-icons-' . esc_attr( $quotes_llama_icon_set ) . '">
	<legend>' . esc_html( $quotes_llama_icon_set_title ) . '</legend>
	<a href="#quotes-llama-icons-' . esc_attr( $quotes_llama_icon_set ) . '-select">
		<span class="arr dashicons dashicons-arrow-down"></span>
		<span class="quotes-llama-icons-' . esc_attr( $quotes_llama_icon_set ) . '-sel">' .
		$quotes_llama_icon_span .
	'</a>
	<ul id="quotes-llama-icons-' . esc_attr( $quotes_llama_icon_set ) . '-select">';

// Create html for all image files.
foreach ( $quotes_llama_all_img as $quotes_llama_img ) {

	// Get ext to check for svg file.
	$quotes_llama_svg = strtolower( pathinfo( $quotes_llama_img, PATHINFO_EXTENSION ) );

	// Validate images... svg by extension only.
	if ( $quotes_llama_qlv->ql_validate_image( $quotes_llama_img ) || 'svg' === $quotes_llama_svg ) {
		$quotes_llama_img_path   = $quotes_llama_img;
		$quotes_llama_img        = str_replace( $quotes_llama_icons_dir, '', $quotes_llama_img );
		$quotes_llama_icons_img .= '<li>
				<label>
					<span class="quotes-llama-icons"><img src="' . $quotes_llama_icons_url . $quotes_llama_img . '"></span>
					<input type="radio" class="quotes-llama-icons-' . esc_attr( $quotes_llama_icon_set ) . '-hidden" name="icon" value="' . $quotes_llama_img . '" id="' . $quotes_llama_img . '">
				</label>
			</li>';
	}
}

// Create html for Dash-Icons.
foreach ( $quotes_llama_dash_icons_array as $quotes_llama_di ) {
	$quotes_llama_icons_dashicons .= '<li>
			<label>
				<span class="dashicons dashicons-' . $quotes_llama_di . '"></span>
				<input type="radio" class="quotes-llama-icons-' . esc_attr( $quotes_llama_icon_set ) . '-hidden" name="icon" value="' . $quotes_llama_di . '" id="' . $quotes_llama_di . '">
			</label>
		</li>';
}

// After.
$quotes_llama_icons_after = '</ul></fieldset>';

return $quotes_llama_icons_before . $quotes_llama_icons_img . $quotes_llama_icons_dashicons . $quotes_llama_icons_after;
