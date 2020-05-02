<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta name="description" content="" />
<meta name="author" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>
<meta content='initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width' name='viewport' />
<meta content='yes' name='apple-mobile-web-app-capable'>
<meta content='translucent-black' name='apple-mobile-web-app-status-bar-style'>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/animate.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/waves.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/flaticon.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.js"></script>
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css" media="all" rel="stylesheet" type="text/css" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
$homePage = get_post(5);
?>
<div id="wrapper" class="wrapper">
	<header>
		<input type="hidden" id="page_title" value="<?php echo get_the_title(); ?>" />
		<div class="header-div clearfix">
			<div class="inner-top-header-div clearfix">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="logo-div">								
								<a href="<?php echo home_url(); ?>" class="logo_link clearfix">				
										<?php                    
										$custom_logo_id = get_theme_mod('custom_logo');                    
										$image = wp_get_attachment_image_src($custom_logo_id, 'full');                          
										if (has_custom_logo()) {                    	
											_e('<img src="' . $image[0] . '" class="img-fluid logo_img" alt="logo">');                    
										} else {                    	
											_e('<span class="site-name">' . esc_attr(get_bloginfo('name')) . '</span>');                    
										}                 
										?>
								</a>
							</div>
							<nav>
								<div class="top-nav1">
									<div class="cd-shadow-layer"></div>
									<div class="nav-m-bar"><a onclick="openNav()" class="opennav" data-placement="bottom" title="" data-original-title="Menu">
										<i class="menu-bars"></i></a>
									</div>
									<div class="nav-div clearfix" id="mySidenav" >
										<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
										<?php
                                            $defaults = array(
                                                'theme_location' => 'primary',
                                                'menu' => 'Top Menu',
                                                'container' => 'ul',
                                                'menu_class' => 'nav ullist-inline',
                                                'menu_id' => 'nav-res',
                                                'echo' => true,
                                                'fallback_cb' => 'wp_page_menu',
                                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="social-icon">
												<div class="social-icon-div">
													<ul class="social-ul">
														<li><a href="'.get_option( 'facebook_url' ).'" target="_blank"><i class="fab fa-facebook-f social-icon"></i></a></li>
														<li><a href="'.get_option( 'twitter_url' ).'" target="_blank"><i class="fab fa-twitter social-icon"></i></a></li>
													</ul>
												</div>
											</li></ul>',
                                                'depth' => 3,
                                                'walker' => new wp_bootstrap_navwalker,
                                            );
                                            wp_nav_menu($defaults);
                                        ?>
									</div>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div><!--  End of header with navigation div  -->

		<?php 
			$bannerpage = get_post(get_the_ID());
			if(is_front_page()) {
				if ($bannerpage->banner_section_show == 'yes') { ?>									
				<section class="main-banner-section pt-86">
					<?php $bannerpage = get_post(get_the_ID()); ?>
					<div class="main-banner-div">
						<div class="video-banner-div">
							<div class="embed-responsive embed-responsive-16by9">
								<?php echo $bannerpage->banner_iframe; ?>
							</div>
						</div>
						<div class="banner-content-div">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="center_title">
											<?php echo apply_filters('the_content', ($bannerpage->banner_content)); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section><!--  end of banner  -->
				<?php } 
				} else {	
					if (wp_get_attachment_url($bannerpage->banner_image) != false) {
						echo '<section class="inner-banner-section pt-86"  style="background:url('.wp_get_attachment_url($bannerpage->banner_image).') no-repeat">';
					} else {
						echo '<section class="inner-banner-section pt-86">';
					}?>					
						<div class="inner-banner-div join-producer-banner-cover">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="center_title">
											<h1><?php the_title(); ?></h1>
											<?php echo apply_filters('the_content', ($bannerpage->banner_content)); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section><!--  end of banner  -->
				<?php } ?>
	</header>