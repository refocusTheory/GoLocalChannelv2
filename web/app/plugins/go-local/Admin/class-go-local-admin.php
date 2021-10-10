<?php

namespace GoLocal\Admin;

use GoLocal\Admin\Activate as YesMan;
use GuzzleHttp\Client as GuzzleClient;
use Aws\S3\S3Client;
//use golocal\Api;
use  GoLocal\Go_Local;


/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://refocustheory.com
 * @since      1.0.0
 *
 * @package    Go_Local
 * @subpackage Go_Local/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Go_Local
 * @subpackage Go_Local/admin
 * @author     refocus Theory <refocustheory@gmail.com>
 */
class Go_Local_Admin extends Go_Local{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	protected $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	protected $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// $s3 = new S3Client([
		// 	'version' => 'latest',
		// 	'region'  => 'us-west-2'
		// ]);
		// $client = new  GuzzleClient([
		// 	'base_uri' => 'http://localhost/api/',
		// 	'timeout' => 2.0,
		// ]);



	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($screen) {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Go_Local_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Go_Local_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'admin_css_foo',plugin_dir_url( __FILE__ )  . 'css/go-local-admin.css', false, '1.0.0' );
		//if('toplevel_page_golocal-dash' || 'toplevel_page_golocal-landing-pages' !== $screen) return;
		wp_enqueue_style( $this->plugin_name.'-1', '//cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-2', '//cdn.jsdelivr.net/npm/daisyui@1.14.2/dist/full.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-3', '//cdn.jsdelivr.net/npm/daisyui@1.14.2/dist/themes.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Go_Local_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Go_Local_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'plugins/global/plugins.bundle.js', array( 'jquery' ), $this->version, false );
     


	}

	///////////////////////////////////////////////-------------------------------//////////////////////////////////////////////////
	
	function golocal_menu() {

		$admin_page_contents = new Go_Local_Admin_Contents($this->get_plugin_name(), $this->get_version());
		
		add_action( 'admin_enqueue_scripts', [$this, 'enqueue_styles'] );
		add_action( 'admin_enqueue_scripts', [$this , 'enqueue_scripts'] );
		add_menu_page(
			 __( 'Go Local', 'go-local' ), 
			 __( 'Go Local', 'go-local' ), 
			 'edit_posts',
			 'golocal-dash',	
			 [ $admin_page_contents ,'my_admin_page_contents2'],
			 'dashicons-schedule',
			  2);
		add_menu_page( 
			 __( 'Landing Pages', 'landing-pages' ),
			 __( 'Landing pages', 'landing-pages' ), 
			 'edit_posts',
			 'golocal-landing-pages',	
			 [ $admin_page_contents ,'my_admin_page_contents'],
			 'dashicons-schedule', 
			 2);
			add_menu_page( 
			__( 'Ads', 'ads' ),
			__( 'Ads', 'ads' ), 
			'edit_posts',
			'golocal-ads',	
			[ $admin_page_contents ,'my_admin_page_contents3'],
			'dashicons-schedule', 
			2);
	
	}

	function remove_admin_bar() {
		// if (!current_user_can('administrator') && !is_admin()) {
		   show_admin_bar(false);
		// }
	}

	function binaryfork_before_admin_bar_render()
	{
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu('wp-logo');				// Remove the WordPress logo
		    $wp_admin_bar->remove_menu('about');				// Remove the about WordPress link
		    $wp_admin_bar->remove_menu('wporg');				// Remove the WordPress.org link
		    $wp_admin_bar->remove_menu('documentation');		// Remove the WordPress documentation
		    $wp_admin_bar->remove_menu('support-forums');		// Remove the support forums link
		    $wp_admin_bar->remove_menu('feedback');				// Remove the feedback link	
		//     $wp_admin_bar->remove_menu('site-name');			// Remove the site name menu
		//     $wp_admin_bar->remove_menu('view-site');			// Remove the view site link
			$wp_admin_bar->remove_menu('updates');				// Remove the updates link
			$wp_admin_bar->remove_menu('comments');				// Remove the comments link
			$wp_admin_bar->remove_menu('new-content');			// Remove the content link
		//     //$wp_admin_bar->remove_menu('my-account');			// Remove the user details tab
			$wp_admin_bar->remove_menu('customize');			// Remove customizer link
		    $wp_admin_bar->remove_menu('delete-cache');			// Remove WP Supercache Delete Cache link
		    $wp_admin_bar->remove_menu('updraft_admin_node');	// Remove Updraft plugin link
		    $wp_admin_bar->remove_menu('w3tc');					// Remove W3 total cache plugin link
	}

	////////////////////////////////////////////////-------------------------------//////////////////////////////////////////////////

    public function setClient($endpoint){
        $this->user     = 'adminitor';//env('WPXPRESS_CLIENTID');
        $this->pass     = 'S6nN 4xCc Ymwc u26W NNYb BHX8';//env('WPXPRESS_CLIENTPASS'); S6nN 4xCc Ymwc u26W NNYb BHX8 utI8 l0eF ayhw s741 3teK sMvr
        $this->headers  = [
            'Authorization' => 'Basic ' . base64_encode( $this->user . ':' . $this->pass )
          ];
        $client   = new GuzzleClient([
            'base_uri' => $endpoint.'wp-json/wp/v2/'
        ]);
		$response = $client->request('GET', 'posts?_embed', $this->headers); 
	    $data     = json_decode($response->getBody(),true);
		
        return $data;
    }




}
