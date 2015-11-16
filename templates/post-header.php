<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/banner','bg' ); ?>
<div class="banner__text">
  <div class="row">
    <div class="columns medium-8 medium-centered">
        <?php get_template_part('templates/entry-meta'); ?>
        <h1 class="banner__title"><?= Titles\title(); ?></h1>
    </div>
  </div>
</div>