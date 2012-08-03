<?php

// Getting WordPress functions
if( !defined('ABSPATH') )
	require_once( '../../../../wp-load.php' );

// Is there any data to save?
if( !$_REQUEST["data"] ):
    wp_die( __( 'Invalid data! Can\'t save anything.', 'free-theme' ), __('Invalid data! Can\'t save anything.', 'free-theme' ) );
endif;

// Checking posted data, nonce and user capabilities
if ( empty( $_REQUEST ) || !wp_verify_nonce( $_REQUEST['_wp_nonce'], 'save_theme_layout' ) || !current_user_can('edit_themes') ):
    wp_die( __( 'You are wrong here!', 'free-theme' ), __('You are wrong here!', 'free-theme' ) );
	
// Saving data
else:
	$data = serialize( json_decode( stripslashes( $_REQUEST["data"] ) ) );
	set_theme_mod( 'layout', $data );
endif;