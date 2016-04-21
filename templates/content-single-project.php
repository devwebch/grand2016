<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content">
			<?php
			$img_banner 	= wp_get_attachment_image( get_field('mybandeau'), 'bandeau');
			$img_list		= get_field('images');
			?>
			
			<div class="row">
				<div class="col-md-12">
					<?php echo $img_banner; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-8">
					<?php the_content(); ?>
					
					<ul class="project__images">
					<?php foreach( $img_list as $item ): ?>	
						<?php
							$src = wp_get_attachment_image_src( $item, 'miniature');
							echo '<li><img src="' . $src[0] . '" width="150" height="150"></li>';
						?>
					<?php endforeach; ?>
					</ul>
				</div>
				<div class="col-md-4">
					<h3>Infos projet</h3>
					<?php
									// store fields
				$project_fields = array(
					array('Client', 					'project_client'),
//					array('Agence', 					'project_agency'),
//					array('Direction créative', 		'project_creative_management'),
//					array('Direction artistique', 		'project_artistic_management'),
//					array('Conception / Rédaction', 	'project_conception'),
//					array('Graphisme / Design', 		'project_graphic_design'),
//					array('Infographie', 				'project_infography'),
//					array('Illustration', 				'project_illustration'),
//					array('Photographie', 				'project_photography'),
//					array('Gestion de projet', 			'project_project_management'),
//					array('Réalisation', 				'project_realisation'),
//					array('Chef opérateur', 			'project_operation_manager'),
//					array('Son', 						'project_sound'),
//					array('Post-production', 			'project_post_production'),
//					array('Production', 				'project_production'),
				);
				
				// display fields
				foreach ( $project_fields as $field ) {
					
					$key	= 'project_meta_' . $field[1];
					$value	= get_field($key);
					$title	= $field[0];
					
					if ( !empty($value) ) {
						echo '<h4>' . $title . '</h4>';
						echo '<p>' . $value . '</p>';						
					}
				}
	
					?>
				</div>
			</div>
						
		</div>
	</article>
<?php endwhile; ?>
