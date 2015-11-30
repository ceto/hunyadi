<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class('has-banner'); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->

    <div class="off-canvas-wrap" data-offcanvas>
      <div class="inner-wrap">
        <aside class="left-off-canvas-menu">
          <?php do_action('get_header'); get_template_part('templates/header'); ?>
        </aside>
        <div id="container" class="container" role="document">
          <?php  get_template_part('templates/header','mobile')?>
          <?php include Wrapper\template_path(); ?>

          <?php /*if (Config\display_sidebar()) : ?>
            <aside class="sidebar" role="complementary">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif; */?>

          <?php do_action('get_footer'); get_template_part('templates/footer'); ?>

        </div><!-- /.container -->


        <!-- Off Canvas Contact Form -->
        <aside class="right-off-canvas-menu">
          <?php get_template_part('templates/contact','form');  ?>
        </aside>

        <a class="exit-off-canvas"></a>
      </div><!-- /.inner-wrap -->
    </div><!-- /.off-canvas-wrap -->


          <?php wp_footer(); ?>


  </body>
</html>
