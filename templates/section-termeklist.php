<?php
  $args = array(
    'post_type' => array('termek'),
    'order'               => 'ASC',
    'orderby'             => 'date',
    'posts_per_page'         => 1000
  );
  $the_relprods = new WP_Query( $args );
?>

<aside class="pagesection pagesection--termekek">
  <div class="row">
    <div class="columns medium-10 columns medium-centered">
    <h2>Kapcsolódó termékek</h2>
      <ul class="block-grid-1 small-block-grid-2 medium-block-grid-3">
        <?php while ($the_relprods->have_posts()) : $the_relprods->the_post(); ?>
          <li><?php get_template_part( 'templates/termek', 'square' ); ?></li>
        <?php endwhile; ?>
      </ul>
      <a href="<?= get_permalink(18) ?>" class="button">Teljes termékkatalógus itt</a>
    </div>
  </div>
</aside>