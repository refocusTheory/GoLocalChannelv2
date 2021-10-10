<?php

<div class="p-4 lg:w-1/2">
<div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
    <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="'.get_the_post_thumbnail( get_the_ID(),  $size = 'post-thumbnail', $attr = '' ).'">
    <div class="flex-grow sm:pl-8">
    <h2 class="title-font font-medium text-lg text-gray-900">' . get_the_title() . '</h2>
    <h3 class="text-gray-500 mb-3">UI Developer</h3>
    <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack vaporware.</p>
    <span class="inline-flex">
        <a class="text-gray-500">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
            </svg>
        </a>
        <a class="ml-2 text-gray-500">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
            </svg>
        </a>
        <a class="ml-2 text-gray-500">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
            </svg>
        </a>
    </span>
    </div>
</div>
</div>
// $active = new YesMan();
			        //$plugin_admin = new Go_Local_Admin_Contents();
					//$whatever = new \GoLocal\Admin\AdminPageContents;


							//$contents = Api::my_admin_page_contents();


						//	echo dirname(__FILE__) . "\n";

						// $endpoint = 'https://theobxplorer.com/';
						// //$data   =  WpXpressController::setClient($endpoint);
						// $data   = $this->setClient($endpoint);


						// var_dump($data);
//////////////////////////////////////////////////////////////////////////////////////////////////
// function alter_the_edit_screen_query( $wp_query ) {
//     if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
//         if ( !current_user_can( 'activate_plugins' ) )  {
// 			add_action( 'views_edit-post', 'remove_items_from_edit' );
//             global $current_user;
//             $wp_query->set( 'author', $current_user->id );
//         }
//     }
// }

// add_filter('parse_query', 'alter_the_edit_screen_query' );

// function remove_items_from_edit( $views ) {
//     unset($views['all']);
//     unset($views['publish']);
//     unset($views['trash']);
//     unset($views['draft']);
//     unset($views['pending']);
//     return $views;
// }


		//$this->loader->add_action( 'admin_enqueue_scripts',  $plugin_admin,   'load_admin_styles'  );
		
		////////////////////////////////////////////////////////////////////////////////////////
		//$plugin_admin->remove_admin_bar();
		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );


/////////////////////////////////////////////////////////////////////////////////////////////////
/**
* Add custom stylesheet to admin UI
*/
// function hide_permalink() {
//     return '';
// }
// add_filter( 'get_sample_permalink_html', 'hide_permalink' );
// function customAdmin() {
//     $url = get_option('siteurl');
//     $url = $url . '/css/wp-admin.css';
//     echo '<!-- custom admin css -->
//           <link rel="stylesheet" type="text/css" href="' . $url . '" />
//           <!-- /end custom adming css -->';
// }
// add_action('admin_head', 'customAdmin');


//---------------------------------------------------------------------------------------------
	// function load_my_plugin_scripts( $hook ) {

	// 	// Load only on ?page=sample-page
	  
	// 	if( $hook != 'golocal-dash' ) {
	  
	// 	return;
	  
	// 	}
	  
	// 	// Load style & scripts.
	  
	//     wp_enqueue_style( 'curb-appeal-live' );
	  
	//     wp_enqueue_script( 'curb-appeal-live' );
	  
	//   }

	
	//---------------------------------------------------------------------------------------------


// function register_my_plugin_scripts() {

// 	// wp_enqueue_style( 'curb-appeal-live', plugins_url( 'plugins/global/plugins.bundle.css', __FILE__ ) );
// 	wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');

// 	//wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.5.1.slim.min.js', array( 'jquery' ),'',true );
// 	wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
// 	wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
// 	//  wp_enqueue_script( 'curb-appeal-live', plugins_url( 'js/curb-appeal-live-admin.js', __FILE__ ), array( 'jquery' ) );
// }
// add_action( 'admin_enqueue_scripts', 'register_my_plugin_scripts' );

// function load_my_plugin_scripts( $hook ) {

//   // Load only on ?page=sample-page

//   if( $hook != 'golocal-dash' ) {

//   return;

//   }

  // Load style & scripts.

//   wp_enqueue_style( 'curb-appeal-live' );

//   wp_enqueue_script( 'curb-appeal-live' );

//}
//add_action( 'admin_enqueue_scripts', 'load_my_plugin_scripts' );