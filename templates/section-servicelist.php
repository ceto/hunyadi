<?php if ( get_post_meta( get_the_ID(), 'related_pages', true ) ) : ?>

  <?php
    $postargs = array(
      'post_type' => array('page'),
      'post__in' => get_post_meta( get_the_ID(), 'related_pages', true ),
      'order' => 'DESC',
      'orderby' => 'date',
      'nopaging' => FALSE,
      'posts_per_page'  => 3,
    );
    $the_relpages = new WP_Query( $postargs );
  ?>

  <?php if ($the_relpages->post_count>0) : ?>


    <aside class="pagesection pagesection--details pagesection--inverse">
      <div class="row">
        <div class="columns medium-8 columns medium-centered">
        <h2 class="pagesection__title">Tájékozódjon szolgáltatásainkról</h2>
        <ul class="subpageslist">
          <?php while ($the_relpages->have_posts()) : $the_relpages->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <i class="ion ion-ios-arrow-thin-right"></i></a></li>
          <?php endwhile; ?>
        </ul>
        </div>
      </div>
    </aside>


    <?php wp_reset_query(); ?>
  <?php endif; ?>
<?php endif; ?>