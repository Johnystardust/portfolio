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

                <div class="portfolio-item">

                    <div class="item-head" style="background-image: url(<?php echo $image[0]; ?>);">
                        <div class="intro-section">
                            <div class="middle-wrap">
                                <div class="middle-wrap-inner">
                                    <h1 class="intro-title animated"><?php echo the_title(); ?></h1>
                                    <hr class="divider animated"/>
                                    <h2 class="category animated">Website</h2>

                                    <div class="intro-menu">

                                        <div class="intro-menu-item close-project animated">
                                            <a href="#">
                                                <span class="txt"><i class="icon icon-th"></i>terug</span>
                                                <span class="bg"></span>
                                            </a>
                                        </div>

                                        <div class="intro-menu-item view-case animated">
                                            <a href="#">
                                                <span class="txt"><i class="icon icon-down-open"></i>bekijk case</span>
                                                <span class="bg"></span>
                                            </a>
                                        </div>

                                        <div class="intro-menu-item site-link animated">
                                            <a href="<?php echo get_field('site_link'); ?>" target="_blank">
                                                <span class="txt"><i class="icon-link"></i>bekijk website</span>
                                                <span class="bg"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overlay overlay-hide"></div>
                    </div>

                    <div class="item-case">

                        <div class="case-section">
                            <?php
                            if(have_rows('sections')){
                                $i = 1;
                                while(have_rows('sections')) : the_row();
                                    switch(get_row_layout()){
                                        case 'text':
                                            ?>
                                            <div id="section-item-<?php echo $i; ?>" class="text section-item">
                                                <?php
                                                if(get_sub_field('title')){
                                                    ?>
                                                    <div class="title">
                                                        <h1><?php echo get_sub_field('title'); ?></h1>
                                                        <hr/>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php the_sub_field('text'); ?>
                                            </div>
                                            <?php
                                            break;

                                        case 'image':
                                            ?>
                                            <div id="section-item-<?php echo $i; ?>" class="image section-item">
                                                <img src="<?php echo get_sub_field('image'); ?>" alt=""/>
                                            </div>
                                            <?php
                                            break;
                                    }
                                    $i++;
                                endwhile;
                            }
                            ?>
                        </div>

                        <div class="case-section case-section-review" style="background-image: url(<?php echo get_field('review_background_image'); ?>)">
                            <div class="text">
                                <div class="title">
                                    <h1>THE REVIEW</h1>
                                    <hr/>
                                </div>
                                <?php the_field('review'); ?>
                                <br/>
                                <hr/>
                                <br/>
                                <span class="review-author"><?php echo get_field('author'); ?></span>
                            </div>
                            <div class="overlay-review"></div>
                        </div>

                    </div>

                    <div class="case-menu">
                        <div class="case-menu-item">
                            <a href="#">
                                <span class="txt"><i class="icon icon-left-open"></i>Vorige</span>
                                <span class="bg"></span>
                            </a>
                        </div>

                        <div class="case-menu-item">
                            <a href="#">
                                <span class="txt"><i class="icon icon-th"></i>Alle Cases</span>
                                <span class="bg"></span>
                            </a>
                        </div>

                        <div class="case-menu-item">
                            <a href="<?php echo get_field('site_link'); ?>" target="_blank">
                                <span class="txt">bekijk website<i class="icon icon-link"></i></span>
                                <span class="bg"></span>
                            </a>
                        </div>

                        <div class="case-menu-item">
                            <a href="#">
                                <span class="txt">Volgende<i class="icon icon-right-open"></i></span>
                                <span class="bg"></span>
                            </a>
                        </div>
                    </div>

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
</div>

<?php get_footer(); ?>

