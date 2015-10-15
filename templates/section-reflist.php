<section class="pagesection pagesection--darken pagesection--refs">
  <div class="row">
    <div class="columns medium-10 columns medium-centered">
    <h2>Referencia</h2>
      <ul class="small-block-grid-2 medium-block-grid-3">
        <?php for ($i=0; $i < 3 ; $i++) : ?>
          <li>
          <?php get_template_part( 'templates/referencia', 'square' ); ?>
          </li>
       <?php endfor; ?>
      </ul>
      <a href="<?= get_permalink(19) ?>" class="button">Teljes referencialista itt</a>

    </div>
  </div>
</section>