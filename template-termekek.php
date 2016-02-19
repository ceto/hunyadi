<?php
/**
 * Template Name: Termekek Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/banner','bg' ); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/listpage', 'header'); ?>
  </section>
  <main class="main" role="main">
    <section class="pagesection pagesection--intro">
      <div class="row">
        <div class="columns medium-8 columns medium-centered">
          <?php the_content(); ?>
        </div>
      </div>
    </section>

  <div class="ps">
    <div class="row">
      <div class="columns medium-10 medium-centered">
        <ul class="medium-block-grid-2 termekgrid">
          <?php  $szakteruletek = get_terms( 'field', array());
           if ( ! empty( $szakteruletek ) && ! is_wp_error( $szakteruletek ) ) : ?>
            <?php foreach ( $szakteruletek as $field ) :?>
              <li id="termekblokk--<?= sanitize_title( $field->name ); ?>" class="">
                    <h2 class="termekblokk__title"><?= $field->name; ?></h2>
                    <?= term_description( $field->term_id,'field') ?>
                    <a class="button small" href="<?= get_term_link($field->term_id); ?>#termekblokk">Mutasd a termékeket</a>
             </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </div>




  </main><!-- /.main -->
<?php endwhile; ?>





  <?php /*
    $szakteruletek = get_terms( 'field', array());
   if ( ! empty( $szakteruletek ) && ! is_wp_error( $szakteruletek ) ) : ?>


    <?php foreach ( $szakteruletek as $field ) :?>
      <section id="termekblokk--<?= sanitize_title( $field->name ); ?>" class="pagesection  pagesection--termekblokk">
        <div class="row">
          <div class="columns medium-8 columns medium-centered pagesection--intro">
            <h2 class="termekblokk__title"><?= $field->name; ?></h2>
            <?= term_description( $field->term_id,'field') ?>
            <a class="button small" href="<?= get_term_link($field->term_id); ?>#termekblokk">Mutasd a termékeket</a>
          </div>
        </div>
     </section>
    <?php endforeach; ?>


    <?php endif; */?>