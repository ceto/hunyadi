<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/banner','bg' ); ?>
<div class="banner__text">
  <div class="row">
    <div class="columns medium-8 medium-centered">
      <div class="row">
        <div class="columns medium-9">
            <?php if (is_archive('category')) :?>
            <a href="<?= get_the_permalink(get_option( 'page_for_posts' )) ?>" class="banner__parentlink"><?= __('Tudástár','hu'); ?></a>
          <?php else: ?>
          <?= !empty( $post->post_parent ) ? '<a class="banner__parentlink" href="'. get_the_permalink( $post->post_parent ).'">'. get_the_title( $post->post_parent ). '</a>':'<span class="banner__parentlink">Hunyadi</span>'; ?>
        <?php endif; ?>

          <h1 class="banner__title"><?= Titles\title(); ?></h1>
        </div>
      </div>
    </div>
  </div>
</div>
