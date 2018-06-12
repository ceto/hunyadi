<li class="miniprod">
  <figure class="miniprod__fig">
    <a href="<?php the_permalink() ?>">
      <?php if (get_post_meta( get_the_ID(), 'prodthumb_id', true )) :?>
        <?php
          $imci_s = wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'prodthumb_id', true ), 'medium11');
        ?>
        <img src="<?= $imci_s['0']; ?>" alt="<?php the_title(); ?>">
      <?php else: ?>
        <img src="http://placehold.it/640x640" alt="<?php the_title(); ?>">
      <?php endif; ?>
    </a>
  </figure>

  <h3 class="miniprod__title">
    <a href="<?php the_permalink() ?>">
      <?php the_title(); ?>
    </a>
  </h3>
  <?php if ( get_post_meta( get_the_ID(), 'product_repeat_group', true ) ) : ?>
    <ul class="miniprod__list">
      <?php $prod_variants = get_post_meta( get_the_ID(), 'product_repeat_group', true );
        foreach ( (array) $prod_variants as $key => $entry ) : ?>
          <li>
            <a href="<?= get_the_permalink().'#'.sanitize_title( $entry['name'] ); ?>">
              <?= $entry['name']; ?>
            </a>
          </li>
        <?php endforeach; ?>
    </ul>
  <?php endif ?>
  <a class="miniprod__more" href="<?php the_permalink() ?>"><?php _e('Részletek','hunyadi') ?></a>
</li>