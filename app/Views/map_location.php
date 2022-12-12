<style>
    #map {
        height: 700px;
        width: 100%;
        background-color: grey;
    }
</style>

<div class="page-wrapper">  
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title">Profile</h4> 
</div>
</div>
<div class="row">
<div class="col-sm-12">
    <div id="map"></div>
    </div>
</div>
</div>
<script>

let map;

function initMap() {
    // const ng = { lat: 9.0820, lng: 8.6753 };
    const ng = <?= json_encode($location) ?>;
  map = new google.maps.Map(document.getElementById("map"), {
    center: ng,
    zoom: 20,
  });

  const marker = new google.maps.Marker({
    position: ng,
    map: map,
  });

}

// function initMap() {
//   var center = {lat: 41.8781, lng: -87.6298};  var map = new google.maps.Map(document.getElementById('map'), {
//     zoom: 10,
//     center: center
//   });  var marker = new google.maps.Marker({
//     position: center,
//     map: map
//   });
// }


// function locateNigeria() {
//   map = new google.maps.Map(document.getElementById("map"), {
//     center: { lat: 9.0820, lng: 8.6753 },
//     zoom: 7,
//   });
// }



// 1: World
//     5: Landmass/continent
//     10: City
//     15: Streets
//     20: Buildings


</script>
<!-- <script type="text/javascript" src="scripts/index.js"></script> -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?= env('GOOGLE_MAP_KEY') ?>&callback=initMap">
</script>

<!-- </div> -->

