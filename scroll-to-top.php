<?php
/**
 * Plugin Name: Smooth-scroll-to-top
 * Plugin URI: http://wordpress.org/support/plugin/smooth-scroll-to-top
 * Description: This plugin will add a nice scroll to top icon on a scrollable page and will add a nice colourful browser scroll on chrome. 
 * Version: 1.1
 * Author: Golam Dostogir
 * Author URI: http://www.savethemage.com/the-team
 * License: A "Slug" license name e.g. GPL2
 */


class scroll_top {


	function __construct() {

	   
	    $this->init_plugin_constants();
  
		load_plugin_textdomain( 'Smooth', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );

    	
    	$this->register_scripts_and_style();

		
	    add_action( 'wp_footer', array( $this, 'display_link' ) );
	    
	} 


	

	function display_link() {
		?>
		<a id="scroll-to-top" href="#" title="<?php _e('Go Top','Smooth'); ?>"><?php _e('Top','Smooth'); ?></a>
		<?php
	} 
	  
	  
	const plugin_name = 'Smooth Scrolling';
	const plugin_slug = 'Smooth-Scrolling-To-Top';

	private function init_plugin_constants() {

		if ( !defined( 'PLUGIN_NAME' ) ) {
		  define( 'PLUGIN_NAME', self::plugin_name );
		} 
		if ( !defined( 'PLUGIN_SLUG' ) ) {
		  define( 'PLUGIN_SLUG', self::plugin_slug );
		} 

	} 

	
	private function register_scripts_and_style() {
		if ( is_admin() ) {
			
		} else { 
			$this->load_file( self::plugin_slug . '-script', '/js/scroll-top.js', true );
			$this->load_file( self::plugin_slug . '-style', '/css/style.css' );
		} 
	} 

	
	private function load_file( $name, $file_path, $is_script = false ) {

		$url = plugins_url($file_path, __FILE__);
		$file = plugin_dir_path(__FILE__) . $file_path;

		if( file_exists( $file ) ) {
			if( $is_script ) {
				wp_register_script( $name, $url, array('jquery') );
				wp_enqueue_script( $name );
			} else {
				wp_register_style( $name, $url );
				wp_enqueue_style( $name );
			} 
		} 
    
	} 
  
  
} 
new scroll_top();
