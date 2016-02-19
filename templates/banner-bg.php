  <?php
    $ok=false;
    if ( (is_archive() || is_search() || is_home()) && ( !is_tax() )  ) {
      $ima =  get_post_thumbnail_id(get_option( 'page_for_posts' ));$ok=true;
    } elseif (is_page_template('template-termekek.php') || is_tax('field') ) {
      $ima =  get_post_thumbnail_id(18); $ok=true;
    } elseif (is_page_template('template-referencia.php') ) {
      $ima =  get_post_thumbnail_id(19); $ok=true;
    } elseif (has_post_thumbnail()) {
        $ima =  get_post_thumbnail_id(); $ok=true;
    };

  ?>

<?php if ($ok) : ?>
  <?php
    $imci_s = wp_get_attachment_image_src( $ima, 'banner_small');
    $imci_m = wp_get_attachment_image_src( $ima, 'banner_medium');
    $imci = wp_get_attachment_image_src( $ima, 'banner');
  ?>
  <style>
    .banner {
      background-image: url('<?= $imci_s['0']; ?>');
    }
    @media only screen and (min-width: 768px) {
      .banner {
        background-image:url('<?= $imci_m['0']; ?>');
      }
    }
    @media only screen and (min-width: 1280px) {
      .banner {
        background-image:url('<?= $imci['0']; ?>');
      }
    }
  </style>
<?php endif; ?>