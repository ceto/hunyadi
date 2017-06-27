<header class="theleftside">

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
    <a class="right-off-canvas-toggle sideroctl" href="#">Ajánlat kérése</a>
      <?php
      if (has_nav_menu('secondary_navigation')) :
        wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'menu menu--sec']);
      endif;
      ?>
  </nav>


<!--   <a class="linktoensite" href="http://old.hunyadi.hu/en/" target="_blank">English version</a> -->

</header>
