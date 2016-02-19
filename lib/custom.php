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
    array('termek'),
    array(
      'label' => 'Termékkategória',
      'show_admin_column' => true,
      'rewrite' => array( 'slug' => 'terulet' ),
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
      'nopaging' => true
    )
  );
  $options = array();
  while ($the_cucc->have_posts()) : $the_cucc->the_post();
    $options[get_the_ID()] = get_the_title();
  endwhile;
  return $options;
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



    // Home page tiles
    $cmb_homepage = new_cmb2_box( array(
      'id'            => 'homecontent_metabox',
      'title'         => __( 'Nyitóldali elemek', 'cmb2' ),
      'object_types'  => array( 'page'), // Post type
      'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home.php' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      'closed'     => false, // Keep the metabox closed by default
    ) );


    $homegroup_field_id = $cmb_homepage->add_field( array(
      'id'          => 'homepage_repeat_group',
      'type'        => 'group',
      'description' => __( 'Csempék', 'cmb2' ),
      'options'     => array(
          'group_title'   => __( 'Csempe {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
          'add_button'    => __( 'Új csempe hozzáadása', 'cmb2' ),
          'remove_button' => __( 'Csempe törlése', 'cmb2' ),
          'sortable'      => true, // beta
      ),
    ) );

    $cmb_homepage->add_group_field( $homegroup_field_id, array(
      'id' => 'ht_title',
      'name' => 'Csempe címe',
      'type' => 'text_medium',
    ) );
    $cmb_homepage->add_group_field( $homegroup_field_id, array(
      'id' => 'ht_text',
      'name' => 'Csempe szövege',
      'type' => 'textarea_small',
    ) );
    $cmb_homepage->add_group_field( $homegroup_field_id, array(
      'id' => 'ht_url',
      'name' => 'Csempe linkje',
      'type' => 'text_url',
    ) );



    // Vertical content blocks on pages

    $cmb_page = new_cmb2_box( array(
      'id'            => 'content_metabox',
      'title'         => __( 'Függőleges tartalmi sávok', 'cmb2' ),
      'object_types'  => array( 'post', 'page','referencia', 'termek' ), // Post type
      'context'       => 'normal',
      'priority'      => 'core',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      'closed'     => true, // Keep the metabox closed by default
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



    /********* Termék oldali mezők ******/

    $cmb_product_side = new_cmb2_box( array(
      'id'            => 'product_sidemetabox',
      'title'         => __( 'Univerzális', 'cmb2' ),
      'object_types'  => array( 'termek' ), // Post type
      'context'       => 'side',
      'priority'      => 'high',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb_product_side->add_field( array(
      'name' => 'Thumbnail',
      'desc' => 'Kis négyzetes termék fotó fehér kifutóval (min.: 640x640)',
      'id' => 'prodthumb',
      'type'    => 'file',
      'options' => array(
          'url' => false, // Hide the text input for the url
          'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
      ),
    ) );

    $cmb_product = new_cmb2_box( array(
      'id'            => 'product_metabox',
      'title'         => __( 'Termékvariánsok', 'cmb2' ),
      'object_types'  => array( 'termek' ), // Post type
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
    ) );




    $product_group_field_id = $cmb_product->add_field( array(
      'id'          => 'product_repeat_group',
      'type'        => 'group',
      'description' => __( 'Termékvariánsok', 'cmb2' ),
      'options'     => array(
          'group_title'   => __( 'Termékvariáns {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
          'add_button'    => __( 'Új termékvariáns hozzáadása', 'cmb2' ),
          'remove_button' => __( 'Termékvariáns törlése', 'cmb2' ),
          'sortable'      => true, // beta
      ),
    ) );

    $cmb_product->add_group_field( $product_group_field_id, array(
      'name' => 'Termék neve',
      'id'   => 'name',
      'type' => 'text',
    ) );
    $cmb_product->add_group_field( $product_group_field_id, array(
      'name' => 'Mi ez?',
      'id'   => 'subtitle',
      'type' => 'text',
    ) );

    $cmb_product->add_group_field( $product_group_field_id, array(
      'name' => 'Leírás',
      'description' => 'A termékvariáns szöveges leírása',
      'id'   => 'description',
      'type' => 'wysiwyg',
      'options' => array(
        'textarea_rows' => '7',
      )
    ) );

    $cmb_product->add_group_field( $product_group_field_id, array(
      'name' => 'Termékfotó',
      'id'   => 'prodphoto',
      'type' => 'file',
    ) );

    $cmb_product->add_group_field( $product_group_field_id, array(
      'name' => 'Részletek',
      'description' => 'A termékvariáns részleteinek leírása',
      'id'   => 'details',
      'type' => 'wysiwyg',
      'options' => array(
        'textarea_rows' => '10',
      )
    ) );

    $cmb_product->add_group_field( $product_group_field_id, array(
      'name' => 'Termék paraméterek',
      'description' => 'Bekezdésenként egy paraméter pár az alábbi formában: <strong>Paraméter neve|Paraméter értéke</strong>',
      'id'   => 'params',
      'type' => 'wysiwyg',
      'options' => array(
        'textarea_rows' => '7',
      )
    ) );

    $cmb_product->add_group_field( $product_group_field_id, array(
        'name' => 'Csatolt fájlok letöltésre',
        'description' => 'Válassz a médiatárból',
        'id'   => 'dlfiles',
        'type' => 'file_list',
        'options' => array(
        //   'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
        //   'remove_image_text' => 'Replacement', // default: "Remove Image"
        //   'file_text' => 'Replacement', // default: "File:"
        //   'file_download_text' => 'Replacement', // default: "Download"
        //   'remove_text' => 'Replacement', // default: "Remove"
        ),
    ) );


    /******* Referencia details grid *********/

    $cmb_referencia = new_cmb2_box( array(
      'id'            => 'referencia_metabox',
      'title'         => __( 'Műszaki paraméterek, részletek', 'cmb2' ),
      'object_types'  => array( 'referencia' ), // Post type
      'context'       => 'normal',
      'priority'      => 'low',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $referencia_group_field_id = $cmb_referencia->add_field( array(
      'id'          => 'referencia_repeat_group',
      'type'        => 'group',
      'description' => __( 'Technikai részletek', 'cmb2' ),
      'options'     => array(
          'group_title'   => __( 'Részlet {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
          'add_button'    => __( 'Új részlet hozzáadása', 'cmb2' ),
          'remove_button' => __( 'Részlet törlése', 'cmb2' ),
          'sortable'      => true, // beta
      ),
    ) );

    $cmb_referencia->add_group_field( $referencia_group_field_id, array(
      'name' => 'Technikai információ',
      'description' => 'Néhány paraméter H3 headinggel kezdve',
      'id'   => 'datagrid',
      'type' => 'wysiwyg',
      'options' => array(
        'textarea_rows' => '7',
      )
    ) );



    /******* Related Items ******/
    $cmb_related = new_cmb2_box( array(
      'id'            => 'related_metabox',
      'title'         => __( 'Kapcsolódó írások, termékek, referencia', 'cmb2' ),
      'object_types'  => array( 'page', 'termek', 'post' ), // Post type
      'context'       => 'normal',
      'priority'      => 'low',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb_related->add_field( array(
      'id' => 'related_posts',
      'name' => __( 'Kapcsolódó írások', 'cmb2' ),
      'type'  => 'multicheck_inline',
      'select_all_button' => false,
      'options' => hu_optionlist('post')
    ) );

    $cmb_related->add_field( array(
      'id' => 'related_references',
      'name' => __( 'Kapcsolódó referenciák', 'cmb2' ),
      'type' => 'multicheck_inline',
      'select_all_button' => false,
      'options' => hu_optionlist('referencia')
    ) );

    $cmb_related->add_field( array(
      'id'          => 'related_products',
      'name'         => __( 'Kapcsolódó termékek', 'cmb2' ),
      'type'  => 'multicheck_inline',
      'select_all_button' => false,
      'options' => hu_optionlist('termek')
    ) );


    /***** Page related on Posts and reference ******/
    $cmb_prelated = new_cmb2_box( array(
      'id'            => 'prelated_metabox',
      'title'         => __( 'Kapcsolódó szolgáltatás ajánló', 'cmb2' ),
      'object_types'  => array( 'referencia', 'post' ), // Post type
      'context'       => 'normal',
      'priority'      => 'low',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb_prelated->add_field( array(
      'id' => 'related_pages',
      'name' => __( 'Kapcsolódó szolgáltatás', 'cmb2' ),
      'type'  => 'multicheck_inline',
      'select_all_button' => false,
      'options' => hu_optionlist('page')
    ) );


}


function adatlaposit($content) {
  $newhtml = str_replace('<p>', '<dt>', apply_filters( 'the_content', $content));
  $newhtml= str_replace('</p>', '</dd>', $newhtml);
  $newhtml= str_replace('|', '</dt><dd>', $newhtml);
  return '<dl>'.$newhtml.'</dl>';

}




/****** Custom Gallery View for VCDS *****/
remove_shortcode( 'gallery' );
add_shortcode('gallery', 'hu_gallery_shortcode');
/**
 * Builds the Gallery shortcode output.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @staticvar int $instance
 *
 * @param array $attr {
 *     Attributes of the gallery shortcode.
 *
 *     @type string       $order      Order of the images in the gallery. Default 'ASC'. Accepts 'ASC', 'DESC'.
 *     @type string       $orderby    The field to use when ordering the images. Default 'menu_order ID'.
 *                                    Accepts any valid SQL ORDERBY statement.
 *     @type int          $id         Post ID.
 *     @type string       $itemtag    HTML tag to use for each image in the gallery.
 *                                    Default 'dl', or 'figure' when the theme registers HTML5 gallery support.
 *     @type string       $icontag    HTML tag to use for each image's icon.
 *                                    Default 'dt', or 'div' when the theme registers HTML5 gallery support.
 *     @type string       $captiontag HTML tag to use for each image's caption.
 *                                    Default 'dd', or 'figcaption' when the theme registers HTML5 gallery support.
 *     @type int          $columns    Number of columns of images to display. Default 3.
 *     @type string|array $size       Size of the images to display. Accepts any valid image size, or an array of width
 *                                    and height values in pixels (in that order). Default 'thumbnail'.
 *     @type string       $ids        A comma-separated list of IDs of attachments to display. Default empty.
 *     @type string       $include    A comma-separated list of IDs of attachments to include. Default empty.
 *     @type string       $exclude    A comma-separated list of IDs of attachments to exclude. Default empty.
 *     @type string       $link       What to link each image to. Default empty (links to the attachment page).
 *                                    Accepts 'file', 'none'.
 * }
 * @return string HTML content to display gallery.
 */
function hu_gallery_shortcode( $attr ) {
  $post = get_post();
  static $instance = 0;
  $instance++;
  if ( ! empty( $attr['ids'] ) ) {
    // 'ids' is explicitly ordered, unless you specify otherwise.
    if ( empty( $attr['orderby'] ) ) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }
  /**
   * Filter the default gallery shortcode output.
   *
   * If the filtered output isn't empty, it will be used instead of generating
   * the default gallery template.
   *
   * @since 2.5.0
   * @since 4.2.0 The `$instance` parameter was added.
   *
   * @see gallery_shortcode()
   *
   * @param string $output   The gallery output. Default empty.
   * @param array  $attr     Attributes of the gallery shortcode.
   * @param int    $instance Unique numeric ID of this gallery shortcode instance.
   */
  $output = apply_filters( 'post_gallery', '', $attr, $instance );
  if ( $output != '' ) {
    return $output;
  }
  $html5 = current_theme_supports( 'html5', 'gallery' );
  $atts = shortcode_atts( array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post ? $post->ID : 0,
    'itemtag'    => $html5 ? 'figure'     : 'dl',
    'icontag'    => $html5 ? 'div'        : 'dt',
    'captiontag' => $html5 ? 'figcaption' : 'dd',
    'columns'    => 5,
    'size'       => 'medium11',
    'include'    => '',
    'exclude'    => '',
    'link'       => 'file'
  ), $attr, 'gallery' );
  $id = intval( $atts['id'] );
  if ( ! empty( $atts['include'] ) ) {
    $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif ( ! empty( $atts['exclude'] ) ) {
    $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
  } else {
    $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
  }
  if ( empty( $attachments ) ) {
    return '';
  }
  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment ) {
      $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
    }
    return $output;
  }
  $itemtag = tag_escape( $atts['itemtag'] );
  $captiontag = tag_escape( $atts['captiontag'] );
  $icontag = tag_escape( $atts['icontag'] );
  $valid_tags = wp_kses_allowed_html( 'post' );
  if ( ! isset( $valid_tags[ $itemtag ] ) ) {
    $itemtag = 'dl';
  }
  if ( ! isset( $valid_tags[ $captiontag ] ) ) {
    $captiontag = 'dd';
  }
  if ( ! isset( $valid_tags[ $icontag ] ) ) {
    $icontag = 'dt';
  }
  $columns = intval( $atts['columns'] );
  $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
  $float = is_rtl() ? 'right' : 'left';
  $selector = "gallery-{$instance}";
  $gallery_style = '';
  /**
   * Filter whether to print default gallery styles.
   *
   * @since 3.1.0
   *
   * @param bool $print Whether to print default gallery styles.
   *                    Defaults to false if the theme supports HTML5 galleries.
   *                    Otherwise, defaults to true.
   */
  if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
    $gallery_style = "
    <style type='text/css'>
      #{$selector} {
        margin: auto;
      }
      #{$selector} .gallery-item {
        float: {$float};
        margin-top: 10px;
        text-align: center;
        width: {$itemwidth}%;
      }
      #{$selector} img {
        border: 2px solid #cfcfcf;
      }
      #{$selector} .gallery-caption {
        margin-left: 0;
      }
      /* see gallery_shortcode() in wp-includes/media.php */
    </style>\n\t\t";
  }
  $size_class = sanitize_html_class( $atts['size'] );
  $gallery_div = "<ul id='$selector' class='gallery galleryid-{$id} small-block-grid-2 medium-block-grid-2 large-block-grid-{$columns} xlarge-block-grid-".($columns+1)." xxlarge-block-grid-".($columns+2)." gallery-size-{$size_class}'>";
  /**
   * Filter the default gallery shortcode CSS styles.
   *
   * @since 2.5.0
   *
   * @param string $gallery_style Default CSS styles and opening HTML div container
   *                              for the gallery shortcode output.
   */
  $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );
  $i = 0;
  foreach ( $attachments as $id => $attachment ) {
    $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
    if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
      $image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
    } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
      $image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
    } else {
      $image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
    }
    $image_meta  = wp_get_attachment_metadata( $id );
    $orientation = '';
    if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
      $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
    }
    $output .= "<li><{$itemtag} class='gallery__item'>";
    $output .= "
      <{$icontag} class='gallery-icon {$orientation}'>
        $image_output
      </{$icontag}>";
    if ( $captiontag && trim($attachment->post_excerpt) ) {
      $output .= "
        <{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
        " . wptexturize($attachment->post_excerpt) . "
        </{$captiontag}>";
    }
    $output .= "</{$itemtag}></li>";
    if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
      $output .= '<br style="clear: both" />';
    }
  }
  if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
    $output .= "
      <br style='clear: both' />";
  }
  $output .= "
    </ul>\n";
  return $output;
}

