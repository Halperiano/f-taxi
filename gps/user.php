<?php
if(isset($_REQUEST["lat"]) && isset($_REQUEST["lon"]))
{
$navegador = get_browser(null, true);
$t="";
foreach($navegador as $k=>$v){$t.=$v;}
$v=md5($v);
$file = fopen("markers/".$v.".php", "w");
fwrite($file, "<?php ");
fwrite($file,'$lat='.$_REQUEST["lat"].";");
fwrite($file,'$lng='.$_REQUEST["lon"].";");
fwrite($file, " ?>");
fclose($file);
}
?>