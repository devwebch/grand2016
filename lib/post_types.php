<?php

/**
 * Register post types
 */
function grand_post_types() {

	/**
	 * NEW project post type
	 */
	$labels = array(
		'name'                  => _x( 'Projets', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Projet', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projets', 'text_domain' ),
		'name_admin_bar'        => __( 'Projet', 'text_domain' ),
		'archives'              => __( 'Archive de projets', 'text_domain' ),
		'parent_item_colon'     => __( 'Projet parent :', 'text_domain' ),
		'all_items'             => __( 'Tous les projets', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter nouveau projet', 'text_domain' ),
		'add_new'               => __( 'Ajouter', 'text_domain' ),
		'new_item'              => __( 'Nouveau projet', 'text_domain' ),
		'edit_item'             => __( 'Editer projet', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour projet', 'text_domain' ),
		'view_item'             => __( 'Voir projet', 'text_domain' ),
		'search_items'          => __( 'Rechercher projet', 'text_domain' ),
		'not_found'             => __( 'Aucun articles', 'text_domain' ),
		'not_found_in_trash'    => __( 'Aucun articles dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'projet',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'projet', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-interactive',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'gd_project', $args );

	/**
	 * OLD project post type
	 * UI is hidden, but posts are present
	 */
	$labels = array(
		'name'                  => _x( 'projets', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'projet', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projets (deprecated)', 'text_domain' ),
		'name_admin_bar'        => __( 'Projet (deprecated)', 'text_domain' ),
		'archives'              => __( 'Archive de projets', 'text_domain' ),
		'parent_item_colon'     => __( 'Projet parent :', 'text_domain' ),
		'all_items'             => __( 'Tous les projets', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter nouveau projet', 'text_domain' ),
		'add_new'               => __( 'Ajouter', 'text_domain' ),
		'new_item'              => __( 'Nouveau projet', 'text_domain' ),
		'edit_item'             => __( 'Editer projet', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour projet', 'text_domain' ),
		'view_item'             => __( 'Voir projet', 'text_domain' ),
		'search_items'          => __( 'Rechercher projet', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'projet', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => false,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'grand_post_types', 0 );