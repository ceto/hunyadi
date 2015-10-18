<?php
  $args = array(
    'post_type' => array('post'),
    'order'               => 'DESC',
    'orderby'             => 'date',
    'posts_per_page'         => 2
  );
  $the_relposts = new WP_Query( $args );
?>
<section class="pagesection pagesection--posts">
  <div class="row">
    <div class="columns medium-10 columns medium-centered">
    <h2>Kapcsolódó írások a tudástárból</h2>
    <div class="row">
      <?php while ($the_relposts->have_posts()) : $the_relposts->the_post(); ?>
        <div class="columns medium-6">
          <?php get_template_part( 'templates/post', 'square' ); ?>
        </div>
      <?php endwhile; ?>
      <div class="columns"><a href="<?= get_permalink(18) ?>">További írások a tudástárban</a></div>
    </row>

  </div>
</div>
</section>