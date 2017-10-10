<?php
/**
 * Admin
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Add menu item to wp-admin
 */
function va_overlay_admin_menu() {

	$va_overlay_options_page = add_options_page(
		__('VA Overlay Settings', 'va-overlay'),
		__('VA Overlay', 'va-overlay'),
		'manage_options',
		'va-overlay',
		'va_overlay_settings_page'
		);

}
add_action( 'admin_menu', 'va_overlay_admin_menu' );






function va_overlay_settings_page() {
    ?>
        <div class="wrap">
            <h1>VA Overlay</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields("va-overlay-section");
                do_settings_sections("va-overlay");      
                submit_button(); 
                ?>          
            </form>
        </div>
    <?php
}





/**
 * Create settings page
 */
function display_va_overlay_fields() {

    add_settings_section("va-overlay-section", "", null, "va-overlay");

    add_settings_field("va_overlay_content", "Content in overlay", "display_va_overlay_content_element", "va-overlay", "va-overlay-section");
    register_setting("va-overlay-section", "va_overlay_content");

    add_settings_field("va_overlay_button", "Button text", "display_va_overlay_button_element", "va-overlay", "va-overlay-section");
    register_setting("va-overlay-section", "va_overlay_button");

    add_settings_field("va_overlay_colors", "Colors", "display_va_overlay_colors_element", "va-overlay", "va-overlay-section");
    register_setting("va-overlay-section", "va_overlay_colors");

}
add_action("admin_init", "display_va_overlay_fields");



/**
 * Create elemnts
 */
function display_va_overlay_content_element() {
    $content = get_option('va_overlay_content');
    $editor_id = 'va_overlay_content';
    $settings = array( 'media_buttons' => true );
    wp_editor( $content, $editor_id, $settings );
}

function display_va_overlay_button_element() {
    echo '<input type="text" name="va_overlay_button" style="width: 100%;" value="' . esc_attr(get_option('va_overlay_button')) . '" />';
    echo '<small>You can open and close overlay also by calling function: toggleOverlayVisibility()</small>';
}

function display_va_overlay_colors_element() {
    $color_options = get_option('va_overlay_colors');
    echo '<input type="text" name="va_overlay_colors[text]" value="' . esc_attr($color_options['text']) . '" /> Text (default: inherit)<br />';
    echo '<input type="text" name="va_overlay_colors[background]" value="' . esc_attr($color_options['background']) . '" /> Background (default: #fff)<br />';
    echo '<small>Format: #0000FF or rgba(0, 0, 255, 0.7) or blue</small>';
}





