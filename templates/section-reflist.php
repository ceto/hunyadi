<?php
  $args = array(
    'post_type' => array('referencia'),
    'order'               => 'ASC',
    'orderby'             => 'date',
    'posts_per_page'         => 1000
  );
  $the_relrefs = new WP_Query( $args );
?>
<section class="pagesection pagesection--darken pagesection--refs">
  <div class="row">
    <div class="columns medium-10 columns medium-centered">
    <h2>Referencia</h2>
      <ul class="small-block-grid-2 medium-block-grid-3">
        <?php while ($the_relrefs->have_posts()) : $the_relrefs->the_post(); ?>
        <li><?php get_template_part( 'templates/referencia', 'square' ); ?></li>
        <?php endwhile; ?>
      </ul>
      <a href="<?= get_permalink(19) ?>" class="button">Teljes referencialista itt</a>
    </div>
  </div>
</section>