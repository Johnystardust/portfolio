<?php
/**
 * Created by:  Tim van der Slik
 * Project:     Portfolio
 * Website:     http://timvanderslik.nl
 */
?>
</div> <!-- Wrapper closing tag -->

<footer class="container-fluid">
    <div class="row">
        <?php dynamic_sidebar('footer'); ?>
    </div>
</footer>

<!-- Enqueue all the styles & scripts in the footer -->
<?php wp_footer(); ?>
</body>
</html>