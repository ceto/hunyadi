<?php while (have_posts()) : the_post(); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/refpage', 'header'); ?>
  </section>
  <main class="main" role="main">
    <section class="pagesection">
      <div class="row">
        <div class="columns medium-8 medium-centered">
          <?php the_content(); ?>
        </div>
      </div>
    </section>

    <?php get_template_part('templates/page', 'sections' ); ?>

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
