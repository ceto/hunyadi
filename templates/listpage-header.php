<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/banner','bg' ); ?>
<div class="banner__text">
  <div class="row">
    <div class="columns medium-8 columns medium-centered">
      <?php if (is_page_template('template-termekek.php') || is_page_template('template-referencia.php') || is_page_template('template-kapcsolat.php') ) : ?>
        <span class="banner__parentlink"><?= __('Hunyadi','hunyadi'); ?></span>
      <?php else: ?>
        <a href="<?= get_the_permalink(18) ?>" class="banner__parentlink"><?= __('Termékek','hunyadi'); ?></a>
      <?php endif; ?>
      <h1 class="banner__title"><?= Titles\title(); ?></h1>
    </div>
  </div>
</div>
