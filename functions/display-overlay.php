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
	$style_settings = "
		#va-overlay .overlay-outer {
			background: {$backgroundcolor};
		}
		#va-overlay .overlay-inner > *:not(button) {
			color: {$textcolor};
		}
	";
	wp_add_inline_style( 'overlay-styles', $style_settings );


}
add_action('wp_enqueue_scripts', 'va_overlay_styles_and_scripts');



/**
 * Print html in footer
 */
function display_va_overlay() {

	if ( get_option('va_overlay_content') ) {

		$content = apply_filters('the_content', get_option('va_overlay_content')); // Used the_content filter to get shortcodes working

		$output = '<div id="va-overlay">'; // Container start
		if ( get_option('va_overlay_button') ) {
			$output .= '<button id="va-overlay-open">' . get_option('va_overlay_button') . '</button>'; // Open button
		}
		$output .= '<div class="overlay-outer"><div class="overlay-scroll"><div class="overlay-inner"><button id="va-overlay-close">✕</button>' . $content . '</div></div></div>'; // Close button & content
		$output .= '</div>'; // Container end

		print $output;

	}
}
add_action('wp_footer', 'display_va_overlay');
