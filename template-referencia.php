<?php
/**
 * Template Name: Referencia Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/listpage', 'header'); ?>
  </section>
  <main class="main" role="main">
    <section class="pagesection pagesection--darken">
      <div class="row">
        <div class="medium-8 medium-centered columns">
          <ul class="filterlist">
            <li><a href="#" class="active">Mutasd mindet</a></li>
            <li><a href="#">Fázisjavítás</a></li>
            <li><a href="#">Energetika</a></li>
            <li><a href="#">Kivitelezés</a></li>
          </ul>
        </div>
      </div>

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
  </main><!-- /.main -->
<?php endwhile; ?>
