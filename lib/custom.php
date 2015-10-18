<?php

function hu_referencia_init() {
  $args = array(
    'public' => true,
    'label'  => 'Referencia',
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  );
  register_post_type( 'referencia', $args );
}
add_action( 'init', 'hu_referencia_init' );


function hu_termek_init() {
  $args = array(
    'public' => true,
    'label'  => 'Termék',
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  );
  register_post_type( 'termek', $args );
}
add_action( 'init', 'hu_termek_init' );


function hu_create_field_tax() {
  register_taxonomy(
    'field',
    array('termek','referencia'),
    array(
      'label' => 'Szakterület',
      'show_admin_column' => true,
      'rewrite' => array( 'slug' => 'szakterulet' ),
      'hierarchical' => true,
    )
  );
}
add_action( 'init', 'hu_create_field_tax' );

/***** Create list of references, posts and products  ******/
function hu_optionlist($post_type ) {
  $the_cucc = new WP_Query(array (
      'post_type' => $post_type,
      'posts_per_page' => -1,
    )
  );
  $reflist = array();
  while ($the_cucc->have_posts()) : $the_cucc->the_post();
    $reflist[get_the_ID()] = get_the_title();
  endwhile;
  return $reflist;
}



/**
 * Get the bootstrap!
 */
if ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) { require_once  __DIR__ . '/CMB2/init.php'; }

add_action( 'cmb2_admin_init', 'hu_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function hu_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_cmb_';

    /**
     * Initiate the metabox
     */
    $cmb_page = new_cmb2_box( array(
        'id'            => 'content_metabox',
        'title'         => __( 'Függőleges tartalmi sávok', 'cmb2' ),
        'object_types'  => array( 'page','referencia' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );


    $group_field_id = $cmb_page->add_field( array(
        'id'          => 'page_repeat_group',
        'type'        => 'group',
        'description' => __( 'Szerkeszthető oldalsávok', 'cmb2' ),
        'options'     => array(
            'group_title'   => __( 'Oldalsáv {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Új oldalsáv hozzáadása', 'cmb2' ),
            'remove_button' => __( 'Oldalsáv törlése', 'cmb2' ),
            'sortable'      => true, // beta
        ),
    ) );

    $cmb_page->add_group_field( $group_field_id, array(
        'name' => 'Szélesség',
        'id'   => 'width',
        'type' => 'radio_inline',
        'options'          => array(
          'normal' => __( 'Normál', 'cmb' ),
          'wide' => __( 'Széles', 'cmb' ),
        ),
    ) );

    $cmb_page->add_group_field( $group_field_id, array(
        'name' => 'Megjelenés',
        'id'   => 'colwidth',
        'type' => 'radio_inline',
        'options'          => array(
          'full' => __( 'Egy oszlopos', 'cmb' ),
          'half' => __( 'Két oszlopos', 'cmb' ),
        ),
    ) );


    $cmb_page->add_group_field( $group_field_id, array(
        'name' => 'Tartalom',
        'description' => 'Szöveges tartalom',
        'id'   => 'content',
        'type' => 'wysiwyg',
    ) );

    $cmb_page->add_group_field( $group_field_id, array(
        'name' => 'Tartalom 2',
        'description' => '2. oszlop szöveges tartalma',
        'id'   => 'content2',
        'type' => 'wysiwyg',
    ) );


    $cmb_related = new_cmb2_box( array(
        'id'            => 'related_metabox',
        'title'         => __( 'Kapcsolódó írások, termékek, referencia', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );


    $cmb_related->add_field( array(
        'id'          => 'related_posts',
        'name'         => __( 'Kapcsolódó írások', 'cmb2' ),
        'type'  => 'multicheck_inline',
        'options' => hu_optionlist('post')
    ) );

    $cmb_related->add_field( array(
        'id'          => 'related_references',
        'name'         => __( 'Kapcsolódó referenciák', 'cmb2' ),
        'type'  => 'multicheck_inline',
        'options' => hu_optionlist('referencia')
    ) );

    $cmb_related->add_field( array(
        'id'          => 'related_products',
        'name'         => __( 'Kapcsolódó termékek', 'cmb2' ),
        'type'  => 'multicheck_inline',
        'options' => hu_optionlist('termek')
    ) );



}