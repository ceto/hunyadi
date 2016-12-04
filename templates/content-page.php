
<section class="pagesection pagesection--intro">
  <div class="row">
    <div class="columns medium-8 columns medium-centered">
      <?php the_content(); ?>
      <a class="right-off-canvas-toggle button small" href="#top"><?php _e('Ajánlat kérése','hu'); ?></a>

    </div>
  </div>
</section>


<?php
  $children = get_pages('child_of='.$post->ID);
  if( count( $children ) != 0 ) : ?>
    <section class="pagesection pagesection--details pagesection--inverse">
      <div class="row">
        <div class="columns medium-8 columns medium-centered">
        <h2 class="pagesection__title">A szolgáltatás részletei</h2>
        <ul class="subpageslist">
          <?php wp_list_pages(array(
            'title_li' => '',
            'link_after' => ' <i class="ion ion-ios-arrow-thin-right"></i>',
            'child_of' => $post->ID,
            'sort_column' => 'menu_order'
          )); ?>
        </ul>
        </div>
      </div>
    </section>
  <?php endif; ?>



<?php get_template_part('templates/page', 'sections' ); ?>

<?php get_template_part('templates/sibling', 'pages' ); ?>

<?php get_template_part('templates/section','relatedprods'); ?>
<?php //get_template_part('templates/section','postlist'); ?>
<?php //get_template_part('templates/section','reflist'); ?>

