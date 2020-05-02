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
$homePage = get_post(5);
?>
<?php if ($homePage->footer_section_show == 'yes') { ?>
		<section class="contact-box-section">
			<div class="contact-box-div  clearfix">
				<div class="col-50 left-div">
					<div class="content-div">
                        <?php echo apply_filters('the_content', ($homePage->footer_content)); ?>
						<div class="content-details-div">
							<div class="contact-row">
								<a href="mailto:<?php echo get_option( 'email' );?>;" class="contact-link">
									<span class="icon-span"><i class="flaticon-close-envelope email_icon custom_icon"></i> </span>
									<span class="span-txt" id="contact_section_email"><?php echo get_option( 'email' );?></span>
								</a>
							</div>
							<div class="contact-row">
								<a href="tel:<?php echo get_option( 'phone_number' );?>;" class="contact-link">
									<span class="icon-span"><i class="flaticon-call-answer tel_icon custom_icon"></i> </span>
									<span class="span-txt" id="contact_section_phone"><?php echo get_option( 'phone_number' );?></span>
								</a>
							</div>
						</div>
						<div class="form-div">
                            <?php //echo do_shortcode('[mailpoet_form id="2"]'); ?>
						</div>
					</div>
				</div>

				<div class="col-50 right-div">
                    <?php
                        if (wp_get_attachment_url($homePage->footer_image) != false) {
                            echo '<div class="imgthumb-div" style="background:url('.wp_get_attachment_url($homePage->footer_image).')"></div>';
                        } else {
                            echo '<div class="imgthumb-div"> </div>';
                        }
                    ?>
				</div>
			</div>
		</section><!--  end of box righr img  -->
	<?php } ?>
		<section class="giving-section">
			<div class="giving-div">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="center_title">
								<h2><?php echo html_entity_decode(get_option( 'footer_content_1' ));  ?></h2>
								<div class="giving-details-div">
									<div class="contact-row">
										<a href="mailto:<?php echo get_option( 'email' );?>;" class="contact-link">
											<span class="icon-span"><i class="flaticon-close-envelope email_icon custom_icon"></i> </span>
											<span class="span-txt" id="footer_email"><?php echo get_option( 'email' );?></span>
										</a>
									</div>
									<div class="contact-row">
										<a href="tel:<?php echo get_option( 'phone_number' );?>;" class="contact-link">
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
					<p><?php echo html_entity_decode(get_option( 'footer_content_2' ));  ?></p>
				</div>
				<div class="rightside-footer">
					<p><?php echo get_option( 'copy_right_content' );?></p>
					<p class="brave_thinking">Website by <a class="brave_thinking_a_tag" href="https://www.bravethinking.co.uk/" target="_blank"> Brave Thinking</a></p>
				</div>
			</div>

		</div>
	</footer>

</div><!-- end of wrapper -->

<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/assets/js/jquery-3.3.1.slim.min.js" ></script>
<!-- validation -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/assets/js/popper.min.js" ></script>
<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/assets/js/waves.js"></script>
<script src="<?php echo get_stylesheet_directory_uri('template_url'); ?>/assets/js/custom.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</body>
</html>
