<?php while (have_posts()) : the_post(); ?>
  <style>
    #banner {
      background-image: url('<?= get_stylesheet_directory_uri(); ?>/dist/images/aramtorony.jpg');
    }
  </style>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/page', 'header'); ?>
  </section>
  <main class="main" role="main">
    <section class="pagesection">
      <div class="row">
        <div class="columns medium-8 medium-centered">
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque autem quas, debitis, libero ducimus vel. Ab itaque porro quibusdam perferendis! Totam voluptates quaerat quisquam porro officia eos sed, aliquam.</p>
        </div>
      </div>
    </section>

    <section class="pagesection pagesection--lighten">
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
              <li class="accordion-navigation">
                <a href="#panel2a">HEKA-8 automatikus fázisjavító berendezés</a>
                <div id="panel2a" class="content">
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
              <li class="accordion-navigation">
                <a href="#panel3a">HEKA tipus</a>
                <div id="panel3a" class="content">
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
              <li class="accordion-navigation">
                <a href="#panel4a">HEKA-2 folytott automatikás berendezés </a>
                <div id="panel4a" class="content">
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
    </section>



    <?php get_template_part('templates/section','termeklist'); ?>

  </main><!-- /.main -->
<?php endwhile; ?>
