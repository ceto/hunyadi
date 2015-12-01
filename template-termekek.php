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
      <section id="termekblokk--<?= sanitize_title( $field->name ); ?>" class="pagesection pagesection--termekblokk">
        <div class="row">
          <div class="columns medium-10 medium-centered">
            <div class="row">
              <div class="columns">
                <h2 class="termekblokk__title"><?= $field->name; ?></h2>
                <p class="lead"><?= term_description( $field->term_id,'field') ?></p>
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
                  <hr>
                  <ul class="block-grid-1 medium-block-grid-2 miniprodblock">
                    <?php while ($the_prods->have_posts()) : $the_prods->the_post(); ?>
                      <?php get_template_part('templates/mini', 'prod' ); ?>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
                <br>
                <a href="<?= get_term_link($field); ?>" class="button small">Mutasd a részleteket: <?= $field->name; ?></a>

              </div>
            </div>
          </div>
        </div>
      </section>


    <?php endforeach; ?>


    <?php endif; ?>


  </main><!-- /.main -->
<?php endwhile; ?>
