<?php
/**
 * The header for our theme
 *
 * @package Dairy Farming
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dairy-farming' ); ?></a>

	<?php
		$dairy_farming_preloader_wrap = absint(get_theme_mod('dairy_farming_enable_preloader', 0));
		if($dairy_farming_preloader_wrap == 1){ ?>
			<div id="loader">
				<div class="loader-container">
					<div id="preloader" class="loader-2">
						<div class="dot"></div>
					</div>
				</div>
			</div>
	<?php } ?>

	<header id="masthead" class="site-header">
		<div class="header-menu-box">
			<div class="container">
				<div class="section-nav main-header-box">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
						?>
					</nav>
				</div>
			</div>
		</div>

		<?php $dairy_farming_has_header_image = has_header_image(); ?>
		<div class="main-header-wrap">
			<div class="top-box" <?php if (!empty($dairy_farming_has_header_image)) { ?> style="background-image: url(<?php echo header_image(); ?>);" <?php } ?>>
				<div class="container">
					<div class="flex-row">
						<div class="nav-box-header-left">
							<div class="header-button">
								<?php if ( get_theme_mod('dairy_farming_header_button_link') ||  get_theme_mod('dairy_farming_header_button_text' )) : ?><a href="<?php echo esc_url( get_theme_mod('dairy_farming_header_button_link') ); ?>"><?php echo esc_html( get_theme_mod('dairy_farming_header_button_text') ); ?></a><?php endif; ?>
							</div>
						</div>
						<div class="main-header main-header-box">
							<div class="site-branding">
								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
									<?php if( get_theme_mod('dairy_farming_site_title_text',true)){ ?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php } ?>
									<?php
								else :
									?>
									<?php if( get_theme_mod('dairy_farming_site_title_text',true)){ ?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php } ?>
									<?php
								endif; ?>
								<?php $dairy_farming_description = get_bloginfo( 'description', 'display' );
									if ( $dairy_farming_description || is_customize_preview() ) :
									?>
									<?php if( get_theme_mod('dairy_farming_site_tagline_text',false)){ ?>
										<p class="site-description"><?php echo $dairy_farming_description; ?></p>
									<?php } ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="nav-box-header-right">
							<div class="social-links">
								<?php
									dairy_farming_social_menu();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if( get_theme_mod( 'dairy_farming_header_info',false ) ) { ?>
			<div class="header-info-box">
				<div class="container">
					<div class="flex-row">
						<div class="nav-box-header-left">
							<?php if ( get_theme_mod('dairy_farming_header_info_address') ) : ?><p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( get_theme_mod('dairy_farming_header_info_address') ); ?></p><?php endif; ?>
						</div>
						<div class="main-info-box">
							<?php if ( get_theme_mod('dairy_farming_header_info_phone') ) : ?><p><i class="fas fa-phone-alt"></i> <?php echo esc_html( get_theme_mod('dairy_farming_header_info_phone') ); ?></p><?php endif; ?>
						</div>
						<div class="nav-box-header-right">
							<?php if ( get_theme_mod('dairy_farming_header_info_email') ) : ?><p><i class="fas fa-envelope"></i> <?php echo esc_html( get_theme_mod('dairy_farming_header_info_email') ); ?></p><?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</header>