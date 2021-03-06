<?php while (have_posts()) : the_post(); ?>
  <header class="banner banner--white" role="banner" id="banner">
    <?php get_template_part('templates/termek', 'header'); ?>
  </header>
  <main class="main" role="main">

    <section class="pagesection pagesection--intro">
      <div class="row">
        <div class="columns medium-10 medium-centered">
          <div class="row">
            <div class="columns medium-4 medium-push-8">
            <?php if (get_post_meta( get_the_ID(), 'prodthumb_id', true )) :?>
                <?php
                  $imci_s = wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'prodthumb_id', true ), 'medium11');
                ?>
                <img class="introimg" src="<?= $imci_s['0']; ?>" alt="<?php the_title(); ?>">
              <?php else: ?>
                <img class="introimg" src="http://placehold.it/640x640/?text=Hunyadi" alt="<?php the_title(); ?>">
              <?php endif; ?>
            </div>
            <div class="columns medium-8 medium-pull-4">
              <?php the_content(); ?>
               <a class="right-off-canvas-toggle button small" href="#">Ajánlat kérése</a>
            </div>

          </div>
        </div>
      </div>

    </section>

    <?php if ( get_post_meta( get_the_ID(), 'product_repeat_group', true ) ) {
      $prod_variants = get_post_meta( get_the_ID(), 'product_repeat_group', true );
      foreach ( (array) $prod_variants as $key => $entry ) { ?>
        <section id="<?= sanitize_title( $entry['name'] ); ?>" class="pagesection pagesection--prodvariant">
          <div class="row">
            <div class="columns medium-10 medium-centered">
              <div class="row">
                <div class="columns medium-4 <?= ($key%2!=0)?'medium-push-8':'' ?>">
                  <?php if ($entry['prodphoto']) : ?>
                    <?php
                      $ima = $entry['prodphoto_id'];
                      $imci_s = wp_get_attachment_image_src( $ima, 'small');
                      $imci_m = wp_get_attachment_image_src( $ima, 'medium');
                      $imci = wp_get_attachment_image_src( $ima, 'large');
                    ?>
                    <figure class="prodvariant__photo">
                      <img src="<?= $imci_s['0']; ?>" alt="">
                    </figure>
                  <?php endif; ?>
                </div>
                <div class="columns medium-8 <?= ($key%2!=0)?'medium-pull-4':'' ?>">
                  <div class="prodvariant__content">
                    <h2><?= $entry['name'] ?></h2>
                    <?php if ( $entry['subtitle']!= '' ) : ?>
                      <p class="prodvariant__subtitle"><?= $entry['subtitle']; ?></p>
                    <?php endif; ?>

                    <?php if ( $entry['description']!= '' ) : ?>
                      <div class="prodvariant__descr"><?= apply_filters( 'the_content', $entry['description']); ?></div>
                    <?php endif; ?>

                    <a href="#panel-<?= $key ?>" data-reveal-id="panel-<?= $key ?>" class="button small">Részletek</a>

                  </div>
                </div>
              </div>

              <!-- ALSO tabos blokk -->
              <div id="panel-<?= $key ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

                      <h2 id="modalTitle"><?= $entry['name'] ?></h2>
                      <?php if ( $entry['subtitle']!= '' ) : ?>
                        <p class="prodvariant__subtitle"><?= $entry['subtitle']; ?></p>
                      <?php endif; ?>
                      <ul class="tabs prodvariant__tabs" data-tab>
                        <?php if ( $entry['details']!= '' ) : ?>
                          <li class="tab-title active"><a href="#detailspanel-<?= $key ?>">Részletek</a></li>
                        <?php endif; ?>
                        <?php if ( $entry['params']!= '' ) : ?>
                          <li class="tab-title"><a href="#paramspanel-<?= $key ?>">Adatlap</a></li>
                        <?php endif; ?>
                        <?php if ( $entry['dlfiles']!= '' ) : ?>
                          <li class="tab-title"><a href="#dlfilespanel-<?= $key ?>">Letöltés</a></li>
                        <?php endif; ?>
                      </ul>


                      <div class="tabs-content">
                        <?php if ( $entry['details']!= '' ) : ?>
                          <div id="detailspanel-<?= $key ?>" class="content prodvariant__details active">
                            <?= apply_filters( 'the_content', $entry['details']); ?>
                          </div>
                        <?php endif; ?>

                        <?php if ( $entry['params']!= '' ) : ?>
                          <div id="paramspanel-<?= $key ?>" class="content prodvariant__params">
                            <?= adatlaposit($entry['params']); ?>
                          </div>
                        <?php endif; ?>

                        <?php if ( $entry['dlfiles']!= '' ) : ?>
                          <div id="dlfilespanel-<?= $key ?>" class="content prodvariant__dlfiles">
                            <h3>Letölthető fájlok</h3>
                            <?php foreach ( $entry['dlfiles'] as $csat_id => $csat_url ) : ?>
                              <?php $csat=get_post( $csat_id ) ?>
                              <a class="dlfile" target="_blank" href="<?= $csat_url; ?>"><?= $csat->post_title; ?> <i class="ion ion-ios-download-outline"></i></a>
                            <?php endforeach; ?>
                          </div>
                        <?php endif; ?>
                      </div>

                  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
              </div>
              <!---Tabos Blokk Vége -->


            </div>
          </div>
        </section>

    <?php } } ?>




  <?php get_template_part('templates/section','relatedprods'); ?>

  </main><!-- /.main -->
<?php endwhile; ?>
