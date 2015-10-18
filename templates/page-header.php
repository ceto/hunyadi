<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/banner','bg' ); ?>
<div class="banner__text">
  <div class="row">
    <div class="columns medium-8 columns medium-centered">
      <?= !empty( $post->post_parent ) ? '<a class="banner__parentlink" href="'. get_the_permalink( $post->post_parent ).'">'. get_the_title( $post->post_parent ). '</a>':'';
?>
        <h1 class="banner__title"><?= Titles\title(); ?></h1>
    </div>
  </div>
</div>
