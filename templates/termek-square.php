<div class="termsquare">
  <figure class="termsquare__fig">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail(); ?>
    </a>
  </figure>
  <h3 class="termsquare__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p class="termsquare__area"><?php _e('Fázisjavítás | Energetika','hunyadi') ?></p>
  <a class="termsquare__more button tiny" href="<?php the_permalink(); ?>"><?php _e('Részletek','hunyadi') ?></a>
</div>