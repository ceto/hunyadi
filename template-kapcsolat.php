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
    <section class="pagesection">
      <div class="row">
        <div class="columns medium-8 columns medium-centered">
          <div class="row">
            <div class="small-6 medium-6 columns">
              <h3>Székhely, központ</h3>
              <p>1222 Budapest,<br>
              Gyár u. 14.</p>
              <p>Tel: <a href="tel:+3612972020">+36 1 2972020</a><br>
              Fax: <a href="fax:+3612972022">+36 1 2972022</a></p>
              <p>Email: <a href="mailto:info@hunyadikft.hu">info@hunyadikft.hu</a></p>
            </div>
            <div class="small-6 medium-6 columns">
              <h3>Gyártóbázis</h3>
               <p>4002 Debrecen,<br>
              Balmazújvárosi út 10.<br>
              DRGA Épület</p>
              <p>Tel: <a href="tel:++3652524740">+36 52 524740</a><br>
              Fax: <a href="fax:+3652524744">+36 52 524744</a></p>
            </div>
          </div>
          <hr>
          <div class="row"><div class="small-12 columns"><h3>Banki adatok</h3></div></div>
          <div class="row">
            <div class="medium-6 columns">
              <p>Adószám: 11550877-2-43<br>
              Cégjegyzékszám: 01-09-738675</p>
              <p>Raiffeisen Bank Zrt.<br>
              Swift: UBRTHUHB</p>
            </div>
            <div class="medium-6 columns">
              <p>HUF 12012228-01479881-00100009<br>
                IBAN: HU 1212 0122 2801 4798 8100 1000 09</p>
                <p>EUR 12012228 - 01479881 – 00500007<br>
                IBAN: HU 4612 0122 2801 4798 8100 5000 07</p>
            </div>
          </div>
          <div class="row"><div class="small-12 columns">
            <a href="#" class="right-off-canvas-toggle button">Ajánlatkérés</a>
          </div></div>
        </div>
      </div>
  </section>



    <aside class="pagesection pagesection--gmap pagesection--darken">
      <div id="mapcanvas" class="mapcanvas"></div>
    </aside>

  </main><!-- /.main -->
<?php endwhile; ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var map;
  function initialize() {
    var latlng = new google.maps.LatLng(47.411013, 19.036092);
  var centerlatlng = new google.maps.LatLng(47.411013, 19.036092);
  var myOptions = {
    zoom: 14,
    center: centerlatlng,
    disableDefaultUI: true,
    scrollwheel: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  styles:[
          {
            "featureType": "administrative",
            "elementType": "labels",
            "stylers": [
              { "visibility": "off" }
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
              { "color": "#9f9f9f" }
            ]
          },{
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
              { "color": "#55aa00" },
              { "weight": 1.1 }
            ]
          },{
            "featureType": "road.highway",
            "elementType": "labels.icon",
            "stylers": [
              { "visibility": "off" }
            ]
          }
        ]
  };
  var map = new google.maps.Map(document.getElementById('mapcanvas'), myOptions);

  var image = new google.maps.MarkerImage('http://vizibalazs.hu/wp-content/themes/vizibalazs/flag.png',
  new google.maps.Size(23, 31), new google.maps.Point(0,0), new google.maps.Point(1, 15));
  //var shadow = new google.maps.MarkerImage('http://miskolczilaw.hu/wp-content/themes/jmt/dist/images/map_zaszlo_shadow.png',
  //new google.maps.Size(95, 49), new google.maps.Point(0,0), new google.maps.Point(1, 49));

  var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    title:"Hunyadi Kft.",
    icon:image,
    //shadow:shadow
  });
   }

   google.maps.event.addDomListener(window, 'load', initialize);
</script>
