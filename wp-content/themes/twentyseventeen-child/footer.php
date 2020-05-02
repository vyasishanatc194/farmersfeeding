<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
?>
		<section class="giving-section pt-50">
			<div class="giving-div">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="center_title">
								<h2><?php echo html_entity_decode(get_option( 'footer_content_1' ));  ?></h2>
								<div class="giving-details-div">
									<div class="contact-row">
										<a href="mailto:<?php echo get_option( 'email' );?>" class="contact-link">
											<span class="icon-span"><i class="flaticon-close-envelope email_icon custom_icon"></i> </span>
											<span class="span-txt" id="footer_email"><?php echo get_option( 'email' );?></span>
										</a>
									</div>
									<div class="contact-row">
										<a href="tel:<?php echo get_option( 'phone_number' );?>" class="contact-link">
											<span class="icon-span"><i class="flaticon-call-answer tel_icon custom_icon"></i> </span>
											<span class="span-txt" id="footer_phone"><?php echo get_option( 'phone_number' );?></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- end of top title -->
	</div><!-- end of middle-container -->

	<footer>
		<div class="footer-row">
			<div class="left-link-row clearfix">
                <?php
                    $defaults = array(
                        'theme_location' => '',
                        'menu' => 'Footer Menu',
                        'container' => 'ul',
                        'menu_class' => 'footer-nav ullist-inline',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 3,
                        'walker' => new wp_bootstrap_navwalker,
                    );
                    wp_nav_menu($defaults);
                ?>

				<ul class="footer-social-ul">
					<li><a href="<?php echo get_option( 'facebook_url' );?>" id="footer_fb" target="_blank"><i class="fab fa-facebook-f social-icon"></i></a></li>
					<li><a href="<?php echo get_option( 'twitter_url' );?>" id="footer_twitter" target="_blank"><i class="fab fa-twitter social-icon"></i></a></li>
				</ul>

			</div>

			<div class="bottom-row clearfix">
				<div class="leftside-footer">					
					<p><?php echo get_option( 'copy_right_content' );?></p>
				</div>
			</div>

		</div>
	</footer>

</div><!-- end of wrapper -->

<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/js/jquery-3.3.1.slim.min.js" ></script>
<!-- validation -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/js/popper.min.js" ></script>
<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/js/waves.js"></script>
<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/js/custom.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script>
	jQuery('.footer-nav li a').addClass('footer-link');
	jQuery('.footer-nav li').append('<span class="vertical-line">|</span>');
	jQuery('.footer-nav li:last-child span').remove();
</script>
</body>
</html>
