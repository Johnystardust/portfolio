<?php
/* Template Name: Skills */

/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */

get_header();
?>

<div id="skills-container">
    <div class="page-header">

        <div class="overlay">

            <div class="middle-wrap">
                <div class="middle-wrap-inner">
                    <div class="title">
                        <h1>KWALITEITEN</h1>
                        <hr/>
                    </div>
                    <div class="quote">
                        <p>"Embrace your differences and the qualities about you that you think are weird. <br/>Eventually, they're going to be the only things separating you from everyone else." <span class="quote-author">- Sebastian Stan</span></p>

                    </div>
                </div>
            </div>

        </div>

        <img src="<?php echo get_stylesheet_directory_uri().'/assets/images/work_header.jpg'; ?>" alt=""/>
    </div>

    <div class="intro-section">
        <p>
            Dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
            Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
            rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend
            tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
            laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
        </p>
    </div>


    <div class="skills-section">

        <div id="skill-wordpress" class="skill" data-completion="75%">
            <h2 class="title">Wordpress</h2>

            <div class="skill-rail">
                <div class="fill">
                    <div class="icon">
                        <i class="icon-wordpress"></i>
                    </div>
                </div>
            </div>
        </div>

        <div id="skill-git" class="skill" data-completion="45%">
            <h2 class="title">GIT</h2>

            <div class="skill-rail">
                <div class="fill">
                    <div class="icon">
                        <i class="icon-git"></i>
                    </div>
                </div>
            </div>
        </div>

        <div id="skill-php" class="skill" data-completion="68%">
            <h2 class="title">PHP</h2>

            <div class="skill-rail">
                <div class="fill">
                    <div class="icon">
                        <i class="icon-html5"></i>
                    </div>
                </div>
            </div>
        </div>

        <div id="skill-html" class="skill" data-completion="75%">
            <h2 class="title">HTML 5</h2>

            <div class="skill-rail">
                <div class="fill">
                    <div class="icon">
                        <i class="icon-html5"></i>
                    </div>
                </div>
            </div>
        </div>

        <div id="skill-css" class="skill" data-completion="79%">
            <h2 class="title">CSS 3</h2>

            <div class="skill-rail">
                <div class="fill">
                    <div class="icon">
                        <i class="icon-css3"></i>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>

<?php get_footer(); ?>
