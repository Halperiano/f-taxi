<?php 
$SITIE=((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$SITIE.= "://".$_SERVER['HTTP_HOST'];
$SITIE.= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('base',$SITIE);

$ignores=array(".."=>"", "."=>"");
$dir="./markers/";
$markers=array();
if(is_dir($dir)){
	if ($dh = opendir($dir)){
	
		while (($file = readdir($dh)) !== false)
		{
	
if($file!=".." && $file!=".")
{
include $dir.$file;
$markers[]=(object) array("lat"=>$lat,"lng"=>$lng);
}
}/*wile*/


closedir($dh);
}


}
?>
<script>
markers=<?php echo json_encode($markers); ?>;
$(document).ready(function(e) {
	Alert("taxis cargados",2000);
 	
$(".modal-content #cont").html();
    for (var i = 0; i < markers.length; i++)
	{
    
	   var marker = new google.maps.Marker({
       position: {lat:markers[i].lat,lng:markers[i].lng},
       title:"taxi",
       map: map,
       icon:"<?php echo base."t.png"; ?>"
     });
$(".modal-content #cont").append('<a onclick="$(\'#modal1\').closeModal();map.setCenter(markersWords['+markersWords.length+'].getPosition())" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">local_taxi</i></a>&nbsp;');
markersWords.push(marker);
	
	 
    }
	  
//C({u:"<?php echo base."data.php" ?>",e:".ajax"});
});
</script>

