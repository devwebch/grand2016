<article <?php post_class(); ?>>
	<div class="entry__thumbnail">
		<?php the_post_thumbnail('post-thumbnail'); ?>
	</div>
	<header class="entry__header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part('templates/entry-meta'); ?>
	</header>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
