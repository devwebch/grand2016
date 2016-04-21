<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
	<nav class="nav-footer">
	<?php
		if (has_nav_menu('footer_navigation')) :
			wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']);
		endif;
	?>
	</nav>

  </div>
</footer>
