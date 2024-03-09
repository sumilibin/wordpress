<?php
/**
 * Dairy Farming Theme Customizer
 *
 * @package Dairy Farming
 */

function dairy_farming_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'dairy_farming_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'dairy_farming_customize_partial_blogdescription',
			)
		);
	}

	/*Logo Width*/
	$wp_customize->add_setting(
		'dairy_farming_logo_image_height_width',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '100px',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_logo_image_height_width',
		array(
			'label'       => __('Edit Logo Size ', 'dairy-farming'),
			'section'     => 'title_tagline',
			'type'        => 'text',
		)
	);

	/*
    * Theme Options Panel
    */
	$wp_customize->add_panel('dairy_farming_panel', array(
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'title' => __('Dairy Farming Theme Options', 'dairy-farming'),
	));

	/*
	* Customizer main header section
	*/

	$wp_customize->add_setting(
		'dairy_farming_site_title_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'dairy_farming_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_site_title_text',
		array(
			'label'       => __('Enable Title', 'dairy-farming'),
			'description' => __('Enable or Disable Title from the site', 'dairy-farming'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'dairy_farming_site_tagline_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'dairy_farming_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_site_tagline_text',
		array(
			'label'       => __('Enable Tagline', 'dairy-farming'),
			'description' => __('Enable or Disable Tagline from the site', 'dairy-farming'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

	/*Additional Options*/
	$wp_customize->add_section('dairy_farming_additional_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Additional Options', 'dairy-farming'),
		'panel'       => 'dairy_farming_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'dairy_farming_enable_preloader',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'dairy_farming_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_enable_preloader',
		array(
			'label'       => __('Enable Preloader', 'dairy-farming'),
			'description' => __('Checked to show preloader', 'dairy-farming'),
			'section'     => 'dairy_farming_additional_section',
			'type'        => 'checkbox',
		)
	);
	
	/*Main Header Options*/
	$wp_customize->add_section('dairy_farming_header_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Header Options', 'dairy-farming'),
		'panel'       => 'dairy_farming_panel',
	));

	/*Main Header Button Text*/
	$wp_customize->add_setting(
		'dairy_farming_header_button_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_header_button_text',
		array(
			'label'       => __('Edit Button Text ', 'dairy-farming'),
			'section'     => 'dairy_farming_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Button Link*/
	$wp_customize->add_setting(
		'dairy_farming_header_button_link',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_header_button_link',
		array(
			'label'       => __('Edit Button Link ', 'dairy-farming'),
			'section'     => 'dairy_farming_header_section',
			'type'        => 'url',
		)
	);

	/*Main Header Address Text*/

	$wp_customize->add_setting(
		'dairy_farming_header_info',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'dairy_farming_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_header_info',
		array(
			'label'       => __('Enable Topbar Details', 'dairy-farming'),
			'description' => __('Enable or Disable Topbar Details', 'dairy-farming'),
			'section'     => 'dairy_farming_header_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'dairy_farming_header_info_address',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_header_info_address',
		array(
			'label'       => __('Edit Address Text ', 'dairy-farming'),
			'section'     => 'dairy_farming_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Phone Text*/
	$wp_customize->add_setting(
		'dairy_farming_header_info_phone',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_header_info_phone',
		array(
			'label'       => __('Edit Phone Text ', 'dairy-farming'),
			'section'     => 'dairy_farming_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Phone Text*/
	$wp_customize->add_setting(
		'dairy_farming_header_info_email',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_header_info_email',
		array(
			'label'       => __('Edit Email Text ', 'dairy-farming'),
			'section'     => 'dairy_farming_header_section',
			'type'        => 'text',
		)
	);

	/*
	* Customizer main slider section
	*/
	/*Main Slider Options*/
	$wp_customize->add_section('dairy_farming_slider_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Slider Options', 'dairy-farming'),
		'panel'       => 'dairy_farming_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'dairy_farming_enable_slider',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'dairy_farming_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_enable_slider',
		array(
			'label'       => __('Enable Main Slider', 'dairy-farming'),
			'description' => __('Checked to show the main slider', 'dairy-farming'),
			'section'     => 'dairy_farming_slider_section',
			'type'        => 'checkbox',
		)
	);

	for ($i=1; $i <= 3; $i++) { 

		/*Main Slider Image*/
		$wp_customize->add_setting(
			'dairy_farming_slider_image'.$i,
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'dairy_farming_slider_image'.$i, 
				array(
			        'label' => __('Edit Slider Image ', 'dairy-farming') .$i,
			        'description' => __('Edit the slider image.', 'dairy-farming'),
			        'section' => 'dairy_farming_slider_section',
				)
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'dairy_farming_slider_heading'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'dairy_farming_slider_heading'.$i,
			array(
				'label'       => __('Edit Heading Text ', 'dairy-farming') .$i,
				'description' => __('Edit the slider heading text.', 'dairy-farming'),
				'section'     => 'dairy_farming_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Content*/
		$wp_customize->add_setting(
			'dairy_farming_slider_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'dairy_farming_slider_text'.$i,
			array(
				'label'       => __('Edit Content Text ', 'dairy-farming') .$i,
				'description' => __('Edit the slider content text.', 'dairy-farming'),
				'section'     => 'dairy_farming_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 Text*/
		$wp_customize->add_setting(
			'dairy_farming_slider_button1_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'dairy_farming_slider_button1_text'.$i,
			array(
				'label'       => __('Edit Button #1 Text ', 'dairy-farming') .$i,
				'description' => __('Edit the slider button text.', 'dairy-farming'),
				'section'     => 'dairy_farming_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 URL*/
		$wp_customize->add_setting(
			'dairy_farming_slider_button1_link'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'dairy_farming_slider_button1_link'.$i,
			array(
				'label'       => __('Edit Button #1 URL ', 'dairy-farming') .$i,
				'description' => __('Edit the slider button url.', 'dairy-farming'),
				'section'     => 'dairy_farming_slider_section',
				'type'        => 'url',
			)
		);
	}

	/*
	* Customizer Event section
	*/
	/*Event Options*/
	$wp_customize->add_section('dairy_farming_events_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Event Option', 'dairy-farming'),
		'panel'       => 'dairy_farming_panel',
	));

	/*Event Enable Option*/
	$wp_customize->add_setting(
		'dairy_farming_enable_event',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'dairy_farming_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_enable_event',
		array(
			'label'       => __('Enable Event Section', 'dairy-farming'),
			'description' => __('Checked to show the category', 'dairy-farming'),
			'section'     => 'dairy_farming_events_section',
			'type'        => 'checkbox',
		)
	);

	/*Event Heading*/
	$wp_customize->add_setting(
		'dairy_farming_event_heading',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_event_heading',
		array(
			'label'       => __('Edit Section Heading', 'dairy-farming'),
			'description' => __('Edit event section heading', 'dairy-farming'),
			'section'     => 'dairy_farming_events_section',
			'type'        => 'text',
		)
	);

	/*Event Text*/
	$wp_customize->add_setting(
		'dairy_farming_event_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_event_text',
		array(
			'label'       => __('Edit Section Text', 'dairy-farming'),
			'description' => __('Edit Event section text', 'dairy-farming'),
			'section'     => 'dairy_farming_events_section',
			'type'        => 'text',
		)
	);

	/*Event Heading*/
	$wp_customize->add_setting(
		'dairy_farming_event_heading',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_event_heading',
		array(
			'label'       => __('Edit Section Heading', 'dairy-farming'),
			'description' => __('Edit Event section heading', 'dairy-farming'),
			'section'     => 'dairy_farming_events_section',
			'type'        => 'text',
		)
	);

	for ($i=1; $i <= 6; $i++) { 

		/*Event Image*/
		$wp_customize->add_setting(
			'dairy_farming_category_image'.$i,
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'dairy_farming_category_image'.$i, 
				array(
			        'label' => __('Edit Event Image ', 'dairy-farming') .$i,
			        'description' => __('Edit the category image.', 'dairy-farming'),
			        'section' => 'dairy_farming_events_section',
				)
			)
		);

		/*Event Heading*/
		$wp_customize->add_setting(
			'dairy_farming_category_heading'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'dairy_farming_category_heading'.$i,
			array(
				'label'       => __('Edit Heading', 'dairy-farming') .$i,
				'description' => __('Edit Event heading text.', 'dairy-farming'),
				'section'     => 'dairy_farming_events_section',
				'type'        => 'text',
			)
		);

		/*Event Location*/
		$wp_customize->add_setting(
			'dairy_farming_category_location_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'dairy_farming_category_location_text'.$i,
			array(
				'label'       => __('Edit Location', 'dairy-farming') .$i,
				'description' => __('Edit Event Location text.', 'dairy-farming'),
				'section'     => 'dairy_farming_events_section',
				'type'        => 'text',
			)
		);

		/*Event Date*/
		$wp_customize->add_setting(
			'dairy_farming_category_date_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'dairy_farming_category_date_text'.$i,
			array(
				'label'       => __('Edit Date', 'dairy-farming') .$i,
				'description' => __('Edit Event Date text.', 'dairy-farming'),
				'section'     => 'dairy_farming_events_section',
				'type'        => 'text',
			)
		);

		/*Event Content*/
		$wp_customize->add_setting(
			'dairy_farming_category_text'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'dairy_farming_category_text'.$i,
			array(
				'label'       => __('Edit Content', 'dairy-farming') .$i,
				'description' => __('Edit Event content text.', 'dairy-farming'),
				'section'     => 'dairy_farming_events_section',
				'type'        => 'text',
			)
		);

	}

	/*
	* Customizer Footer Section
	*/
	/*Footer Options*/
	$wp_customize->add_section('dairy_farming_footer_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Footer Options', 'dairy-farming'),
		'panel'       => 'dairy_farming_panel',
	));


	/*Footer Social Menu Option*/
	$wp_customize->add_setting(
		'dairy_farming_footer_social_menu',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'dairy_farming_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_footer_social_menu',
		array(
			'label'       => __('Enable Footer Social Menu', 'dairy-farming'),
			'description' => __('Checked to show the footer social menu. Go to Dashboard >> Appearance >> Menus >> Create New Menu >> Add Custom Link >> Add Social Menu >> Checked Social Menu >> Save Menu.', 'dairy-farming'),
			'section'     => 'dairy_farming_footer_section',
			'type'        => 'checkbox',
		)
	);	

	/*Go To Top Option*/
	$wp_customize->add_setting(
		'dairy_farming_enable_go_to_top_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'dairy_farming_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_enable_go_to_top_option',
		array(
			'label'       => __('Enable Go To Top', 'dairy-farming'),
			'description' => __('Checked to enable Go To Top option.', 'dairy-farming'),
			'section'     => 'dairy_farming_footer_section',
			'type'        => 'checkbox',
		)
	);

	/*Footer Copyright Text Enable*/
	$wp_customize->add_setting(
		'dairy_farming_copyright_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dairy_farming_copyright_option',
		array(
			'label'       => __('Edit Copyright Text', 'dairy-farming'),
			'description' => __('Edit the Footer Copyright Section.', 'dairy-farming'),
			'section'     => 'dairy_farming_footer_section',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'dairy_farming_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dairy_farming_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dairy_farming_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dairy_farming_customize_preview_js() {
	wp_enqueue_script( 'dairy-farming-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), DAIRY_FARMING_VERSION, true );
}
add_action( 'customize_preview_init', 'dairy_farming_customize_preview_js' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Dairy_Farming_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/revolution/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Dairy_Farming_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Dairy_Farming_Customize_Section_Pro( $manager,'dairy_farming_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Dairy Farming', 'dairy-farming' ),
			'pro_text' => esc_html__( 'Buy Pro', 'dairy-farming' ),
			'pro_url'  => esc_url('https://www.revolutionwp.com/wp-themes/dairy-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'dairy-farming-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'dairy-farming-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Dairy_Farming_Customize::get_instance();