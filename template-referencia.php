<?php
/**
 * Template Name: Referencia Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/banner','bg' ); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/listpage', 'header'); ?>
  </section>
  <main class="main" role="main">

    <section class="pagesection pagesection--intro">
      <div class="row">
        <div class="columns medium-8 columns medium-centered">
          <?php the_content(); ?>
          <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </div>
      </div>
    </section>
    <section class="pagesection pagesection--darken">
      <?php
        $args = array(
          'post_type' => array('referencia'),
          'order'               => 'ASC',
          'orderby'             => 'date',
          'posts_per_page'         => 1000,
          'posts_per_archive_page' => 10,
        );
        $the_refs = new WP_Query( $args );
      ?>
      <div class="row">
        <div class="columns medium-10 columns medium-centered">
          <ul class="small-block-grid-2 medium-block-grid-3 large-block-block-4 referenciagrid">
            <?php while ($the_refs->have_posts()) : $the_refs->the_post(); ?>
              <li><?php get_template_part( 'templates/referencia', 'square' ); ?></li>
            <?php endwhile ?>
          </ul>
        </div>
      </div>
    </section>
    <?php wp_reset_query(); ?>
    <?php get_template_part('templates/page', 'sections' ); ?>



  </main><!-- /.main -->
<?php endwhile; ?>
