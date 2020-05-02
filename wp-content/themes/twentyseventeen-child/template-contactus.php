<?php
/**
 * Template Name: Form Template
 */
$page = get_post(get_the_ID());
get_header(); ?>

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

<?php if ($page->body_top_main_show == 'yes') { ?>
    <section class="heading-section">
        <div class="heading-div">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="center_title2">
                            <?php if($page->body_top_main_title !== '') { ?>
                                <h3><?php echo $page->body_top_main_title; ?></h3>
                            <?php } ?>
                            <div class="prag-content-div prag-content-div2">
                                <?php echo $page->body_top_main_content; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if ($page->form_section_show == 'yes') { ?>
    <section class="main-form-section donate-form-section">
        <div class="main-form-div">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="common-form-div">  
                                                      
                            <?php echo do_shortcode($page->form_shortcode); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of cremations top -->
<?php } ?>

<?php if($page->map_iframe !== '') {?>
    <section class="map-section">
        <div class="map-div">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 p0">
                    <?php echo do_shortcode($page->map_iframe); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>		
<?php } ?>
<?php get_footer(); ?>
