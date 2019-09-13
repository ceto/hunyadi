<header class="theleftside">
  <div class="headsearch">
    <a class="stoggle" href="#">  
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;" viewBox="0 0 847 1058.75" x="0px" y="0px" fill-rule="evenodd" clip-rule="evenodd"><g><path fill="#ffffff" d="M589 511l227 227c12,12 12,31 0,43l-35 35c-12,12 -31,12 -43,0l-227 -227c-123,85 -291,71 -398,-36 -121,-121 -121,-318 0,-440 122,-121 319,-121 440,0 107,107 121,275 36,398zm-415 -337c-87,88 -87,230 0,318 88,88 230,88 318,0 88,-88 88,-230 0,-318 -88,-87 -230,-87 -318,0z"/></g></svg>
    <span>Keresés</span>
    </a>
    <?php get_search_form(); ?>
  </div>
  <?php do_action('wpml_add_language_selector'); ?>

  <div class="titlearea">
    <a href="<?= esc_url(home_url('/')); ?>" class="sitename" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
  </div>


  <nav class="nav nav--side" role="navigation">

      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--pri']);
      endif;
      ?>
    <a class="right-off-canvas-toggle sideroctl" href="#"><?php _e('Ajánlat kérése', 'hunyadi') ?></a>
      <?php
      if (has_nav_menu('secondary_navigation')) :
        wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'menu menu--sec']);
      endif;
      ?>
  </nav>


<!--   <a class="linktoensite" href="http://old.hunyadi.hu/en/" target="_blank">English version</a> -->

</header>
