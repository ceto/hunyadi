<?php while (have_posts()) : the_post(); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/page', 'header'); ?>
  </section>
  <main class="main" role="main">
    <?php get_template_part('templates/content', 'page'); ?>
  </main><!-- /.main -->
<?php endwhile; ?>