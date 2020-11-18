<?php get_header(); ?>

	<main id="primary" class="site-main">
    <div class="posts">
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
            ?>
                <hr>
                <div class="clean"></div>

            <?php
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
    </div>

	</main><!-- #main -->
<?php get_sidebar();?>
    <div class="delimer"></div>
<?php
get_footer();
