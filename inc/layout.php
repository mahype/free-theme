<?php

if( !defined('ABSPATH') )
	die();

global $free_layout;

class free_layout{
	
	var $layout;
	
	function free_layout(){
		$this->__construct();
	}
	
	function __construct(){
		$this->layout = unserialize( get_theme_mod( 'layout', $default ) );
	}
	
	public function render_css(){
		
	}
	
	public function render_admin(){
		foreach( $this->layout AS $element ):
			$this->render_admin_menu( $element );
		endforeach;
	}
	
	public function render(){
		foreach( $this->layout AS $element ):
			$this->render_menu( $element );
		endforeach;
	}
	
	private function render_admin_menu( $element ){
		echo '<div style="width:' . $element->width . ';">';
		echo '</div>';
	}
}

$free_layout = new free_layout();

function free_render_admin(){
	global $free_layout;
	$free_layout->render_admin();
}

function free_render_layout(){
	global $free_layout;
	$free_layout->render();
}
