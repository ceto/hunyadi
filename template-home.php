<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <section class="homebanner" role="banner" id="homebanner">
    <div class="row collapse">
      <?php
        $sections = get_post_meta( get_the_ID(), 'homepage_repeat_group', true );
        $homi=0;
        foreach ( (array) $sections as $key => $entry ) : ?>
          <div class="hometile hometile--<?= ++$homi ?>">
            <h2><a href="<?= $entry['ht_url'] ?>"><?= $entry['ht_title'] ?></a></h2>
            <p><?= $entry['ht_text'] ?></p>
            <a class="hometile__more" href="<?= $entry['ht_url'] ?>"><i class="ion ion-ios-arrow-thin-right"></i></a>
          </div>
        <?php endforeach;  ?>
    </div>
  </section>
  <main class="main" role="main">
    <section class="pagesection pagesection--intro">
      <div class="row">
        <div class="columns medium-8 medium-centered">
          <?php the_content(); ?>
        </div>
      </div>
    </section>
    <?php get_template_part('templates/page', 'sections' ); ?>
  </main><!-- /.main -->
<?php endwhile; ?>
