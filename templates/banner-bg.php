<?php if (has_post_thumbnail()) : ?>
<?php
  $ima =  get_post_thumbnail_id();
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