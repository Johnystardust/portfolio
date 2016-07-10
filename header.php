<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <title>Tim van der Slik | <?php echo get_the_title(); ?></title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,800,800italic,700' rel='stylesheet' type='text/css'>

    <!-- Enqueue all the styles & scripts in the head -->
    <?php wp_head(); ?>
</head>

<body>

    <div id="go-to-top" class="animated">
        <i class="icon-up-open"></i>
    </div>

    <div class="main-menu container-fluid">
        <div class="menu-icon-wrapper">
            <div class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <?php
        $args = array(
            'theme_location'  => 'main-menu',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'menu-container',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '<span class="bg"></span>',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        );

        wp_nav_menu($args);
        ?>

        <div class="menu-social">
            <ul>
                <li><a href="#"><i class="icon-facebook"></i></a><span class="bg"></span></li>
                <li><a href="#"><i class="icon-linkedin"></i></a><span class="bg"></span></li>
            </ul>
        </div>
    </div>