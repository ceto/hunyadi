<?php
/**
 * Template Name: Termekek Template
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
            <li><a href="#">Mérés</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="columns medium-10 medium-centered">
          <ul class="small-block-grid-2 termekgrid">
            <?php for ($i=0; $i < 5 ; $i++) : ?>
              <?php get_template_part( 'templates/termek', 'square' ); ?>
            <?php endfor; ?>
          </ul>
        </div>
      </div>
    </section>
  </main><!-- /.main -->
<?php endwhile; ?>
