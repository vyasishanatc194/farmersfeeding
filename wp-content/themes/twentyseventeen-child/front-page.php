<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
$homePage = get_post(5);
get_header(); ?>
<div class="middle-container">
    <?php if($homePage->below_banner_content !== '') { ?> 
    <section class="top-title-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center_title">
                        <?php echo apply_filters('the_content', ($homePage->below_banner_content)); ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of top title -->
    <?php } ?>

    <?php if ($homePage->campaign_section_show == 'yes') { ?>
        <section class="utah-top-section">
			<div class="utah-top-div">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="center_title2">
								<h3><?php echo $homePage->campaign_title; ?></h3>
								<div class="prag-content-div pb-30"><?php echo $homePage->campaign_content; ?></div>
								<div class="btn-row">
									<a href="<?php echo $homePage->campaign_button_link; ?>" class="btn btn-primary btn-readmore-big"><?php echo $homePage->campaign_button_text; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- end of cremations top -->
	<?php } ?>

    <?php if (have_rows('middle_multiple_section')) :
        $count = 1;
        while (have_rows('middle_multiple_section')) : the_row();
        $class = (($count % 2) == 0) ? 'boxright' : 'boxleft' ;
        $pt = ($count == 1) ? 'pt-50' : '' ;
        $count++;
        $title = get_sub_field('title');
        $buttonLink = get_sub_field('button_link');
        $buttonText = get_sub_field('button_text');
        $image = get_sub_field('image');        
        $description = get_sub_field('description');
        ?>
        <?php if ($homePage->middle_section_show == 'yes') { ?>
                <section class="<?php echo $class;?>-img-section <?php echo $pt;?>">
                <div class="<?php echo $class;?>-img-div bg-hover-zoom1 clearfix">
                    <?php
                    if($class == 'boxleft')
                    {
                        ?>
                        <div class="col-50 left-div">
                            <div class="imgthumb-div campaign-banner-img" style="background:url('<?php echo $image['url'];?>'); background-size: cover;">
                            </div>
                        </div>

                        <div class="col-50 right-div">
                            <div class="content-div">
                                <h3><?php echo $title;?></h3>
                                <div class="prag-content-div"><p><?php echo $description;?> </p></div>
                                <div class="btn-row">
                                    <a href="<?php echo ($buttonLink == '') ? '#' : $buttonLink;?>" class="btn btn-primary btn-primary2  btn-readmore"><?php echo $buttonText;?></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="col-50 left-div">
                            <div class="content-div">
                                <h3><?php echo $title; ?></h3>
                                <div class="prag-content-div"><p><?php echo $description; ?> </p></div>
                                <div class="btn-row">
                                    <a href="<?php echo ($buttonLink == '') ? '#' : $buttonLink; ?>" class="btn btn-primary btn-primary2  btn-readmore"><?php echo $buttonText;?></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-50 right-div">
                            <div class="imgthumb-div campaign-banner-img" style="background:url('<?php echo $image['url']; ?>'); background-size: cover;">

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section><!--  end of box img 1  -->
        <?php } ?>
    <?php
    endwhile;
    else:
    endif;
    ?>

    <?php if ($homePage->miracle_workers_section_show == 'yes') { ?>
        <section class="utah-top-section partner-logo-section">
			<div class="utah-top-div partner-logo-div">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="center_title2">
								<h3><?php echo $homePage->miracle_workers_title; ?></h3>
								<div class="image-thumb-row">
									<div class="row justify-content-center">
                                    <?php              
                                        if (have_rows('miracle_workers_image_list')):      	
                                        while (have_rows('miracle_workers_image_list')): the_row();  
                                        $image = get_sub_field('miracle_workers_image');   		
                                        ?> 
                                            <div class="col-lg-4">
                                                <div class="img-thumb">
                                                    <img src="<?php echo $image['url']; ?>" class="img-fluid img-logo" alt="CBHLogo-Color-Stacked">
                                                </div>
                                            </div>                               
                                        <?php     	
                                        endwhile;        
                                        else:        	
                                        // no rows found        
                                        endif;       
                                    ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    <?php } ?>

<?php
get_footer();
