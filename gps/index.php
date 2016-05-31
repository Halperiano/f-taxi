<?php
$SITIE=((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$SITIE.= "://".$_SERVER['HTTP_HOST'];
$SITIE.= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('base',$SITIE);
function base_url($string)

{

return "../".$string;

}



?><head>

<script type="text/javascript" src="<?php echo base_url('js/jquery2.js');?>"></script>  
<script type="text/javascript" src="<?php echo base_url('js/ajax.js');?>"></script>  
<script type="text/javascript" src="<?php echo base_url('js/materialize.js');?>"></script>  


<link href="<?php echo base_url('css/materialize.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?php echo base_url('css/style.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection">

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

</head>





<style>.mapx{float:left;z-index:1; max-height:100%; height: 100%;width:100%;}.tabs .indicator {

    background-color: rgba(255,255,255,1);    box-shadow: -1px -1px 18px #ffffff;

}</style>

<div id="mapx" class="mapx"></div>





             


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>taxis</h4>
      <div id="cont">
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">cerrar</a>
    </div>
  </div>            






  <a id="esteotro" onclick="geoFindMe()" style="position:fixed; top:0%; left:0%; z-index:100;" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">location_on</i></a>

  <a id="este"  href="#modal1" style="position:fixed; top:0%;z-index:100;" class="modal-trigger btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">local_taxi</i></a>





<div class="ajax" style="display:none"></div>
<script>
$("#este").css("left",($("#esteotro").innerWidth()+5)+"px");
var markersWords=[];
var markers=[];
 function setAllMap() {
      for (var i = 0; i < markersWords.length; i++) {
        
        markersWords[i].setMap(map);
      }
    }
    function clearMarkers() {
      setAllMap(null);
    }
    function showMarkers() {
      setAllMap();
    }
    function deleteMarkers()
    {
      clearMarkers();
     markersWords = [];
    }
	
function geoFindMe() {


  if (!navigator.geolocation){
    Alert("<p>Geolocation is not supported by your browser</p>");
    return;
  }

  function success(position)
  {
var marker = new google.maps.Marker({

	position: {lat:position.coords.latitude,lng:position.coords.longitude},

	map: map,

	icon:"<?php echo base_url("/logo.png"); ?>",

    //draggable:true

	});
map.setCenter(marker.getPosition()); 	
  };

  function error() {
    Alert("Unable to retrieve your location");
  };

  Alert("<p>Locating…</p>");

  navigator.geolocation.getCurrentPosition(success, error);
}






    

var styles = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]

var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});	





map = new google.maps.Map(document.getElementById('mapx'),{zoom:17,disableDefaultUI: true,mapTypeControlOptions: {mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']},center: {lat:10.4860477,lng:-66.9052291}});

map.mapTypes.set('map_style', styledMap);

map.setMapTypeId('map_style');

$(document).ready(function(e) {
$('.modal-trigger').leanModal();	
C({u:"<?php echo base."data.php"; ?>",e:".ajax"});

 });






</script>

