<?php
/* Template Name: Home */

/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

get_header();
?>

<div id="slider-header" class="container-fluid" style="background-image: url(<?php echo get_stylesheet_directory_uri().'/assets/images/work_header.jpg'; ?>)">
    <div class="overlay">

        <div class="middle-wrap">
            <div class="middle-wrap-inner">
                <div class="title">
                    <h1>KWALITEITEN</h1>
                    <hr class="divider"/>
                </div>
                <div class="quote">
                    <p>"Embrace your differences and the qualities about you that you think are weird. <br/>Eventually, they're going to be the only things separating you from everyone else." <span class="quote-author">- Sebastian Stan</span></p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container intro-section">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h3>Welkom op mijn portfolio</h3>
                <hr class="divider"/>
            </div>
            <p>
                Dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend
                tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
            </p>
        </div>
    </div>
</div>

<div class="container-fluid call-to-action">
    <div class="row">
        <div class="col-md-12">
            <div class="call-to-action-inner">
                <h3>Bekijk al mijn werk</h3>
                <a href="#" class="button-white"><span class="txt">Naar portfolio</span><span class="bg"></span></a>
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
