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
<?php wp_head(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta name="description" content="" />
<meta name="author" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta content='initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width' name='viewport' />
<meta content='yes' name='apple-mobile-web-app-capable'>
<meta content='translucent-black' name='apple-mobile-web-app-status-bar-style'>
<link href='<?php echo get_stylesheet_directory_uri('template_url'); ?>/assets/images/favicon.png' rel='shortcut icon'>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/animate.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/dev.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/waves.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/flaticon.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/modernizr.js"></script>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJWGB53" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>

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
                                <?php the_custom_logo(); ?>
								<a class="logo_link scroll-logo-div clearfix" href="<?php echo site_url(); ?>">
									<img src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/assets/images/logo2.png" class="img-fluid logo_img scroll-logo" alt="logo" />
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

		<section class="banner-section">
            <?php
                $bannerpage = get_post(get_the_ID());
                if (wp_get_attachment_url($bannerpage->banner_image) != false) {
                    echo '<div class="banner-div" style="background:url('.wp_get_attachment_url($bannerpage->banner_image).') no-repeat">';
                } else {
                    echo '<div class="banner-div">';
                }
                ?>
				<div class="center_title">
					<?php echo apply_filters('the_content', ($bannerpage->banner_content)); ?>
				</div>
			</div>
		</section><!--  end of banner  -->

	</header>

	<div class="middle-container">

        <?php
        if (is_front_page()) { ?>
		<section class="top-title-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="center_title">
							<h2><?php echo $homePage->below_banner_content; ?></h2>
						</div>
					</div>
				</div>
			</div>
        </section><!-- end of top title -->

        <section class="cremations-top-section">
            <div class="cremations-top-div">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="center_title2">
                                <?php echo apply_filters('the_content', ($homePage->header_section)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- end of cremations top -->
        <?php
        }
        else {
            $page = get_post(get_the_ID());
			if (strlen($page->content) > 0) {
            ?>
			<section class="top-title-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="center_title">
								<h2><?php echo $page->below_banner_content; ?></h2>
							</div>
						</div>
					</div>
				</div>
			</section><!-- end of top title -->
			<?php } ?>
            <section class="breadcrumb-section">
                <div class="breadcrumb-div">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="breadcrumb-row">
                                    <?php
                                        echo do_shortcode('[flexy_breadcrumb]');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- end of top title -->

        <?php } ?>


