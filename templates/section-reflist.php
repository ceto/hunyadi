<?php if ( get_post_meta( get_the_ID(), 'related_references', true ) ) : ?>

  <?php
    $relargs = array(
      'post_type' => array('referencia'),
      'post__in' => get_post_meta( get_the_ID(), 'related_references', true ),
      'order' => 'DESC',
      'orderby' => 'date',
      'posts_per_page'  => 3
    );
    $the_relrefs = new WP_Query( $relargs );
  ?>

  <?php if ($the_relrefs->post_count>0) : ?>
    <section class="pagesection pagesection--refs">
      <div class="row">
        <div class="columns medium-10 columns medium-centered">
        <h2>Kapcsolódó munkáink</h2>
          <ul class="small-block-grid-2 medium-block-grid-3">
            <?php while ($the_relrefs->have_posts()) : $the_relrefs->the_post(); ?>
            <li><?php get_template_part( 'templates/referencia', 'square' ); ?></li>
            <?php endwhile; ?>
          </ul>
          <a href="<?= get_permalink(19) ?>" class="button">Teljes referencialista itt</a>
        </div>
      </div>
    </section>
    <?php wp_reset_query(); ?>
  <?php endif; ?>

<?php endif; ?>