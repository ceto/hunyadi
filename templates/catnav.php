<section class="pagesection pagesection--narrow">
  <div class="row">
    <div class="columns medium-10 medium-centered">
      <nav class="catnav row">
        <div class="columns medium-3">
          <h2>Témakör</h2>
        </div>
        <div class="columns medium-9">
          <ul class="menu menu--cat">
            <li><a href="<?= get_the_permalink(get_option( 'page_for_posts' )) ?>">Mutasd mindet</a></li>
            <?php
              $args = array(
                'show_option_all'    => '',
                'orderby'            => 'name',
                'order'              => 'ASC',
                'style'              => 'list',
                'show_count'         => 0,
                'hide_empty'         => 1,
                'use_desc_for_title' => 1,
                'child_of'           => 0,
                'feed'               => '',
                'feed_type'          => '',
                'feed_image'         => '',
                'exclude'            => '',
                'exclude_tree'       => '',
                'include'            => '',
                'hierarchical'       => 1,
                'title_li'           => '',
                'show_option_none'   => __( '' ),
                'number'             => null,
                'echo'               => 1,
                'depth'              => 1,
                'current_category'   => 0,
                'pad_counts'         => 0,
                'taxonomy'           => 'category',
                'walker'             => null
              );
              wp_list_categories( $args );
            ?>
          </ul>
        </div>
      </nav>


     </div>
  </div>
</section>