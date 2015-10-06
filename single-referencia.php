<?php while (have_posts()) : the_post(); ?>
  <style>
    #banner {
      background-image: url('<?= get_stylesheet_directory_uri(); ?>/dist/images/mupa.jpg');
    }
  </style>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/refpage', 'header'); ?>
  </section>
  <main class="main" role="main">
    <section class="pagesection">
      <div class="row">
        <div class="columns medium-8 medium-centered">
          <p class="lead">A Budapesti Művészetek Palotája 3 nagyobb intézmény mellett több kisebb színház teremnek, kiállításnak ad otthont. Egy ilyen, európai szinten is kiemelkedő létesítmény villamos energia minősége fontos kérdés az épület üzemeltetésében.</p>
        </div>
      </div>
    </section>

    <section class="pagesection">
      <div class="row">
        <div class="columns medium-10 columns medium-centered">
          <div class="row">
            <h2>A feladat: Energia monitoring</h2>
            <p>A létesítmény megfelelő minőségű villamos energiával történő ellátása kulcs kérdés az üzemeltető számára színházi előadások és TV közvetítések miatt. A lekötött teljesítmények, a fogyasztás, a felharmónikusok vizsgálata, a meddő és hatásos teljesítmények figyelése és a hálózati zavarok rögzítése fontos részét képezték a projektnek</p>
          </div>
        </div>
      </div>
    </section>

    <section class="pagesection">
      <div class="row">
        <div class="columns medium-10 columns medium-centered">
          <div class="row">
            <div class="medium-6 columns">
              <h2>Megoldás</h2>
              <p>A pontos analízis érdekében a rögzített adatokat biztonságos adatbázisba mentettük. A megfigyelő állomás számítógépe és a műszerek közti kommunikáció Ethernet porton keresztül a belső hálózaton valósul meg. Az egyedi mérésekre a Hunyadi Kft által fejlesztett és a projekt részét képző mobil műszer ad lehetőséget, amelyben az UMG 605 mellett Janitza áramváltók kaptak helyet.</p>
              <p>Választásunk azért esett az UMG 605-re, mert a Magyarországon is érvényben lévő MSZ EN 50160-as szabvány által meghatározott hálózati paraméterek vizsgálatára tökéletesen alkalmas.</p>
            </div>
            <div class="medium-6 columns">
              <h2>Az ügyfél előnyei</h2>
              <p>A 8 db UMG 605-ös műszerből álló energia monitoring rendszer segítségével  vizsgálhatja – az estéről estére változó feltételek mellett is– a működéshez elengedhetetlen, hálózat minőségét jelző paramétereket.</p>
              <p>A telepített monitoring rendszer kialakítása lehetővé teszi a meddő teljesítmény figyelését és kompenzálásra ad lehetőséget. Az Online adatok figyelésével a lekötött teljesítmények túllépése elkerülhető. A mobil műszer lehetővé tette motorok, előadótermek egyedi monitorozását</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pagesection">
      <div class="row">
        <div class="columns medium-10 columns medium-centered">
          <h2>Alkalmazott technológia</h2>
          <ul class="medium-block-grid-3 params">
            <li>
              <div class="params__item">
                <h3 class="params__name">Műszerek</h3>
                <div class="params__data">
                  <p><strong>UMG 605</strong><br># 52.16.027 8 eszköz</p>
                </div>
              </div>
            </li>
            <li>
              <div class="params__item">
                <h3 class="params__name">Kommunikáció</h3>
                <div class="params__data">
                  <p><strong>Ethernet</strong><br>UMG 605</p>
                  <p><strong>Modbus, RS485</strong><br>Az UMG 605-ök között</p>
                </div>
              </div>
            </li>
            <li>
              <div class="params__item">
                <h3 class="params__name">Szoftver</h3>
                <div class="params__data">
                  <p><strong>GridVis és UMG605 webes riport</strong><br>Beállítások, adatok gyűjtése, tárolása, grafikus megjelenítése, reportok készítése, online UMG605 adatok figyelése</p>
                </div>
              </div>
            </li>
            <li>
              <div class="params__item">
                <h3 class="params__name">Lorem ipsum</h3>
                <div class="params__data">
                  <p><strong>UMG 605</strong><br># 52.16.027 8 eszköz</p>
                </div>
              </div>
            </li>
            <li>
              <div class="params__item">
                <h3 class="params__name">Dolor sit amet</h3>
                <div class="params__data">
                  <p><strong>Modbus, RS485</strong><br>Az UMG 605-ök között</p>
                </div>
              </div>
            </li>
          </ul>

        </div>
      </div>
    </section>


    <?php get_template_part('templates/section','reflist'); ?>

  </main><!-- /.main -->
<?php endwhile; ?>
