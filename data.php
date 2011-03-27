<?php
  //echo "newline.irail.be";



 // http:// ... /index.php?x=3.1415&y=51
extract($_GET);
include("datalayer.php");
if(!isset($stationnaar)){
     $stationnaar = "schaarbeek";
}

if(isset($x) && isset($y)){
     $stationvan = getClosestStation($x,$y);
//     echo $stationvan;
     $stationnaar = "gent dampoort";
     $treindatgemoetpakken = getConnection($stationvan,$stationnaar);
     //var_dump($treindatgemoetpakken);
     $json = json_decode($treindatgemoetpakken, true);
     print_r($json);
}
//echo "Commit test van Batist";
?>

