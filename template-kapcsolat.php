<?php
/**
 * Template Name: Kapcsolat Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/listpage', 'header'); ?>
  </section>
  <main class="main" role="main">
    <?php get_template_part('templates/content', 'page'); ?>
  </main><!-- /.main -->
<?php endwhile; ?>
