<?php
/**
 * Template Name: Termekek Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/listpage', 'header'); ?>
  </section>
  <main class="main" role="main">

  <?php

    $szakteruletek = get_terms( 'field', array(
      'parent' => 0
    ));
    //print_r($szakteruletek);

   //$szakteruletek = get_terms( 'field' );
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

<!--         <div class="row">
          <div class="columns medium-10 medium-centered">
            <?php
              $the_prods = new WP_Query ( array (
                'post_type' => 'termek',
                'nopaging' => true,
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                      'taxonomy' => 'field',
                      'field'    => 'id',
                      'terms'    => $field->term_id
                    ),
                  ),
              ));
            ?>
            <?php if ($the_prods->post_count>0) : ?>
              <ul class="block-grid-1 small-block-grid-2 medium-block-grid-2 large-block-grid-3 miniprodblock">
                <?php while ($the_prods->have_posts()) : $the_prods->the_post(); ?>
                  <?php get_template_part('templates/mini', 'prod' ); ?>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div> -->


      </section>


    <?php endforeach; ?>


    <?php endif; ?>


  </main><!-- /.main -->
<?php endwhile; ?>
