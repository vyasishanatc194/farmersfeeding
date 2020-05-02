<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<section class="heading-section">
        <div class="heading-div heading-div2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <h1>404</h1>
                        <p>Page not found</p>
                        <div class="getintouch-div"><a href="<?php echo site_url('');?>" class="btn black-link">Back To Home</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of cremations top -->

<?php
get_footer();
