<?php

global $rs_theme;

class rs_theme{
	
	function rs_theme(){
		$this->__construct();
	}
	
	function __construct(){
		
		$this->constants(); // Setting general Constants
		$this->includes(); // Getting includes
		
		// Scripts for Frontent
		add_action( 'after_setup_theme', array( $this, 'load_framework' ) ); // Loading Framework
		add_action( 'admin_menu',  array( $this, 'admin_menu' )); // Adding admin Menu
		add_action( 'customize_register', array( $this, 'theme_customizer' ) ); // Adding WP Frontent editing options
		
		add_action( 'wp_head',  array( $this, 'js_vars' )); // Setting global JS Vars for Frontent
		
		// Scripts for free theme settings pages
		if( 'free-theme-options' == $_GET['page'] ):
			add_action( 'admin_head',  array( $this, 'js_vars' )); // Setting global JS Vars for Backend
			add_action( 'admin_init',  array( $this, 'admin_css' ));
			add_action( 'admin_init',  array( $this, 'admin_js' ));
		endif;
	}
	
	public function load_framework(){
		$args['forms'] = array( 'free-config' );
		tk_framework( $args ); 
	}
	
	public function theme_customizer(){
		global $wp_customize;
		
		$wp_customize->add_section( 'rs_theme_color_scheme', array(
		    'title'          => __( 'Color Scheme', 'rs_theme' ),
		    'priority'       => 35,
		) );
		
		$wp_customize->add_setting( 'rs_theme_theme_options[color_scheme]', array(
			'default'        => 'some-default-value',
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
		
		$wp_customize->add_control( 'rs_theme_color_scheme', array(
			'label'      => __( 'Color Scheme', 'themename' ),
			'section'    => 'rs_theme_color_scheme',
			'settings'   => 'rs_theme_theme_options[color_scheme]',
			'type'       => 'radio',
			'choices'    => array(
				'value1' => 'Choice 1',
				'value2' => 'Choice 2',
				'value3' => 'Choice 3',
				),
		) );
	}
	
	public function css(){
	}
	
	public function js(){
		wp_register_script( 'rs-theme-admin-less-js', RS_THEME_URLPATH . '/inc/twigkit/js/less-1.1.3.min.js' );
		wp_enqueue_script( 'rs-theme-admin-less-js' );	
	}
	
	public function admin_css(){
		wp_register_style( 'rs-theme-admin-css', RS_THEME_URLPATH . '/inc/theme-options.css' );
		wp_enqueue_style( 'rs-theme-admin-css' );	
	}
	
	public function admin_js(){
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_script( 'jquery-ui-sortable' );

		wp_register_script( 'rs-theme-admin-js', RS_THEME_URLPATH . '/inc/theme-options.js' );
		wp_enqueue_script( 'rs-theme-admin-js' );	
		
		wp_register_script( 'rs-theme-admin-less-js', RS_THEME_URLPATH . '/inc/twigkit/js/less-1.1.3.min.js' );
		wp_enqueue_script( 'rs-theme-admin-less-js' );	
	}

	public function js_vars(){
		$save_ajax_url = RS_THEME_URLPATH . '/inc/save-layout.php';
		$free_nonce =  wp_create_nonce  ( 'save_theme_layout' );
		
		echo '<script type="text/javascript">';
		echo 'var free_ajax_url = "' . $save_ajax_url . '";';
		echo 'var free_nonce = "' . $free_nonce . '";';
		echo '</script>';	
	}

	public function admin_menu(){
		add_theme_page( __( 'Theme Settings', 'free_theme' ), __( 'Theme Options' ) , 'edit_theme_options', 'free-theme-options', array( $this, 'options_page' ) );
		add_theme_page( __( 'Theme Presets', 'free_theme' ), __( 'Presets', 'free_theme' ) , 'edit_theme_options', 'free-theme-presets', array( $this, 'options_page' ) );
	}
	
	public function options_page(){
		include( RS_THEME_FOLDER . '/inc/theme-options.php' );
	}
	
	private function includes(){
		include( RS_THEME_FOLDER . '/inc/tkf/loader.php' );
		include( RS_THEME_FOLDER . '/inc/layout.php' );
	}
	
	private function constants(){
		define( 'RS_THEME_FOLDER', 	$this->get_folder() );
		define( 'RS_THEME_URLPATH', $this->get_url_path() );
	}
	
	/**
	* Getting URL Path of theme
	*
	* @package WP Zliders
	* @since 0.1.0
	*
	*/
	private function get_url_path(){
		$sub_path = substr( RS_THEME_FOLDER, strlen( ABSPATH ), ( strlen( RS_THEME_FOLDER ) - 11 ) );
		$script_url = get_bloginfo( 'wpurl' ) . '/' . $sub_path;
		return $script_url;
	}
	
	/**
	* Getting URL Path of theme
	*
	* @package WP Zliders
	* @since 0.1.0
	*
	*/
	private function get_folder(){
		$sub_folder = substr( dirname(__FILE__), strlen( ABSPATH ), ( strlen( dirname(__FILE__) ) - strlen( ABSPATH ) - 4 ) );
		$script_folder = ABSPATH . $sub_folder;
		return $script_folder;
	}
}

$rs_theme = new rs_theme();