<header class="clearfix">
  <ul class="title-area">
    <li class="name">
      <a href="<?= esc_url(home_url('/')); ?>" class="icon-flipp" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
    </li>
    <li class="menu-toggle"><a href="#" data-menu-toggle="#main-nav"><span class="icon-menu"></span>MENÜ</a></li>
  </ul>

  <nav id="mm" class="main-navigation atop-bar" role="navigation">
    <div class="menu-main-nav-container">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </div>
  </nav>
</header>
