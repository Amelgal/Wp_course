<?php get_header(); ?>

    <main id="primary_page" class="site-main">
        <div class="posts">
            <?php
            do_shortcode('[slider numberposts = 3 post_type = swim]');
            ?>
        </div>

    </main><!-- #main -->
    <div class="delimer"></div>
<?php get_footer(); ?>

<?php
//
//		if ( have_posts() ) :
//			while ( have_posts() ) :
//				the_post();
//				get_template_part( 'template-parts/content', get_post_type() );
//            ?>
    <!--                <hr>-->
    <!--                <div class="clean"></div>-->
<?php //			endwhile;
//		else :
//			get_template_part( 'template-parts/content', 'none' );
//		endif;
//