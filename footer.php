<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */
?>

<footer class="container-fluid">
    <div class="row footer-top">
        <div class="footer-column col-md-3 col-sm-6">
            <h4 class="title">Tim van der Slik</h4>
            <div class="textwidget">
                Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
                <br/><br/>
                <span><i class="icon-phone"></i>06 25 549 538</span><br/>
                <span><i class="icon-mail"></i><a href="mailto:info@timvanderslik.nl">info@timvanderslik.nk</a></span><br/>
                <span><i class="icon-home"></i>Broerenstraat 39-35</span>
            </div>
        </div>
        <?php dynamic_sidebar('footer'); ?>
    </div>
    <div class="row footer-bottom">
        <div class="col-md-12">
            <span><i class="icon-copyright"></i>2016 - <span class="credits">Design & Development by Tim van der Slik</span></span>
        </div>
    </div>
</footer>

<!-- Enqueue all the styles & scripts in the footer -->
<?php wp_footer(); ?>
</body>
</html>