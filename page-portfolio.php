<?php
/* Template Name: Portfolio */

/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

get_header();
?>

<div class="container-fluid page-container">

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

                <div class="portfolio-item row" style="background-image: url(<?php echo $image[0]; ?>);">
                    <div class="middle-wrap">
                        <div class="middle-wrap-inner">
                            <div class="intro-section-portfolio">
                                <div class="intro-title">
                                    <h1 class="title animated"><?php echo the_title(); ?></h1>
                                    <hr class="divider animated"/>
                                    <h3 class="category animated">
                                        <?php
                                        $categories = get_the_category();

                                        foreach($categories as $category){
                                            echo '<span>'.esc_html($category->name).'</span>';
                                        }
                                        ?>
                                    </h3>
                                </div>

                                <div class="intro-menu animated">
                                    <div class="intro-menu-item scroll-case">
                                        <a href="<?php echo the_permalink(); ?>">
                                            <span class="txt"><i class="icon icon-down-open"></i>bekijk case</span>
                                            <span class="bg"></span>
                                        </a>
                                    </div>

                                    <div class="intro-menu-item site-link">
                                        <a href="<?php echo get_field('site_link'); ?>" target="_blank">
                                            <span class="txt"><i class="icon-link"></i>bekijk website</span>
                                            <span class="bg"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overlay"></div>
                </div>

            <?php
            endwhile;
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

<?php get_footer(); ?>


