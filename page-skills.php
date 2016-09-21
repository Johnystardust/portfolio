<?php
/* Template Name: Skills */

/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

get_header();

$headerImage = get_field('header_image');
?>
<div id="page-header" class="container-fluid" style="background-image: url(<?php echo $headerImage['url']; ?>)">
    <div class="overlay">
        <div class="middle-wrap">
            <div class="middle-wrap-inner">
                <div class="title">
                    <h1><?php echo get_field('header_title'); ?></h1>
                    <hr class="divider hide-mobile-480"/>
                </div>
                <div class="quote hide-mobile-480">
                    <?php echo get_field('header_text'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container intro-section">
    <div class="row">
        <div class="col-md-12">
            <div class="photo" style="background-image: url(<?php echo get_stylesheet_directory_uri().'/assets/images/IMG_0006.JPG'; ?>)"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text">
            <div class="title">
                <h3><?php echo get_field('skills_title'); ?></h3>
                <hr class="divider"/>
            </div>
            <?php echo get_field('skills_text'); ?>
        </div>
    </div>
</div>

<div class="skills-section container">
    <?php
    if(have_rows('skills')){
        $i = 1;

        while(have_rows('skills')) : the_row();
        ?>
        <div id="skill-<?php echo $i ?>" class="skill" data-completion="<?php echo get_sub_field('completion'); ?>%">
            <div class="skill-rail">
                <div class="fill">
                    <div class="icon">
                        <i class="<?php echo get_sub_field('icon'); ?>"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $i++;
        endwhile;
    }
    ?>
</div>


<div id="facts" class="container-fluid">
    <div class="row">
        <?php
        foreach(get_field('facts') as $fact){
            ?>
            <div class="col-md-4 fact lines">
                <h2 class="timer" data-from="0" data-to="<?php echo $fact['number']; ?>">0</h2>
                <hr/>
                <h4><?php echo $fact['text']; ?></h4>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
