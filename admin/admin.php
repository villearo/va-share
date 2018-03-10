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
function va_share_admin_menu() {

	$va_share_options_page = add_options_page(
		__('VA Share Settings', 'va-share'),
		__('VA Share', 'va-share'),
		'manage_options',
		'va-share',
		'va_share_settings_page'
		);

}
add_action( 'admin_menu', 'va_share_admin_menu' );


function va_share_settings_page() {
    ?>
        <div class="wrap">
            <h1>VA Share</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields("va-share-section");
                do_settings_sections("va-share");      
                submit_button(); 
                ?>          
            </form>
        </div>
    <?php
}


/**
 * Create settings page
 */
function display_va_share_fields() {

    add_settings_section("va-share-section", "", null, "va-share");

    add_settings_field("va_share_text", "Share text", "display_va_share_text_element", "va-share", "va-share-section");
    register_setting("va-share-section", "va_share_text");

    add_settings_field("va_share_visibility", "Show share icons on", "display_va_share_options_element", "va-share", "va-share-section");
    register_setting("va-share-section", "va_share_visibility");

}
add_action("admin_init", "display_va_share_fields");


/**
 * Create elements
 */
function display_va_share_text_element() {
    echo '<input type="text" name="va_share_text" style="width: 100%;" value="' . esc_attr(get_option('va_share_text')) . '" />';
}
function display_va_share_options_element() {
    $va_share_visibility_options = get_option('va_share_visibility');
    echo '<input type="checkbox" name="va_share_visibility[posts]" value="1" ' . checked( 1, isset( $va_share_visibility_options['posts'] ), false ) . ' /> Posts<br />';
    echo '<input type="checkbox" name="va_share_visibility[pages]" value="1" ' . checked( 1, isset( $va_share_visibility_options['pages'] ), false ) . ' /> Pages<br />';
    echo '<input type="checkbox" name="va_share_visibility[print_css]" value="1" ' . checked( 1, isset( $va_share_visibility_options['print_css'] ), false ) . ' /> Print CSS included in plugin<br />';
}
