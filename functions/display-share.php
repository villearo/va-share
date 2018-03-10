<?php
/**
 * Dispaly Share
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Enque styles if "Print CSS" option is selected
 */
function va_share_styles_and_scripts() {
	$va_share_visibility_options = get_option('va_share_visibility');
	if ( isset( $va_share_visibility_options['print_css'] ) == 1 ) {
		wp_enqueue_style( 'share-styles', VA_SHARE_PLUGIN_URL . 'styles/share-styles.css' );
	}
}
add_action('wp_enqueue_scripts', 'va_share_styles_and_scripts');


/**
 * Display icons and add [share] shortcode
 */
function va_share_show_icons() {
	global $wp;
	$current_url = home_url( add_query_arg( array(), $wp->request ) );
	$output = '<div id="va-share">';
	$output .= get_option('va_share_text');
	$output .= '<a class="facebook icon" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . $current_url . '"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
	$output .= '<a class="twitter icon" target="_blank" href="https://twitter.com/share?url=' . $current_url . '"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
	$output .= '<a class="linkedin icon" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&title=' . get_the_title() . '&url=' . $current_url . '"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
	$output .= '<a class="gplus icon" target="_blank" href="https://plus.google.com/share?url=' . $current_url . '"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
	$output .= '</div>';
	return $output;
}
add_shortcode('share', 'va_share_show_icons');


/**
 * Display icons at the bottom of pages and posts if those options are selected
 */
function va_share_show_icons_after_content( $content ) {
	$va_share_visibility_options = get_option('va_share_visibility');
	if ( ( is_single() && isset( $va_share_visibility_options['posts'] ) == 1 ) || ( is_page() && isset( $va_share_visibility_options['pages'] ) == 1 ) ) {
		$content .= va_share_show_icons();
	}
	return $content;
}
add_filter('the_content', 'va_share_show_icons_after_content');


