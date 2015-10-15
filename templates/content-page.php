<section class="pagesection">
  <div class="row">
    <div class="columns medium-8 columns medium-centered">
      <?php the_content(); ?>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </div>
  </div>
</section>


<?php
  $children = get_pages('child_of='.$post->ID);
  if( count( $children ) != 0 ) : ?>
    <section class="pagesection pagesection--details">
      <div class="row">
        <div class="columns medium-8 columns medium-centered">
        <h2>A szolgáltatás részletei</h2>
        <ul class="small-block-grid-2 subpageslist">
          <?php wp_list_pages('title_li=&child_of='.$post->ID); ?>
        </ul>
        </div>
      </div>
    </section>
  <?php endif; ?>


<?php
  $sections = get_post_meta( get_the_ID(), 'page_repeat_group', true );
  foreach ( (array) $sections as $key => $entry ) {
  if ( isset( $entry['content'] ) ) : ?>
  <section class="pagesection pagesection--<?= sanitize_title(get_the_title()) .'-'.$key; ?>">
    <div class="row">
      <div class="columns <?= $entry['class']==''?'medium-8 medium-centered':$entry['class'] ?>">
        <?= wpautop( $entry['content'] ) ?>
      </div>
    </div>
  </section>
<?php endif; } ?>

<?php
  $children = get_pages('child_of='.$post->ID);
  if( count( $children ) != 0 ) : ?>
    <?php get_template_part('templates/section','postlist'); ?>
    <?php get_template_part('templates/section','reflist'); ?>
  <?php else: ?>
    <?php get_template_part('templates/section','termeklist'); ?>
  <?php endif; ?>