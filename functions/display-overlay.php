<?php
/**
 * Dispaly Overlay
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Enque styles and scripts in head
 */
function va_overlay_styles_and_scripts() {
	wp_enqueue_style( 'overlay-styles', VA_OVERLAY_PLUGIN_URL . 'styles/overlay-styles.css' );
	wp_enqueue_script( 'overlay-scripts', VA_OVERLAY_PLUGIN_URL . 'scripts/overlay-scripts.js', array(), '1.0.0', true );

	$color_options = get_option('va_overlay_colors');
	$textcolor = $color_options['text'];
	$backgroundcolor = $color_options['background'];
	$style_settings = "";
	if ( $textcolor ) {
		$style_settings .= "#va-overlay .overlay-inner > *:not(button) { color: {$textcolor}; } ";
	};
	if ( $backgroundcolor ) {
		$style_settings .= "#va-overlay .overlay-outer { background: {$backgroundcolor}; } ";
	};

	wp_add_inline_style( 'overlay-styles', $style_settings );
}
add_action('wp_enqueue_scripts', 'va_overlay_styles_and_scripts');



/**
 * Print html in footer
 */
function display_va_overlay() {
	$content = get_option('va_overlay_content');
	$open_button = get_option('va_overlay_button');
	if ( $content ) {
		$output = '<div id="va-overlay">'; // Container start
		if ( $open_button ) {
			$output .= '<button id="va-overlay-open">' . $open_button . '</button>'; // Open button
		}
		$output .= '<div class="overlay-outer"><div class="overlay-scroll"><div class="overlay-inner"><button id="va-overlay-close">✕</button>'; // Close button
		$output .= apply_filters('the_content', $content); // Use the_content filter to get shortcodes working
		$output .= '</div></div></div>';
		$output .= '</div>'; // Container end
		print $output;
	}
}
add_action('wp_footer', 'display_va_overlay');
