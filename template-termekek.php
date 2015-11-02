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

    $szakteruletek = get_terms( 'field');
    //print_r($szakteruletek);

   $szakteruletek = get_terms( 'field' );
   if ( ! empty( $szakteruletek ) && ! is_wp_error( $szakteruletek ) ) : ?>
    <ul>
      <?php foreach ( $szakteruletek as $field ) :?>
        <li>
        <a href="<?php echo get_term_link( $field, 'field' ); ?>">
          <?= $field->name ?>
        </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <?php reset($szakteruletek); ?>

    <?php foreach ( $szakteruletek as $field ) :?>

    <section class="pagesection pagesection--termekblokk">
      <div class="row">
        <div class="columns medium-10 medium-centered">
          <div class="row">
            <div class="columns medium-12">
              <h2><?= $field->name; ?></h2>
              <p><?= term_description( $field->term_id,'field') ?></p>

              <ul class="block-grid-1 small-block-grid-2 xxlarge-block-grid-3 miniprodblock">
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink(62) ?>">Hálózat analizátorok</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 604</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 605</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 508</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 511</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(62) ?>">Részletek</a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>


    <?php endif; ?>




    <section class="pagesection pagesection--termekblokk">
      <div class="row">
        <div class="columns medium-10 medium-centered">
          <div class="row">
            <div class="columns medium-12">
              <h2>Janitza energia monitoring műszerek</h2>
              <p>Janitza műszerek "kWh-tól a 63. felharmonikusig" avagy az egyszerű fogyasztásmérőktől a szabvány szerinti mérésre alkalmas hálózat analizátorokig.</p>
              <ul class="block-grid-1 small-block-grid-2 xxlarge-block-grid-3 miniprodblock">
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink(62) ?>">Hálózat analizátorok</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 604</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 605</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 508</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 511</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(62) ?>">Részletek</a>
                </li>
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink(62) ?>">Fogyasztásmérők</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 96</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 96 L</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 96 S</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 96 RM</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(62) ?>">Részletek</a>
                </li>
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink(62) ?>">MID hiteles fogyasztásmérők</a></h3>
                  <a class="miniprod__more" href="p<?= get_the_permalink(62) ?>">Részletek</a>
                </li>
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink() ?>">Univerzális mérőműszerek</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 103</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 104</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 507</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(62) ?>">Részletek</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pagesection pagesection--termekblokk">
      <div class="row">
        <div class="columns medium-10 medium-centered">
          <div class="row">
            <div class="columns medium-12">
              <h2>Fázisjavító berendezések, alkatrészek</h2>
              <p>Cégünk saját fejlesztésű, automatikus fázisjavító berendezés családja, a HEKA típusjelű fázisjavító berendezések optimális megoldást biztosítanak bármilyen nagyságú fogyasztó számára.</p>
              <ul class="block-grid-1 small-block-grid-2 xxlarge-block-grid-3 miniprodblock">
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink(48) ?>">HEKA fázisjavító berendezések</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(48) ?>">HEKA Standard</a></li>
                    <li><a href="<?= get_the_permalink(48) ?>">HEKA Prémium</a></li>
                    <li><a href="<?= get_the_permalink(48) ?>">HEKA Extra</a></li>
                    <li><a href="<?= get_the_permalink(48) ?>">HEKA Light</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(48) ?>">Részletek</a>
                </li>
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink(48) ?>">Fázisjavító automatikák</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(48) ?>">Janitza Prophi</a></li>
                    <li><a href="<?= get_the_permalink(48) ?>">ICAR</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(48) ?>">Részletek</a>
                </li>
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink(48) ?>">Fázisjavító kondenzátorok</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(48) ?>">Epcos</a></li>
                    <li><a href="<?= get_the_permalink(48) ?>">ICAR</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(48) ?>">Részletek</a>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </section>


<section class="pagesection pagesection--termekblokk">
      <div class="row">
        <div class="columns medium-10 medium-centered">
          <div class="row">
            <div class="columns medium-12">
              <h2>Lorem ipsum dolor sit amet</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro aut magnam temporibus ducimus, delectus alias ad ex fuga quidem. Sunt, sapiente? Ipsum esse, repudiandae fugit voluptate voluptatem tempore consequatur nulla.</p>
              <ul class="block-grid-1 small-block-grid-2 xxlarge-block-grid-3 miniprodblock">
                <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink(62) ?>">Dolor sit amet</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 604</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 605</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 508</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 511</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(62) ?>">Részletek</a>
                </li>
                 <li class="miniprod">
                  <h3 class="miniprod__title"><a href="<?= get_the_permalink() ?>">Lorem ipsum</a></h3>
                  <ul class="miniprod__list">
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 103</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 104</a></li>
                    <li><a href="<?= get_the_permalink(62) ?>">Janitza UMG 507</a></li>
                  </ul>
                  <a class="miniprod__more" href="<?= get_the_permalink(62) ?>">Részletek</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>




<!--
      <?php
        $args = array(
          'post_type' => array('termek'),
          'order'               => 'ASC',
          'orderby'             => 'date',
          'posts_per_page'         => 1000,
          'posts_per_archive_page' => 10,
        );
        $the_prods = new WP_Query( $args );
      ?>
       <div class="row">
        <div class="columns medium-10 columns medium-centered">
          <ul class="small-block-grid-2 termekgrid">
            <?php while ($the_prods->have_posts()) : $the_prods->the_post(); ?>
              <li><?php get_template_part( 'templates/termek', 'square' ); ?></li>
            <?php endwhile ?>
          </ul>
        </div>
      </div> -->


  </main><!-- /.main -->
<?php endwhile; ?>
