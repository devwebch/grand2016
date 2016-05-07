<?php get_template_part('templates/page', 'header'); ?>

<div class="row">
	<div class="col-md-8">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
	<div class="col-md-4">
		<?php the_content(); ?>
	</div>
</div>
