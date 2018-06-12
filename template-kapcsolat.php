<?php
/**
 * Template Name: Kapcsolat Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/banner','bg' ); ?>
  <section class="banner" role="banner" id="banner">
    <?php get_template_part('templates/listpage', 'header'); ?>
  </section>
  <main class="main" role="main">

  <section class="pagesection pagesection--intro">
  <div class="row">
      <div class="columns medium-8 columns medium-centered">
        <?php the_content(); ?>
        <a class="right-off-canvas-toggle button small" href="#top"><?php _e('Ajánlat kérése','hunyadi'); ?></a>
      </div>
    </div>
  </section>

  <?php get_template_part('templates/page', 'sections' ); ?>



    <aside class="pagesection pagesection--gmap pagesection--darken">
      <div id="mapcanvas" class="mapcanvas"></div>
    </aside>

  </main><!-- /.main -->
<?php endwhile; ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaavYUMf43GomyiQ5ttMlvwF-MwnDMWu8&sensor=false"></script>
<script type="text/javascript">
  var map;
  function initialize() {
    var latlng = new google.maps.LatLng(47.411100, 19.035659);
    var latlngdebro = new google.maps.LatLng(47.544181, 21.573683);
    var centerlatlng = new google.maps.LatLng(47.411013, 20.036092);
    var myOptions = {
      zoom: 8,
      center: centerlatlng,
      //disableDefaultUI: false,
      //scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles:[
            {
              "featureType": "administrative",
              "elementType": "labels",
              "stylers": [
                // { "visibility": "off" }
              ]
            },{
              "featureType": "landscape",
              "elementType": "labels",
              "stylers": [
                { "visibility": "off" }
              ]
            },{
              "featureType": "transit",
              "elementType": "labels",
              "stylers": [
                { "visibility": "off" }
              ]
            },{
              "featureType": "landscape",
              "elementType": "geometry.fill",
              "stylers": [
                { "color": "#ececec" }
              ]
            },{
              "featureType": "water",
              "elementType": "geometry.fill",
              "stylers": [
                { "color": "#dadada" }
              ]
            },{
              "featureType": "poi",
              "elementType": "geometry.fill",
              "stylers": [
                { "color": "#c6c6c6" },
                { "visibility": "on" }
              ]
            },{
              "featureType": "poi",
              "elementType": "labels",
              "stylers": [
                { "visibility": "off" }
              ]
            },{
              "elementType": "labels.text",
              "stylers": [
                { "weight": 0.1 },
                { "color": "#606060" }
              ]
            },{
              "featureType": "administrative.locality",
              "elementType": "labels.text",
              "stylers": [
                { "color": "#4e4e4e" }
              ]
            },{
              "featureType": "road.highway",
              "elementType": "geometry",
              "stylers": [
                { "color": "#55aa00" },
                { "weight": 0.25 }
              ]
            },{
              "featureType": "road.highway",
              "elementType": "labels.icon",
              "stylers": [
                // { "visibility": "off" }
              ]
            }
          ]
  };
  var map = new google.maps.Map(document.getElementById('mapcanvas'), myOptions);

  var image = new google.maps.MarkerImage('http://vizibalazs.hu/wp-content/themes/vizibalazs/flag.png',
  new google.maps.Size(23, 31), new google.maps.Point(0,0), new google.maps.Point(11, 31));
  //var shadow = new google.maps.MarkerImage('http://miskolczilaw.hu/wp-content/themes/jmt/dist/images/map_zaszlo_shadow.png',
  //new google.maps.Size(95, 49), new google.maps.Point(0,0), new google.maps.Point(1, 49));

  var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    title:"Hunyadi Kft.",
    icon:image,
    //shadow:shadow
  });
  var markerdebro = new google.maps.Marker({
      position: latlngdebro,
      map: map,
      title:"Hunyadi Kft.",
      icon:image,
      //shadow:shadow
  });

  }

   google.maps.event.addDomListener(window, 'load', initialize);
</script>
