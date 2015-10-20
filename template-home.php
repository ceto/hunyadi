<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <section class="homebanner" role="banner" id="homebanner">
    <div class="row collapse">
      <div class="small-6 medium-8 columns">
        <div class="hometile">
          <h2><a href="<?= get_the_permalink(5)?>">Fázisjavítás</a></h2>
          <p>Meddőenergia felár minimalizálás</p>
        </div>
      </div>
      <div class="small-6 medium-4 columns">
        <div class="hometile light">
          <h2><a href="<?= get_the_permalink(10)?>">Energetika</a></h2>
          <p>Hatékonyság növelés</p>
        </div>
      </div>
    </div>
    <div class="row collapse">
      <div class="small-6 medium-4 columns">
        <div class="hometile light">
          <h2><a href="<?= get_the_permalink(8)?>">JANITZA műszerek</a></h2>
          <p>100%-os átláthatóság</p>
        </div>
      </div>
      <div class="small-6 medium-8 columns">
        <div class="hometile light2">
          <h2><a href="<?= get_the_permalink(15)?>">Vilamos kivitelezés</a></h2>
          <p>Hálózati csatlakozástól a berendezésgyártásig</p>
        </div>
      </div>
    </div>
    <div class="row collapse">
      <div class="small-6 medium-4 columns">
        <div class="hometile light3">
          <h2><a href="<?= get_the_permalink(15)?>">Üzemeltetés, karbantartás</a></h2>
          <p>Országos lefedettség. 0-24.</p>
        </div>
      </div>
      <div class="small-6 medium-4 columns">
        <div class="hometile light">
          <h2><a href="<?= get_the_permalink(5)?>">Lorem Adipiscing</a></h2>
          <p>Lorem ipsum dolor sit amet</p>
        </div>
      </div>
      <div class="small-6 medium-4 columns">
        <div class="hometile">
          <h2><a href="<?= get_the_permalink(5)?>">Lorem Adipiscing</a></h2>
          <p>Lorem ipsum dolor sit amet</p>
        </div>
      </div>
    </div>
  </section>
  <main class="main" role="main">
    <section class="pagesection">
      <div class="row">
        <div class="medium-8 medium-centered columns">
          <?php the_content(); ?>
        </div>
      </div>
    </section>
  </main><!-- /.main -->
<?php endwhile; ?>
