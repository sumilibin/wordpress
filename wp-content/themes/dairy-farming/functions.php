<?php
/**
 * Dairy Farming functions and definitions
 *
 * @package Dairy Farming
 */

if ( ! defined( 'DAIRY_FARMING_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'DAIRY_FARMING_VERSION', '1.0.0' );
}

function dairy_farming_setup() {

	load_theme_textdomain( 'dairy-farming' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "responsive-embeds" );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dairy-farming' ),
			'social-menu' => esc_html__('Social Menu', 'dairy-farming'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'dairy_farming_custom_background_args',
			array(
				'default-color' => '#fafafa',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
}
add_action( 'after_setup_theme', 'dairy_farming_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dairy_farming_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dairy_farming_content_width', 640 );
}
add_action( 'after_setup_theme', 'dairy_farming_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dairy_farming_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dairy-farming' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dairy-farming' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'dairy-farming' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'dairy-farming' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'dairy-farming' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'dairy-farming' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'dairy-farming' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'dairy-farming' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dairy_farming_widgets_init' );


function dairy_farming_social_menu()
    {
        if (has_nav_menu('social-menu')) :
            wp_nav_menu(array(
                'theme_location' => 'social-menu',
                'container' => 'ul',
                'menu_class' => 'social-menu menu',
                'menu_id'  => 'menu-social',
            ));
        endif;
    }

/**
 * Enqueue scripts and styles.
 */
function dairy_farming_scripts() {

	// Load fonts locally
	require_once get_theme_file_path('revolution/inc/wptt-webfont-loader.php');

	$dairy_farming_font_families = array(
		'ZCOOL XiaoWei',
		'Oxygen:wght@300;400;700',
	);
	
	$dairy_farming_fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $dairy_farming_font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	wp_enqueue_style('dairy-farming-google-fonts', wptt_get_webfont_url(esc_url_raw($dairy_farming_fonts_url)), array(), '1.0.0');
	
	// Font Awesome CSS
	wp_enqueue_style('font-awesome-5', get_template_directory_uri() . '/revolution/assets/vendors/font-awesome-5/css/all.min.css', array());

	wp_enqueue_style('owl.carousel.style', get_template_directory_uri() . '/revolution/assets/css/owl.carousel.css', array());
	
	wp_enqueue_style( 'dairy-farming-style', get_stylesheet_uri(), array(), DAIRY_FARMING_VERSION );

	wp_style_add_data('dairy-farming-style', 'rtl', 'replace');

	wp_enqueue_script( 'dairy-farming-navigation', get_template_directory_uri() . '/js/navigation.js', array(), DAIRY_FARMING_VERSION, true );

	wp_enqueue_script( 'owl.carousel.jquery', get_template_directory_uri() . '/revolution/assets/js/owl.carousel.js', array(), DAIRY_FARMING_VERSION, true );

	wp_enqueue_script( 'dairy-farming-custom-js', get_template_directory_uri() . '/revolution/assets/js/custom.js', array('jquery'), DAIRY_FARMING_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dairy_farming_scripts' );

if (!function_exists('dairy_farming_related_post')) :
    /**
     * Display related posts from same category
     *
     */
    function dairy_farming_related_post($post_id){        
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-post">
                    
                    <h2 class="post-title"><?php esc_html_e('Related Posts','dairy-farming'); ?></h2>
                    <?php
                    $dairy_farming_cat_post_args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post_id),
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true
                    );
                    $dairy_farming_featured_query = new WP_Query($dairy_farming_cat_post_args);
                    ?>
                    <div class="rel-post-wrap">
                        <?php
                        if ($dairy_farming_featured_query->have_posts()) :

                        while ($dairy_farming_featured_query->have_posts()) : $dairy_farming_featured_query->the_post();
                            ?>

							<div class="card-item rel-card-item">
								<div class="card-content">
									<div class="entry-title">
										<h3>
											<a href="<?php the_permalink() ?>">
												<?php the_title(); ?>
											</a>
										</h3>
									</div>
									<div class="entry-meta">
										<?php dairy_farming_posted_on(); ?>
									</div>
								</div>
							</div>
                        <?php
                        endwhile;
                        ?>
                <?php
                endif;
                wp_reset_postdata();
                ?>
                </div>
                <?php
            }
        }
    }
endif;
add_action('dairy_farming_related_posts', 'dairy_farming_related_post', 10, 1);

// Add admin notice
function dairy_farming_admin_notice() { 
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'dairy_farming_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();

    if( !$meta ){
	    if( is_network_admin() ){
	        return;
	    }

	    if( ! current_user_can( 'manage_options' ) ){
	        return;
	    } 
		
		if($current_screen->base != 'appearance_page_dairy_farming_guide' ) { ?>
			<div class="notice notice-success">
				<h2><?php esc_html_e('Hey, Thank you for installing Dairy Farming Theme!', 'dairy-farming'); ?><span><a class="info-link" href="<?php echo esc_url( admin_url( 'themes.php?page=dairy_farming_guide' ) ); ?>"><?php esc_html_e('Click Here for more Details', 'dairy-farming'); ?></a></span></h2>
				<p class="dismiss-link"><strong><a href="?dairy_farming_admin_notice=1"><?php esc_html_e( 'Dismiss', 'dairy-farming' ); ?></a></strong></p>
			</div>
			<?php
		}

	}
}

add_action( 'admin_notices', 'dairy_farming_admin_notice' );

if( ! function_exists( 'dairy_farming_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function dairy_farming_update_admin_notice(){
    if ( isset( $_GET['dairy_farming_admin_notice'] ) && $_GET['dairy_farming_admin_notice'] = '1' ) {
        update_option( 'dairy_farming_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'dairy_farming_update_admin_notice' );


add_action('after_switch_theme', 'dairy_farming_setup_options');
function dairy_farming_setup_options () {
    update_option('dairy_farming_admin_notice', FALSE );
}


function dairy_farming_logo_image_height_width(){
	$dairy_farming_logo_image_height_width   = get_theme_mod( 'dairy_farming_logo_image_height_width', 150 );
	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $dairy_farming_logo_image_height_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}
add_action( 'wp_head', 'dairy_farming_logo_image_height_width' );

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 */
function dairy_farming_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/revolution/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/revolution/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/revolution/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/revolution/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/revolution/inc/jetpack.php';

}
/**
 * Load getstart.
 */
require get_template_directory() . '/getstarted/getstarted.php';

function dairy_farming_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'dairy_farming_remove_customize_register', 11 );

define('DAIRY_FARMING_FREE_SUPPORT',__('https://wordpress.org/support/theme/dairy-farming/','dairy-farming'));
define('DAIRY_FARMING_PRO_SUPPORT',__('https://www.revolutionwp.com/support/revolution-wp/','dairy-farming'));
define('DAIRY_FARMING_REVIEW',__('https://wordpress.org/support/theme/dairy-farming/reviews/#new-post','dairy-farming'));
define('DAIRY_FARMING_BUY_NOW',__('https://www.revolutionwp.com/wp-themes/dairy-wordpress-theme/','dairy-farming'));
define('DAIRY_FARMING_LIVE_DEMO',__('https://www.revolutionwp.com/wpdemo/dairy-farming-pro/','dairy-farming'));
define('DAIRY_FARMING_PRO_DOC',__('https://www.revolutionwp.com/wpdocs/dairy-farming-pro/','dairy-farming'));
define('DAIRY_FARMING_LITE_DOC',__('https://www.revolutionwp.com/wpdocs/dairy-farming-free','dairy-farming'));