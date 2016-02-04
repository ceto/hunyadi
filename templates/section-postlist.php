<?php if ( get_post_meta( get_the_ID(), 'related_posts', true ) ) : ?>

  <?php
    $postargs = array(
      'post_type' => array('post'),
      'post__in' => get_post_meta( get_the_ID(), 'related_posts', true ),
      'order' => 'DESC',
      'orderby' => 'date',
      'nopaging' => FALSE,
      'posts_per_page'  => 3,
    );
    $the_relposts = new WP_Query( $postargs );
  ?>

  <?php if ($the_relposts->post_count>0) : ?>
    <aside class="pagesection pagesection--posts">
      <div class="row">
        <div class="columns medium-10 medium-centered">
          <h2>Kapcsolódó írások a tudástárból</h2>
          <ul class="block-grid-1 small-block-grid-2 medium-block-grid-3">
          <?php while ($the_relposts->have_posts()) : $the_relposts->the_post(); ?>
            <li><?php get_template_part( 'templates/post', 'square' ); ?></li>
          <?php endwhile; ?>
          </ul>

          <div class="row">
            <div class="columns"><a class="pagesection__readmore" href="<?= get_permalink(39) ?>">További írások a tudástárban</a></div>
          </div>

        </div>
      </div>
    </aside>
    <?php wp_reset_query(); ?>
  <?php endif; ?>
<?php endif; ?>