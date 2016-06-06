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

    <title>Portfolio | Tim van der Slik</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,800,800italic,700' rel='stylesheet' type='text/css'>

    <!-- Enqueue all the styles & scripts in the head -->
    <?php wp_head(); ?>
</head>

<body>

<div class="wrapper">

    <div id="go-to-top" class="animated">
        <i class="icon-up-open"></i>
    </div>

    <div id="menu-container">
        <div class="menu-icon-wrapper">
            <div class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="main-menu">
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
        </div>

    </div>