<section class="pagesection pagesection--posts">
  <div class="row">
    <div class="columns medium-10 columns medium-centered">
    <h2>Kapcsolódó írások a tudástárból</h2>
    <div class="row">
      <?php for ($i=0; $i < 2 ; $i++) : ?>
        <div class="columns medium-6">
          <?php get_template_part( 'templates/post', 'square' ); ?>
        </div>
      <?php endfor; ?>
      <div class="columns"><a href="<?= get_permalink(18) ?>">További írások a tudástárban</a></div>
    </row>

  </div>
</div>
</section>