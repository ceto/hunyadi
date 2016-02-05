<section class="banner" role="banner" id="banner">
  <?php get_template_part('templates/page', 'header'); ?>
</section>

<section class="pagesection pagesection--intro">
  <div class="row">
    <div class="columns medium-8 medium-centered">
      <div class="alert alert-warning">
        <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    </div>
  </div>
</section>
