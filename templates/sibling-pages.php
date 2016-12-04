<?php
  if ( wp_get_post_parent_id( $post->ID )!==0) {
  $siblings = get_pages('child_of='.wp_get_post_parent_id( $post->ID ));
  if( count( $siblings ) != 0 ) : ?>
    <section class="pagesection pagesection--details pagesection--inverse">
      <div class="row">
        <div class="columns medium-8 columns medium-centered">
        <h2 class="pagesection__title"><?php _e('Kapcsolódó szolgáltatások','hu'); ?></h2>
        <ul class="subpageslist">
          <?php wp_list_pages(array(
            'title_li' => '',
            'exclude' => $post->ID,
            'link_after' => ' <i class="ion ion-ios-arrow-thin-right"></i>',
            'child_of' => wp_get_post_parent_id( $post->ID ),
            'sort_column' => 'menu_order'
          )); ?>
        </ul>
        </div>
      </div>
    </section>
  <?php endif; } ?>