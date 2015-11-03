<?php if ( get_post_meta( get_the_ID(), 'related_posts', true ) ) : ?>

  <?php
    $postargs = array(
      'post_type' => array('post'),
      'post__in' => get_post_meta( get_the_ID(), 'related_posts', true ),
      'order' => 'DESC',
      'orderby' => 'date',
      'posts_per_page'  => 2,
    );
    $the_relposts = new WP_Query( $postargs );
  ?>

  <?php if ($the_relposts->post_count>0) : ?>
    <section class="pagesection pagesection--posts">
      <div class="row">
        <div class="columns medium-10 columns medium-centered">
          <h2>Kapcsolódó írások a tudástárból</h2>

          <?php while ($the_relposts->have_posts()) : $the_relposts->the_post(); ?>
            <div class="columns medium-6">
              <?php get_template_part( 'templates/post', 'square' ); ?>
            </div>
          <?php endwhile; ?>

          <div class="row">
            <div class="columns"><a href="<?= get_permalink(18) ?>">További írások a tudástárban</a></div>
          </div>

        </div>
      </div>
    </section>
    <?php wp_reset_query(); ?>
  <?php endif; ?>
<?php endif; ?>