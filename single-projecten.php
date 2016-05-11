<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

get_header();
?>

<div id="single-portfolio-container">
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="single-item-head" style="background-image: url(<?php echo get_field('header_background_image'); ?>);">
            <div class="intro-section">
                <div class="middle-wrap">
                    <div class="middle-wrap-inner">
                        <h1 class="intro-title animated"><?php echo the_title(); ?></h1>
                        <hr class="divider animated"/>
                        <h2 class="category animated">Website</h2>

                        <div class="intro-menu">

                            <div class="intro-menu-item close-project animated">
                                <a href="<?php echo get_page_link(get_page_by_title('Portfolio')); ?>">
                                    <span class="txt"><i class="icon icon-th"></i>terug</span>
                                    <span class="bg"></span>
                                </a>
                            </div>

                            <div class="intro-menu-item scroll-case animated">
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
            <div class="overlay"></div>
        </div>

        <div class="single-item-case">

            <div class="case-section">
                <?php
                if(have_rows('sections')){
                    $i = 1;
                    while(have_rows('sections')) : the_row();
                        switch(get_row_layout()){
                            case 'text':
                                ?>
                                <div id="section-item-<?php echo $i; ?>" class="text section-item animated">
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
                                <div id="section-item-<?php echo $i; ?>" class="image section-item animated">
                                    <img src="<?php echo get_sub_field('image'); ?>" alt=""/>
                                </div>
                                <?php
                                break;

                            case 'cards':
                                ?>
                                <div id="section-item-<?php echo $i; ?>" class="cards section-item animated">
                                    <?php
                                    if(have_rows('cards')){

                                        while(have_rows('cards')) : the_row();
                                            ?>
                                            <div class="card-wrap">
                                                <div class="card">
                                                    <div class="card-inner">
                                                        <i class="icon <?php echo get_sub_field('icon'); ?>"></i>
                                                    </div>
                                                </div>
                                                <h2><?php echo get_sub_field('text'); ?></h2>
                                            </div>
                                            <?php
                                        endwhile;
                                    }
                                    ?>
                                </div>
                                <?php
                                break;

                            case 'quote':
                                ?>
                                <div id="section-item-<?php echo $i; ?>" class="quote section-item animated">
                                    <h1>"<?php echo get_sub_field('quote'); ?>"</h1>
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
                        <h1>REFFERENTIE</h1>
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

        <?php
        $next_post              = get_next_post();
        $next_permalink         = get_permalink($next_post->ID);

        $prev_post              = get_previous_post();
        $prev_permalink         = get_permalink($prev_post->ID);

        $previous_adjacent_post = get_adjacent_post(true, '', true);
        $next_adjacent_post     = get_adjacent_post(true, '', false);
        ?>

        <div class="single-case-menu">

                <?php
                if($previous_adjacent_post){
                    ?>
                    <div class="case-menu-item">
                        <a href="<?php echo $prev_permalink; ?>">
                            <span class="txt"><i class="icon icon-left-open"></i>Vorige</span>
                            <span class="bg"></span>
                        </a>
                    </div>
                <?php
                }
                else {
                    ?>
                    <div class="case-menu-item no-link">
                        <a href="#">
                            <span class="txt"><i class="icon icon-left-open"></i>Vorige</span>
                            <span class="bg"></span>
                        </a>
                    </div>
                    <?php
                }
                ?>


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


            <?php
            if($next_adjacent_post){
                ?>
                <div class="case-menu-item">
                    <a href="<?php echo $next_permalink; ?>">
                        <span class="txt">Volgende<i class="icon icon-right-open"></i></span>
                        <span class="bg"></span>
                    </a>
                </div>
            <?php
            }
            else {
                ?>
                <div class="case-menu-item no-link">
                    <a href="">
                        <span class="txt">Volgende<i class="icon icon-right-open"></i></span>
                        <span class="bg"></span>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>

    <?php endwhile; ?>

    <?php get_footer(); ?>
</div>