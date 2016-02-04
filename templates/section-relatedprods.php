<?php if ( get_post_meta( get_the_ID(), 'related_products', true ) ) : ?>

  <?php
    $prodargs = array(
      'post_type' => array('termek'),
      'post__in' => get_post_meta( get_the_ID(), 'related_products', true ),
      'order' => 'ASC',
      'orderby' => 'date',
      'nopaging' => FALSE,
      'posts_per_page'  => 4
    );
    $the_relprods = new WP_Query( $prodargs );
  ?>



  <?php if ($the_relprods->post_count>0) : ?>

  <section class="pagesection pagesection--relatedprods">
    <div class="row">
      <div class="columns medium-10 columns medium-centered">
        <h2 class="pagesection__title termekblokk__title"><a href="<?= get_permalink(18) ?>">Kapcsolódó műszerek, berendezések</a></h2>
        <ul class="block-grid-1 small-block-grid-2 medium-block-grid-2 xlarge-block-grid-3 miniprodblock">
          <?php while ($the_relprods->have_posts()) : $the_relprods->the_post(); ?>
            <?php get_template_part('templates/mini', 'prod' ); ?>
          <?php endwhile; ?>
        </ul>
        <a class="pagesection__readmore" href="<?= get_permalink(18) ?>">Teljes termékkatalógus itt</a>
      </div>
    </div>
  </section>

  <?php wp_reset_query(); ?>

  <?php endif; ?>

<?php endif; ?>