<?php use Roots\Sage\Titles; ?>
<?php //get_template_part('templates/banner','bg' ); ?>
<div class="banner__text">
  <div class="row">
    <div class="columns medium-10 columns medium-centered">

    <div class="row">
      <div class="columns medium-8">
      <?php $term_list = wp_get_post_terms($post->ID, 'field'); ?>
        <a href="<?= get_term_link($term_list[0]->term_id) ?>" class="banner__parentlink"><?php _e('Termékek','hunyadi'); ?>: <?= $term_list[0]->name?></a>
        <h1 class="banner__title"><?= Titles\title(); ?></h1>

      </div>
    </div>
    </div>
  </div>
</div>
