<?php
/* Template Name: Home */

/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

get_header();
?>

<div id="slider-header" class="container-fluid">
    <ul class="slides-container">
        <?php
        $i = 0;

        if(have_rows('slides', 'option')){
            while(have_rows('slides', 'option')) : the_row();
                $image = get_sub_field('image');
                ?>
                <li class="slide <?php echo ($i == 0 ? 'slide-active' : ''); ?>" data-slide-index="<?php echo $i; ?>" style="background-image: url(<?php echo $image['url'] ?>)">
                    <div class="middle-wrap">
                        <div class="middle-wrap-inner animated fadeInUp">
                            <div class="title">
                                <h1><?php echo get_sub_field('title'); ?></h1>
                                <hr class="divider hide-mobile-480"/>
                            </div>
                            <div class="quote hide-mobile-480">
                                <?php echo get_sub_field('text'); ?>
                            </div>
                            <?php
                            if(get_sub_field('link_url')){
                                ?>
                                <a href="<?php echo get_sub_field('link_url'); ?>" class="button-white"><span class="txt"><?php echo get_sub_field('link_title'); ?></span><span class="bg"></span></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="overlay" style="opacity: <?php echo (get_sub_field('overlay_opacity') / 100 ); ?>"></div>
                </li>
                <?php
                $i++;
            endwhile;
        }
        ?>
    </ul>
    <?php
    if($i > 1){
        // Calculate the menu width
        $menu_width = ($i * 30) -10;
        ?>
        <div class="slides-menu">
            <ul style="width: <?php echo $menu_width; ?>px;">
                <?php
                /*
                |----------------------------------------------------------------
                |   Foreach slide render a dot.
                |----------------------------------------------------------------
                */
                for ($x = 0; $x <= ($i - 1); $x++) {
                    /*
                    |----------------------------------------------------------------
                    |   If $x == 0 render the active dot.
                    |----------------------------------------------------------------
                    */
                    if($x == 0){
                        echo '<li class="active-menu" data-slide-menu="'.$x.'"><i class="icon-circle"></i></li>';
                    }
                    else {
                        echo '<li data-slide-menu="'.$x.'"><i class="icon-circle-empty"></i></li>';
                    }
                }
                ?>
            </ul>
        </div>
    <?php
    }
    ?>
</div>

<div class="container intro-section">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h3><?php echo get_field('home_title'); ?></h3>
                <hr class="divider"/>
            </div>
            <?php echo get_field('home_text'); ?>
        </div>
    </div>
</div>

<div class="container-fluid call-to-action">
    <div class="row">
        <div class="col-md-12">
            <div class="call-to-action-inner">
                <h3><?php echo get_field('call_to_action_title'); ?></h3>
                <a href="<?php echo get_field('call_to_action_link'); ?>" class="button-white"><span class="txt"><?php echo get_field('call_to_action_link_name'); ?></span><span class="bg"></span></a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid portfolio-preview no-padding">
    <?php
    $args = array(
        'post_type'         => 'projecten',
        'posts_per_page'    => '2',
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

            <div class="portfolio-item col-md-6" style="background-image: url(<?php echo $image[0]; ?>);">
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

                                <div class="intro-menu-item site-link hide-mobile-480">
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
