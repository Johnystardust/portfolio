<?php
/* Template Name: Portfolio */

/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

get_header();
?>

<div class="portfolio-container">
    <div class="scrollable-container">

        <?php
        $args = array(
            'post_type'         => 'projecten',
            'posts_per_page'    => '',
        );

        $the_query = new WP_Query($args);

        /*
        |----------------------------------------------------------------
        |   If there are posts display them.
        |----------------------------------------------------------------
        */
        if($the_query->have_posts()) {
            while ($the_query->have_posts()): $the_query->the_post();

                if(has_post_thumbnail()){
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                }
                ?>

                <div class="scrollable-item portfolio-item">

                    <div class="item-head" style="background-image: url(<?php echo $image[0]; ?>);">
                        <div class="intro-section">
                            <div class="middle-wrap">
                                <div class="middle-wrap-inner">
                                    <h1 class="intro-title animated"><?php echo the_title(); ?></h1>
                                    <hr class="divider animated"/>
                                    <h2 class="category animated">Website</h2>

                                    <div class="intro-menu">
                                        <div class="intro-menu-item view-case animated">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <span class="txt"><i class="icon icon-down-open"></i>bekijk case</span>
                                                <span class="bg"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overlay overlay-hide"></div>
                    </div>

                </div>

            <?php
            endwhile;
            ?>

            <div class="scrollable-item footer-item">
                <?php get_footer(); ?>
            </div>

            <?php
        }

        /*
        |----------------------------------------------------------------
        |   If there aren't any posts display a warning.
        |----------------------------------------------------------------
        */
        else {
            echo 'There are no posts to display';
        }

        /*
        |----------------------------------------------------------------
        |   Reset the post data.
        |----------------------------------------------------------------
        */
        wp_reset_postdata();
        ?>

    </div>
</div>


