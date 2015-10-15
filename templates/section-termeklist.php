<section class="pagesection pagesection--darken pagesection--termekek">
  <div class="row">
    <div class="columns medium-10 columns medium-centered">
    <h2>Kapcsolódó termékek</h2>
      <ul class="small-block-grid-2 medium-block-grid-3">
        <?php for ($i=0; $i < 1 ; $i++) : ?>
          <?php get_template_part( 'templates/termek', 'square' ); ?>
       <?php endfor; ?>
      </ul>
      <a href="<?= get_permalink(18) ?>" class="button">Teljes termékkatalógus itt</a>
    </div>
  </div>
</section>