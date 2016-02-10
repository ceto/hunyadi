<?php while (have_posts()) : the_post(); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/refpage', 'header'); ?>
  </section>
  <main class="main" role="main">
    <section class="pagesection pagesection--intro">
      <div class="row">
        <div class="columns medium-8 medium-centered">
          <?php the_content(); ?>
        </div>
      </div>
    </section>

    <?php get_template_part('templates/page', 'sections' ); ?>

    <?php if ($datagrids = get_post_meta( get_the_ID(), 'referencia_repeat_group', true )) : ?>
    <section class="pagesection pagesection--refparams">
      <div class="row">
        <div class="columns medium-10 columns medium-centered">
          <h2 class="pagesection__title">Alkalmazott technológia</h2>
          <ul class="small-block-grid-2 medium-block-grid-3 params">
            <?php
              foreach ( (array) $datagrids as $key => $entry ) {
              if ( isset( $entry['datagrid'] ) ) : ?>
                <li>
                  <div class="params__item"><?= apply_filters( 'the_content', $entry['datagrid']  ) ?></div>
                </li>
              <?php endif;  } ?>
            </ul>
          </div>
      </div>
    </section>
    <?php endif; ?>


    <?php get_template_part('templates/section','servicelist'); ?>

    <?php get_template_part('templates/section','reflist'); ?>

  </main><!-- /.main -->
<?php endwhile; ?>
