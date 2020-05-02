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

    <?php if (have_rows('middle_multiple_section')) :
        $count = 1;
        while (have_rows('middle_multiple_section')) : the_row();
        $class = (($count % 2) == 0) ? 'boxright' : 'boxleft' ;

        $count++;
        $title = get_sub_field('title');
        $buttonLink = get_sub_field('button_link');
        $image = get_sub_field('image');        
        $description = get_sub_field('description');
        ?>
        <?php if ($homePage->middle_section_show == 'yes') { ?>
            <section class="<?php echo $class;?>-img-section">
                <div class="<?php echo $class;?>-img-div  clearfix">
                    <?php
                    if($class == 'boxleft')
                    {
                        ?>
                        <div class="col-50 right-div">
                            <div class="imgthumb-div lower-cost-div" style="background:url('<?php echo $image['url'];?>')">

                            </div>
                        </div>

                        <div class="col-50 left-div">
                            <div class="content-div">
                                <h3><?php echo $title;?></h3>
                                <div class="prag-content-div"><p><?php echo $description;?> </p></div>
                                <div class="btn-row">
                                    <a href="<?php echo ($buttonLink == '') ? '#' : $buttonLink;?>" class="btn btn-primary btn-readmore">Read more</a>
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
                                    <a href="<?php echo ($buttonLink == '') ? '#' : $buttonLink; ?>" class="btn btn-primary btn-readmore">Read more</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-50 right-div">
                            <div class="imgthumb-div lower-cost-div" style="background:url('<?php echo $image['url']; ?>')">

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

    <?php if ($homePage->about_section_show == 'yes') { ?>
        <section class="sae-section">
            <?php
                if (wp_get_attachment_url($homePage->about_us_image) != false) {
                    echo '<div class="sae-div clearfix" style="background:url('.wp_get_attachment_url($homePage->about_us_image).')">';
                } else {
                    echo '<div class="sae-div clearfix">';
                }
            ?>

                <div class="bluebox-div">
                    <div class="content-div">
                         <?php echo apply_filters('the_content', ($homePage->about_us_section)); ?>
                    </div>
                </div>

            </div>
        </section><!--  end of box img  -->
    <?php } ?>

<?php
get_footer();
