<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  //return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
  return '';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * WooCommerce
 */
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

add_action( 'woocommerce_order_status_completed', __NAMESPACE__ . '\\grand_wc_order_status_completed' );
function grand_wc_order_status_completed( $order_ID )
{
  // create order from ID
  $order        = new \WC_Order($order_ID);
  $order_items  = $order->get_items();

  // new post datas
  $new_post = [
    'post_title'      => 'Untitled project',
    'post_content'    => 'Default content',
    'post_status'     => 'draft',
    'post_type'       => 'gd_project'
  ];

  // prepare to store sanitized metas
  $metas = [];
  
  // loop through order items
  foreach ( $order_items as $item ) {
    // get item metas
    $item_metas = $item['item_meta_array'];

    // loop through item metas
    foreach ( $item_metas as $meta ) {
      $meta_ID      = strtolower(filter_var($meta->key, FILTER_SANITIZE_URL)); // sanitized ID
      $meta_value   = $meta->value; // meta value

      // if the meta doesn't start with an underscore it's one of ours
      if ( substr($meta_ID, 0, 1) != '_' ) {

        // store sanitized metas
        $metas[] = [
          'ID'    => $meta_ID,
          'value' => $meta_value
        ];

        // set post title
        if ( $meta_ID == 'nomduprojet' ) {
          $new_post['post_title'] = $meta_value;
        }
        // set post content
        elseif ( $meta_ID == 'descriptionduprojet' ) {
          $new_post['post_content'] = $meta_value;
        }
      }
    }
  }

  // insert post and get post ID
  $post_ID = wp_insert_post( $new_post );

  // assign metas to ACF
  if ( $post_ID ) {
    foreach ( $metas as $meta ) {
      // if the post was inserted
      switch ( $meta['ID'] ) {
        case 'agence':
          update_field( 'field_572ef135131c4', $meta['value'], $post_ID ); // gd_agency
          break;
        case 'client':
          update_field( 'field_572ef177131c5', $meta['value'], $post_ID ); // gd_client
          break;
        case 'miniature':
          update_field( 'field_572ee7cccfa22', $meta['value'], $post_ID ); // gd_thumbnail
          break;
        case 'bandeauduprojet':
          update_field( 'field_572ee7eecfa23', $meta['value'], $post_ID ); // gd_header
          break;
        case 'image1':
          update_field( 'field_572ee7ffcfa24', $meta['value'], $post_ID ); // gd_image_1
          break;
      }
    }
  }
}

/**
 * @param $identifier
 * @return string
 */
function grand_acf_epo_mapper( $identifier ) {

  $acf_field_ID   = '';

  switch ($identifier) {
    case 'nomduprojet':
          $acf_field_ID = 'gd_field_ID';
          break;
  }

  return $acf_field_ID;
}
