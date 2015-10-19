<?php while (have_posts()) : the_post(); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/page', 'header'); ?>
  </section>
  <main class="main" role="main">

    <section class="pagesection">
      <div class="row">
        <div class="columns medium-8 medium-centered">
          <?php the_content(); ?>
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
                  <div class="prodvarian__content">
                    <h2><?= $entry['name'] ?></h2>
                    <?= wpautop($entry['description']); ?>

                    <h3><a href="#">Adatlap</a></h3>
                    <?= adatlaposit($entry['params']); ?>
                    <h3><a href="#">Letölthető anyagok</a></h3>
                    <?php $dlfiles = $entry['dlfiles']; ?>
                    <?php foreach ( $dlfiles as $csat_id => $csat_url ) : ?>
                        <?php $csat=get_post( $csat_id ) ?>
                       <a class="dlfile" href="<?= $csat_url; ?>"><?= $csat->post_title; ?></a>
                    <?php endforeach; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

    <?php } } ?>

<!--
    <section class="pagesection pagesection--lighten pagesection--lighten">
      <div class="row">
        <div class="columns medium-8 medium-centered">
            <h2>HEKA berendezések adatlapja</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ab ipsam repellat eos tempore temporibus, odit, delectus illo magni laboriosam illum voluptate. Labore, quas ea et vitae nesciunt harum ut.</p>
            <p>A termék adatlapjának megjelenítéséhez válasszon a listából</p>
            <ul class="accordion" data-accordion>
              <li class="accordion-navigation">
                <a href="#panel1a">HEKA-1 szakaszkapcsolós fázisjavító berendezés </a>
                <div id="panel1a" class="content">
                  <dl>
                    <dt>Berendezés típusa</dt>
                    <dd>HEKA-1 x/440/IC5/- </dd>
                    <dt>Alkalmazási hely</dt>
                    <dd>Normál és alacsonyan szennyezett hálózatra (THD(I) < 20%)</dd>
                    <dt>Névleges teljesítmény (415V-on)</dt>
                    <dd>x kvar</dd>
                    <dt>Bővíthető (igen/nem):</dt>
                    <dd>Igen</dd>
                    <dt>Névleges szigetelési / hálózati / kondenzátor feszültség</dt>
                    <dd>500V / 400V / 440V</dd>
                    <dt>Kondenzátor típusa</dt>
                    <dd>PCB mentes, 3 fázisú, Δ kapcsolású, Un=440V-os, beépített kisütőellenállással, N2 gáztöltésű (száraz), öngyógyuló dielektrikummal, serlegházas kivitelű, sorkapocs bekötésű</dd>
                    <dt>Vezérlő autoatika</dt>
                    <dd>Mikroprocesszor vezérlésű, állandó digitális cosfi, feszültség, áram kijelzéssel</dd>
                    <dt>Mágneskapcsoló</dt>
                    <dd>3 fázisú, kondenzátor-mágneskapcsoló, a bekapcsolási áramlökések korlátozására siettetett zárású segédérintkezővel kapcsolt csillapító ellenállással vannak szerelve</dd>
                  </dl>
                </div>
              </li>
            </ul>
        </div>
      </div>
    </section> -->



    <?php get_template_part('templates/section','termeklist'); ?>

  </main><!-- /.main -->
<?php endwhile; ?>
