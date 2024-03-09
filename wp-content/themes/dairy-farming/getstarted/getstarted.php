<?php
//about theme info
add_action( 'admin_menu', 'dairy_farming_gettingstarted' );
function dairy_farming_gettingstarted() {
	add_theme_page( esc_html__('About Dairy Farming', 'dairy-farming'), esc_html__('About Dairy Farming', 'dairy-farming'), 'edit_theme_options', 'dairy_farming_guide', 'dairy_farming_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function dairy_farming_admin_theme_style() {
   wp_enqueue_style('dairy-farming-custom-admin-style', esc_url( get_template_directory_uri() ) . '/getstarted/getstarted.css');
   wp_enqueue_script('dairy-farming-tabs', esc_url( get_template_directory_uri() ) . '/getstarted/js/tab.js');
}
add_action('admin_enqueue_scripts', 'dairy_farming_admin_theme_style');

//guidline for about theme
function dairy_farming_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'dairy-farming' );
?>
<?php $dairy_farming_theme = wp_get_theme(); ?>

<div class="wrapper-info">
   <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Dairy Farming Theme', 'dairy-farming' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('Dairy Farming is a specialized website template designed to cater to the unique needs of dairy farmers and related agricultural businesses. It offers a comprehensive and user-friendly platform, making it an ideal choice for dairy farmers, milk producers, and agricultural enthusiasts aiming to establish a robust online presence within the industry. The layout and design of this theme are thoughtfully crafted with dairy farming in mind. The responsive design ensures that your website looks impressive on a variety of devices, from desktop computers to mobile phones, allowing you to reach a broad audience. Even without extensive technical knowledge, users can navigate and manage their website effortlessly. This simplicity ensures that dairy farmers and agricultural businesses can focus on their core operations while maintaining a strong online presence. The theme also offers several essential features and functionalities tailored to the dairy farming niche. These include a dedicated section for product listings, allowing dairy farmers to showcase their range of dairy products, from milk and cheese to yogurt and butter. Additionally, it provides a blog platform to share industry insights, farming tips, and updates with the agricultural community. This feature encourages engagement and helps in building a sense of community among dairy enthusiasts.','dairy-farming'); ?></p>
   </div>
   <div class="col-right">
 		<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $dairy_farming_theme->get_screenshot() ); ?>" />
   </div>
   <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="dairy_farming_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Lite Theme Details', 'dairy-farming' ); ?></button>
		  	<button class="tablinks" onclick="dairy_farming_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'dairy-farming' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="lite_theme" class="tabcontent open">
			<div class="lite-theme-tab" style="">
				<h3><?php esc_html_e( 'Lite Theme Information', 'dairy-farming' ); ?></h3>
				<hr class="h3hr">
		  		<p><?php
						$dairy_farming_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'revolutionwp_theme_description', esc_html( $dairy_farming_theme->get( 'Description' ) ) ) );
					?></p>
			  	<div class="col-left-inner">
					<h4><?php esc_html_e('Theme Customizer', 'dairy-farming'); ?></h4>
					<p> <?php esc_html_e('click here to customize your website.', 'dairy-farming'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'dairy-farming'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Experiencing Issues? Require Assistance?', 'dairy-farming'); ?></h4>
					<p> <?php esc_html_e('Our committed team is fully equipped to assist you with any questions or concerns you may have about our theme.', 'dairy-farming'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url(DAIRY_FARMING_FREE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'dairy-farming'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Customer Reviews and Testimonials', 'dairy-farming'); ?></h4>
					<p> <?php esc_html_e('Every aspect and feature of this WordPress Theme is exceptional. I would highly recommend this theme to everyone.', 'dairy-farming'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( DAIRY_FARMING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'dairy-farming'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Go For Premium', 'dairy-farming'); ?></h4>
					<p> <?php esc_html_e('Premium themes usually receive regular updates to stay compatible with the latest versions of WordPress.', 'dairy-farming'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( DAIRY_FARMING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Premium', 'dairy-farming'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Lite Documentation', 'dairy-farming'); ?></h4>
					<p> <?php esc_html_e('For Setup our lite theme you have to follow our lite documentation', 'dairy-farming'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( DAIRY_FARMING_LITE_DOC ); ?>" target="_blank"><?php esc_html_e('Lite Documentation', 'dairy-farming'); ?></a>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','dairy-farming'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','dairy-farming'); ?></p>
               <ul>
                  <p><span class="strong"><?php esc_html_e('1. Create a new page :','dairy-farming'); ?></span><?php esc_html_e(' Go to ','dairy-farming'); ?>
				  		<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','dairy-farming'); ?></b></p>

                  <p><?php esc_html_e('Name it as "Home" then select the template "Home Page".','dairy-farming'); ?></p>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/getstarted/images/home-page-template.png" alt="" />
                  <p><span class="strong"><?php esc_html_e('2. Set the front page:','dairy-farming'); ?></span><?php esc_html_e(' Go to ','dairy-farming'); ?>
				  		<b><?php esc_html_e(' Settings >> Reading ','dairy-farming'); ?></b></p>
				  		<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','dairy-farming'); ?></p>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/getstarted/images/set-front-page.png" alt="" />
               </ul>
			  	</div>
		  	</div>
		</div>
		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'dairy-farming' ); ?></h3>
			<hr class="h3hr">
	    	<div class="col-left-pro">
	    		<p><?php esc_html_e('Dairy Farming is a specialized website template designed to cater to the unique needs of dairy farmers and related agricultural businesses. It offers a comprehensive and user-friendly platform, making it an ideal choice for dairy farmers, milk producers, and agricultural enthusiasts aiming to establish a robust online presence within the industry. The layout and design of this theme are thoughtfully crafted with dairy farming in mind. The responsive design ensures that your website looks impressive on a variety of devices, from desktop computers to mobile phones, allowing you to reach a broad audience. Even without extensive technical knowledge, users can navigate and manage their website effortlessly. This simplicity ensures that dairy farmers and agricultural businesses can focus on their core operations while maintaining a strong online presence. The theme also offers several essential features and functionalities tailored to the dairy farming niche. These include a dedicated section for product listings, allowing dairy farmers to showcase their range of dairy products, from milk and cheese to yogurt and butter. Additionally, it provides a blog platform to share industry insights, farming tips, and updates with the agricultural community. This feature encourages engagement and helps in building a sense of community among dairy enthusiasts.','dairy-farming'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( DAIRY_FARMING_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'dairy-farming'); ?></a>
					<a class="buy-pro" href="<?php echo esc_url( DAIRY_FARMING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'dairy-farming'); ?></a>
					<a href="<?php echo esc_url( DAIRY_FARMING_PRO_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Premium Suppport', 'dairy-farming'); ?></a>
					<a href="<?php echo esc_url( DAIRY_FARMING_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Premium Documentation', 'dairy-farming'); ?></a>
				</div>
	    	</div>
	    	<div class="featurebox">
	    		<h3><?php esc_html_e( 'Theme Features', 'dairy-farming' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'dairy-farming'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'dairy-farming'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Customizing the theme', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Adaptive Layout', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Uploading a Logo', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Links to Social Media', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Quantity of Slides', 'dairy-farming'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'dairy-farming'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'dairy-farming'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates', 'dairy-farming'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'dairy-farming'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'dairy-farming'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'dairy-farming'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'dairy-farming'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'dairy-farming'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Sections of the theme', 'dairy-farming'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'dairy-farming'); ?></td>
								<td class="table-img"><?php esc_html_e('16', 'dairy-farming'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'dairy-farming'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'dairy-farming'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates and Layout', 'dairy-farming'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'dairy-farming'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates and Layout', 'dairy-farming'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'dairy-farming'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Scheme for Specific Sections', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Enable Setting Site Title, Tagline, and Logo', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Toggle On/Off Options for All Sections and Logo', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Up-to-Date Compatibility with the Latest WordPress Version', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Compatibility with WooCommerce', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support for Third-Party Plugins', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Programming', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Unique Features', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Affordable Value', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('High-Priority Error Resolution', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Effortless Customer Support', 'dairy-farming'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( DAIRY_FARMING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'dairy-farming'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>