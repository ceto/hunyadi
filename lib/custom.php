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
        'id'            => 'test_metabox',
        'title'         => __( 'Test Metabox', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );


    $group_field_id = $cmb_page->add_field( array(
        'id'          => 'page_repeat_group',
        'type'        => 'group',
        'description' => __( 'Repeatable page section', 'cmb2' ),
        'options'     => array(
            'group_title'   => __( 'Section {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another section', 'cmb2' ),
            'remove_button' => __( 'Remove Section', 'cmb2' ),
            'sortable'      => true, // beta
        ),
    ) );

    $cmb_page->add_group_field( $group_field_id, array(
        'name' => 'Osztály',
        'id'   => 'class',
        'type' => 'text',
    ) );

    $cmb_page->add_group_field( $group_field_id, array(
        'name' => 'Tartalom',
        'description' => 'Szöveges tartalom',
        'id'   => 'content',
        'type' => 'wysiwyg',
    ) );


}