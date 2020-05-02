<?php
/**
 * Template Name: Thank You Template
 */
$homePageID = 5;
$page = get_post(get_the_ID());
get_header(); ?>

<section class="heading-section">
    <div class="heading-div">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center_title2 center_title3 thankyou ">
                        <?php echo apply_filters('the_content', ($page->header_section)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end of cremations top -->
<?php get_footer(); ?>
