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

   $szakteruletek = get_terms( 'field' );
   if ( ! empty( $szakteruletek ) && ! is_wp_error( $szakteruletek ) ) : ?>

    <nav class="pagesection pagesection--darken">
      <div class="row">
        <div class="columns medium-10 medium-centered">
          <div class="row">
            <div class="columns medium-4">
              <h2>Termékkategóriák</h2>
            </div>
            <div class="columns medium-8">
              <ul class="filterlist">
                <?php foreach ( $szakteruletek as $field ) :?>
                  <li>
                  <a href="#termekblokk--<?= sanitize_title( $field->name ); ?>">
                    <?= $field->name ?>
                  </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>






    <?php reset($szakteruletek); ?>

    <?php foreach ( $szakteruletek as $field ) :?>
      <section id="termekblokk--<?= sanitize_title( $field->name ); ?>" class="pagesection pagesection--termekblokk">
        <div class="row">
          <div class="columns medium-10 medium-centered">
            <div class="row">
              <div class="columns">

                <h2><?= $field->name; ?></h2>
                <p><?= term_description( $field->term_id,'field') ?></p>

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
                  <ul class="block-grid-1 small-block-grid-2 xxlarge-block-grid-3 miniprodblock">
                    <?php while ($the_prods->have_posts()) : $the_prods->the_post(); ?>
                      <li class="miniprod">
                        <figure class="miniprod__fig">
                          <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                          </a>
                        </figure>
                        <h3 class="miniprod__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
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
                        <a class="miniprod__more" href="<?php the_permalink() ?>">Részletek</a>
                      </li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </section>


    <?php endforeach; ?>


    <?php endif; ?>


  </main><!-- /.main -->
<?php endwhile; ?>
