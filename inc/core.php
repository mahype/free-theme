<?php

global $rs_theme;

class rs_theme{
	
	function rs_theme(){
		$this->__construct();
	}
	
	function __construct(){
		
		$this->constants();
		
		add_action( 'customize_register', array( $this, 'theme_customizer' ) );
		add_action( 'admin_menu',  array( $this, 'admin_menu' ));
		
		if( 'rs-theme-options' == $_GET['page'] ):
			add_action( 'admin_init',  array( $this, 'admin_css' ));
			add_action( 'admin_init',  array( $this, 'admin_js' ));
		endif;
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
	}

	public function admin_menu(){
		add_theme_page( __( 'Rheinschmiede Theme', 'rs_theme' ), __( 'Theme Options' ) , 'edit_theme_options', 'rs-theme-options', array( $this, 'options_page' ) );
	}
	
	public function options_page(){
		include( RS_THEME_FOLDER . '/inc/theme-options.php' );
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