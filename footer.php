<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/27/2016
 * Time: 1:43 PM
 */
?>
</div> <!-- Wrapper closing tag -->

<footer class="">

    <div class="footer-col">
        <h3>Tim van der Slik</h3>
        <p>
            Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
            porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
        </p>
    </div>

    <?php dynamic_sidebar('footer'); ?>

</footer>

<!-- Enqueue all the styles & scripts in the footer -->
<?php wp_footer(); ?>
</body>
</html>