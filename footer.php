<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 */
?>


	</div><?php //END #content ?>

<?php get_template_part( 'parts/widgetarea', 'footer' ); ?>  

<?php get_template_part( 'parts/colofon'); ?>  


	<p id="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>


<?php wp_footer(); ?>

</div> <!-- /#page -->

</body>
</html>