<?php

namespace GoLocal\Admin;



class Go_Local_Admin_Contents extends Go_Local_Admin{

	
	function my_admin_page_contents() 
	{

		if ( is_user_logged_in() ) {

			$current_user = wp_get_current_user();

			if ( ($current_user instanceof \WP_User) ) {

				$avatar = get_avatar( $current_user->ID, 32 );
				$name   = esc_html( $current_user->display_name ) ;
				$args   = array(
					'post_type' => 'page',
					'post_status'=>'publish',
					'posts_per_page' => '-1',
					'author' => $current_user->ID,
					// 'author_name' => 'ericakuykendall'

				);
				$query = new \WP_Query( $args );

			}
		}

		?>

			<!-- Page Content -->
			<div data-theme="garden" class=" ">

			
				<div class="p-2">
					<div class="grid grid-cols-1 gap-6 p-6 xl:grid-cols-3 bg-base-200 rounded-box">


						<div class="navbar col-span-1 shadow-lg xl:col-span-3 bg-neutral-focus text-neutral-content rounded-box">
							<div class="flex-none">
							<!-- <button class="btn btn-square btn-ghost">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
								
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
									
								</svg>
							</button> -->
							</div>
							<div class="flex-none px-2 mx-2"><span class="text-lg font-bold">
							GoLocal
							</span>
							</div>
							<div class="flex justify-center flex-1 px-2 mx-2">
							<div class="items-stretch hidden lg:flex">
								<a href="https://floridarealtyunlimited.com/wp/wp-admin/edit.php?post_type=houzez_agent" class="btn btn-ghost btn-sm rounded-btn">
								Agents
								</a> 
								<a href="https://floridarealtyunlimited.com/wp/wp-admin/post-new.php?post_type=houzez_agent"class="btn btn-ghost btn-sm rounded-btn">
								Add New Agent
								</a> 
								<a href="https://floridarealtyunlimited.com/wp/wp-admin/edit.php?post_status=publish&post_type=post" class="btn btn-ghost btn-sm rounded-btn">
								Posts
								</a> 
								<a  href="https://floridarealtyunlimited.com/wp/wp-admin/edit.php?post_type=page" class="btn btn-ghost btn-sm rounded-btn">
								Pages
								</a>
							</div>
							</div>
							<div class="flex-none">
							<button class="btn btn-square btn-ghost">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
									<!----> <!----> <!----> <!----> <!----> 
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
									<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
								</svg>
							</button>
							</div>
							<div class="flex-none">
							<button class="btn btn-square btn-ghost">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
									<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
									<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
								</svg>
							</button>
							</div>
						</div>



									<?php // The Loop
										if ( $query->have_posts() ) {
										
											while ( $query->have_posts() ) {
												$query->the_post();
												$thumb = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
												$edit_link =  get_edit_post_link( get_the_ID(), $context = 'display' );
												$elementor_link = 'https://ericakuykendall.channel.curbappeallive.com/wp/wp-admin/post.php?post='.get_the_ID().'&&action=elementor';
												echo '
												<div class="card text-center shadow-2xl">
												<figure class="px-10 pt-10">
												  <img src="'.$thumb.'" class="rounded-xl">
												</figure> 
												<div class="card-body">
												  <h2 class="card-title">' . get_the_title() . '</h2> 
												  <p>'.get_the_excerpt().'</p> 
												  <div class="justify-center card-actions">
													<a href="'.	$elementor_link .'" class="btn btn-outline btn-base">Edit</a>
												  </div>
												</div>
											  </div> 
											
											';
											}
										
										} else {
											echo 'no posts found';
										}
										/* Restore original Post Data */
										wp_reset_postdata();  

									?>
						<!-- <div class="w-64">
							<div class="h-36 w-full">
							<img class="w-64 h-36" src="https://i.ytimg.com/vi/l7TxwBhtTUY/hq720_live.jpg?sqp=CNjfsYAG-oaymwEZCNAFEJQDSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLAmVNjMQzuOHHknmocydqjEQyedCg" alt="" />
							</div>
							<div class="mt-3 flex items-start space-x-2">
							<div class="flex-shrink-0 w-9 h-9 rounded-full overflow-hidden bg-white">
								<img src="https://yt3.ggpht.com/ytc/AAUvwnhbzltKjEkb2tlCdRpx2-wjpvBYy_RRMQzNmpSmLQ=s68-c-k-c0x00ffffff-no-rj" alt="" />
							</div>
							<div class="flex flex-col text-md tracking-tighter leading-tight">
								<div class="text-white overflow-ellipsis">lofi hip hop radio - sad & sleepy beats 😴</div>
								<div class="mt-1 flex items-baseline space-x-1">
								<div class="text-gray-400">the bootleg boy</div>
								<div class="w-3 h-3 pt-0.5">
									<svg viewBox="0 0 24 24" class="text-gray-400" fill="currentColor">
									<g><path fill-rule="evenodd" clip-rule="evenodd" d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10 S17.52,2,12,2z M9.92,17.93l-4.95-4.95l2.05-2.05l2.9,2.9l7.35-7.35l2.05,2.05L9.92,17.93z"></path></g>
									</svg>
								</div>
								</div>
								<div class="text-gray-400">750 watching</div>
								<div class="mt-1 text-xs tracking-wide font-bold border border-red-500 text-red-600 px-1 py-0.5 rounded-sm w-max">LIVE NOW</div>
							</div>
							</div>
						</div> -->

						<!-- <div class="rounded-lg shadow bg-base-200 drawer h-52">
							<input id="my-drawer" type="checkbox" class="drawer-toggle"> 
							<div class="flex flex-col items-center justify-center drawer-content">
								<label for="my-drawer" class="btn btn-primary drawer-button">open menu</label>
							</div> 
							<div class="drawer-side">
								<label for="my-drawer" class="drawer-overlay"></label> 
							
							</div>
						</div> -->


					</div>



				</div>
			</div>

						
		<?php

		wp_enqueue_script( $this->plugin_name, '//unpkg.com/alpinejs', $this->version, false );


	}

	function my_admin_page_contents2() 
	{

		if ( is_user_logged_in() ) {

			$current_user = wp_get_current_user();

			if ( ($current_user instanceof \WP_User) ) {

				$avatar = get_avatar( $current_user->ID, 32 );
				$name   = esc_html( $current_user->display_name ) ;
			}
		}

		?>

			<!-- Page Content -->
			<div data-theme="garden" class=" ">
				<div class="p-2">
					<div class="grid grid-cols-1 gap-6 lg:p-10 xl:grid-cols-3 lg:bg-base-200 rounded-box">
							<div class="navbar col-span-1 shadow-lg xl:col-span-3 bg-neutral-focus text-neutral-content rounded-box">
								<div class="flex-none">
									<button class="btn btn-square btn-ghost">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
									</button>
								</div>
								<div class="flex-none px-2 mx-2"><span class="text-lg font-bold">
									daisyUI
									</span>
								</div>
								<div class="flex justify-center flex-1 px-2 mx-2">
									<div class="items-stretch hidden lg:flex"><a class="btn btn-ghost btn-sm rounded-btn">
										Home
										</a> <a class="btn btn-ghost btn-sm rounded-btn">
										Portfolio
										</a> <a class="btn btn-ghost btn-sm rounded-btn">
										About
										</a> <a class="btn btn-ghost btn-sm rounded-btn">
										Contact
										</a>
									</div>
								</div>
								<div class="flex-none">
									<button class="btn btn-square btn-ghost">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
										<!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
									</button>
								</div>
								<div class="flex-none">
									<button class="btn btn-square btn-ghost">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
									</button>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<div>
										<div class="avatar">
										<div class="rounded-full w-14 h-14 shadow"><img src="https://i.pravatar.cc/500?img=32"></div>
									
										</div>
									</div>
									<div>
										<h2 class="card-title">Janis Johnson</h2>
										<p class="text-base-content text-opacity-40">Accounts Agent</p>
									</div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<div class="flex-1">
										<h2 class="card-title">Meredith Mayer</h2>
										<p class="text-base-content text-opacity-40">Data Liaison</p>
									</div>
									<div class="flex-0"><button class="btn btn-sm">Follow</button></div>
								</div>
							</div>
							<div class="card row-span-3 shadow-lg compact bg-base-100">
								<figure><iframe src="https://drive.google.com/file/d/1ZTlEbVBgAnvjt2D7yEG5V0_yYYw_oBzV/preview" width="640" height="480" allow="autoplay"></iframe></figure>
								<div class="flex-row items-center space-x-4 card-body">
									<div>
										<h2 class="card-title">Karolann Collins</h2>
										<p class="text-base-content text-opacity-40">Direct Interactions Liaison</p>
									</div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<div class="flex-1">
										<h2 class="card-title text-primary">4,600</h2>
										<p class="text-base-content text-opacity-40">Page views</p>
									</div>
									<div class="flex space-x-2 flex-0">
										<button class="btn btn-sm btn-square">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
											<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
											<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										</button>
										<button class="btn btn-sm btn-square">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
											<!----> <!----> <!----> <!----> <!----> <!----> 
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
											<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										</button>
									</div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<label class="flex-0"><input type="checkbox" checked="checked" class="toggle toggle-primary"></label> 
									<div class="flex-1">
										<h2 class="card-title">Enable Notifications</h2>
										<p class="text-base-content text-opacity-40">To get latest updates</p>
									</div>
								</div>
							</div>
							<div class="card col-span-1 row-span-3 shadow-lg xl:col-span-2 bg-base-100">
								<div class="card-body">
									<h2 class="my-4 text-4xl font-bold card-title">Top 10 UI Components</h2>
									<div class="mb-4 space-x-2 card-actions">
										<div class="badge badge-ghost">Colors</div>
										<div class="badge badge-ghost">UI Design</div>
										<div class="badge badge-ghost">Creativity</div>
									</div>
									<p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos. Sit sit necessitatibus veritatis sed molestiae voluptates incidunt iure sapiente.</p>
									<div class="justify-end space-x-2 card-actions"><button class="btn btn-primary">Login</button> <button class="btn">Register</button></div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<div class="flex-1">
										<h2 class="flex card-title"><button class="btn btn-ghost btn-sm btn-circle loading"></button>
										Downloading...
										</h2>
										<progress value="70" max="100" class="progress progress-secondary"></progress>
									</div>
									<div class="flex-0">
										<button class="btn btn-circle">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
										</svg>
										</button>
									</div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body"><label class="cursor-pointer label"><input type="checkbox" checked="checked" class="checkbox checkbox-accent"> <span class="mx-4 label-text">Enable Autosave</span></label></div>
							</div>
							<ul class="menu row-span-3 p-4 shadow-lg bg-base-100 text-base-content text-opacity-40 rounded-box">
								<li class="menu-title"><span>
									Menu Title
									</span>
								</li>
								<li>
									<a>
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										Item with icon
									</a>
								</li>
								<li>
									<a>
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										Item with icon
									</a>
								</li>
								<li>
									<a>
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										Item with icon
									</a>
								</li>
							</ul>
							<div class="alert col-span-1 xl:col-span-2 bg-base-100">
								<div class="flex-1"><label class="mx-3">Lorem ipsum dolor sit amet, consectetur adip!</label></div>
								<div class="flex-none"><button class="btn btn-sm btn-ghost mr-2">Cancel</button> <button class="btn btn-sm btn-primary">Apply</button></div>
							</div>
							<div class="alert col-span-1 xl:col-span-2 alert-info">
								<div class="flex-1">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
									</svg>
									<label>Lorem ipsum dolor sit amet, consectetur adip!</label>
								</div>
							</div>
							<div class="alert col-span-1 xl:col-span-2 alert-success">
								<div class="flex-1">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
									</svg>
									<label>Lorem ipsum dolor sit amet, consectetur adip!</label>
								</div>
							</div>
					</div>
				</div>
			</div>

						
		<?php

		wp_enqueue_script( $this->plugin_name, '//unpkg.com/alpinejs', $this->version, false );


	}

	function my_admin_page_contents3() 
	{

		if ( is_user_logged_in() ) {

			$current_user = wp_get_current_user();

			if ( ($current_user instanceof \WP_User) ) {

				$avatar = get_avatar( $current_user->ID, 32 );
				$name   = esc_html( $current_user->display_name ) ;
				$args   = array(
					'post_type' => 'page',
					'post_status'=>'publish',
					'posts_per_page' => '-1',
					// 'author_name' => 'ericakuykendall'
					'author' => $current_user->ID,

				);
				$query = new \WP_Query( $args );

			}
		}

		?>

			<!-- Page Content -->
			<div data-theme="garden" class=" ">
				<div class="p-2">
					<div class="grid grid-cols-1 gap-6 lg:p-10 xl:grid-cols-3 lg:bg-base-200 rounded-box">
							<div class="navbar col-span-1 shadow-lg xl:col-span-3 bg-neutral-focus text-neutral-content rounded-box">
								<div class="flex-none">
									<button class="btn btn-square btn-ghost">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
									</button>
								</div>
								<div class="flex-none px-2 mx-2"><span class="text-lg font-bold">
									daisyUI
									</span>
								</div>
								<div class="flex justify-center flex-1 px-2 mx-2">
									<div class="items-stretch hidden lg:flex"><a class="btn btn-ghost btn-sm rounded-btn">
										Home
										</a> <a class="btn btn-ghost btn-sm rounded-btn">
										Portfolio
										</a> <a class="btn btn-ghost btn-sm rounded-btn">
										About
										</a> <a class="btn btn-ghost btn-sm rounded-btn">
										Contact
										</a>
									</div>
								</div>
								<div class="flex-none">
									<button class="btn btn-square btn-ghost">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
										<!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
									</button>
								</div>
								<div class="flex-none">
									<button class="btn btn-square btn-ghost">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
									</button>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<div>
										<div class="avatar">
										<div class="rounded-full w-14 h-14 shadow"><img src="https://i.pravatar.cc/500?img=32"></div>
										</div>
									</div>
									<div>
										<h2 class="card-title">Janis Johnson</h2>
										<p class="text-base-content text-opacity-40">Accounts Agent</p>
									</div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<div class="flex-1">
										<h2 class="card-title">Meredith Mayer</h2>
										<p class="text-base-content text-opacity-40">Data Liaison</p>
									</div>
									<div class="flex-0"><button class="btn btn-sm">Follow</button></div>
								</div>
							</div>
							<div class="card row-span-3 shadow-lg compact bg-base-100">
								<figure><img src="https://picsum.photos/id/1005/600/400"></figure>
								<div class="flex-row items-center space-x-4 card-body">
									<div>
										<h2 class="card-title">Karolann Collins</h2>
										<p class="text-base-content text-opacity-40">Direct Interactions Liaison</p>
									</div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<div class="flex-1">
										<h2 class="card-title text-primary">4,600</h2>
										<p class="text-base-content text-opacity-40">Page views</p>
									</div>
									<div class="flex space-x-2 flex-0">
										<button class="btn btn-sm btn-square">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
											<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
											<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										</button>
										<button class="btn btn-sm btn-square">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
											<!----> <!----> <!----> <!----> <!----> <!----> 
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
											<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										</button>
									</div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<label class="flex-0"><input type="checkbox" checked="checked" class="toggle toggle-primary"></label> 
									<div class="flex-1">
										<h2 class="card-title">Enable Notifications</h2>
										<p class="text-base-content text-opacity-40">To get latest updates</p>
									</div>
								</div>
							</div>
							<div class="card col-span-1 row-span-3 shadow-lg xl:col-span-2 bg-base-100">
								<div class="card-body">
									<h2 class="my-4 text-4xl font-bold card-title">Top 10 UI Components</h2>
									<div class="mb-4 space-x-2 card-actions">
										<div class="badge badge-ghost">Colors</div>
										<div class="badge badge-ghost">UI Design</div>
										<div class="badge badge-ghost">Creativity</div>
									</div>
									<p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos. Sit sit necessitatibus veritatis sed molestiae voluptates incidunt iure sapiente.</p>
									<div class="justify-end space-x-2 card-actions"><button class="btn btn-primary">Login</button> <button class="btn">Register</button></div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body">
									<div class="flex-1">
										<h2 class="flex card-title"><button class="btn btn-ghost btn-sm btn-circle loading"></button>
										Downloading...
										</h2>
										<progress value="70" max="100" class="progress progress-secondary"></progress>
									</div>
									<div class="flex-0">
										<button class="btn btn-circle">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
										</svg>
										</button>
									</div>
								</div>
							</div>
							<div class="card shadow-lg compact side bg-base-100">
								<div class="flex-row items-center space-x-4 card-body"><label class="cursor-pointer label"><input type="checkbox" checked="checked" class="checkbox checkbox-accent"> <span class="mx-4 label-text">Enable Autosave</span></label></div>
							</div>
							<ul class="menu row-span-3 p-4 shadow-lg bg-base-100 text-base-content text-opacity-40 rounded-box">
								<li class="menu-title"><span>
									Menu Title
									</span>
								</li>
								<li>
									<a>
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										Item with icon
									</a>
								</li>
								<li>
									<a>
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										Item with icon
									</a>
								</li>
								<li>
									<a>
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
										</svg>
										Item with icon
									</a>
								</li>
							</ul>
							<div class="alert col-span-1 xl:col-span-2 bg-base-100">
								<div class="flex-1"><label class="mx-3">Lorem ipsum dolor sit amet, consectetur adip!</label></div>
								<div class="flex-none"><button class="btn btn-sm btn-ghost mr-2">Cancel</button> <button class="btn btn-sm btn-primary">Apply</button></div>
							</div>
							<div class="alert col-span-1 xl:col-span-2 alert-info">
								<div class="flex-1">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
									</svg>
									<label>Lorem ipsum dolor sit amet, consectetur adip!</label>
								</div>
							</div>
							<div class="alert col-span-1 xl:col-span-2 alert-success">
								<div class="flex-1">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> 
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
										<!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
									</svg>
									<label>Lorem ipsum dolor sit amet, consectetur adip!</label>
								</div>
							</div>
					</div>
				</div>
			</div>

						
		<?php

		wp_enqueue_script( $this->plugin_name, '//unpkg.com/alpinejs', $this->version, false );


	}
}


