<?php
  $sections = get_post_meta( get_the_ID(), 'page_repeat_group', true );
  foreach ( (array) $sections as $key => $entry ) {
  if ( isset( $entry['content'] ) ) : ?>
  <section class="pagesection pagesection--<?= sanitize_title(get_the_title()) .'-'.$key; ?>">
    <div class="row">
      <div class="columns <?= $entry['width']=='wide'?'medium-10':'medium-8' ?> medium-centered">
        <?php if ($entry['colwidth']=='half') : ?>
          <div class="row">
            <div class="columns medium-6"><?= wpautop( $entry['content'] ) ?></div>
            <div class="columns medium-6"><?= wpautop( $entry['content2'] ) ?></div>
          </div>
        <?php else : ?>
          <?= wpautop( $entry['content'] ) ?>
          <?= wpautop( $entry['content2'] ) ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; } ?>