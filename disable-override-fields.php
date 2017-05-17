<?php
/*
Plugin Name: Conditional Woo Checkout Field Disable All Override Fields
Plugin URI: https://conditionalcheckoutfields.com
Description: Toggle fields based on previously selected inputs
Version: 1.0
Author: Scott DeLuzio
Author URI: https://scottdeluzio.com
*/

/*  Copyright 2017  Scott DeLuzio  (email : support (at) conditionalcheckoutfields.com)	*/

add_action( 'init', 'remove_overrides' );
function remove_overrides(){
	remove_filter( 'woocommerce_checkout_fields' , 'default_fields_update_applied' );
	remove_action( 'cwcfp_settings_tab', 'cwcfp_main_tab' );
}
add_action( 'admin_init', 'remove_tab' );
function remove_tab(){
	add_action( 'cwcfp_settings_tab', 'cwcfp_remove_override_tab' );
}
function cwcfp_remove_override_tab(){
	global $cwcfp_tab; ?>
	<a class="nav-tab <?php echo $cwcfp_tab == 'main' || '' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=wc-conditional-field-pro&cwcfp-tab=main' ); ?>"><?php _e( 'Settings', 'conditional-woo-checkout-field-pro' ); ?> </a>
	<a class="nav-tab <?php echo $cwcfp_tab == 'conditional' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=wc-conditional-field-pro&cwcfp-tab=conditional' ); ?>"><?php _e( 'Conditional Fields', 'conditional-woo-checkout-field-pro' ); ?> </a>
	<?php
}
