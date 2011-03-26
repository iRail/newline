<?php
  /**
   * Awesome newline script
   */

function getClosestStation($x,$y){
     $r = new HttpRequest('http://api.irail.be/stations/?lang=NL&format=json', HttpRequest::METH_GET);     
     try {	  
	  $r->send();
	  if ($r->getResponseCode() == 200) {	       
	       $json = json_decode($r->getResponseBody(),true);
	       return calculateClosest($json["station"],$x,$y);
	  }
     } catch (HttpException $ex) {
	  echo $ex;
     }
  }

function getConnection($stationvan,$stationnaar){
     $url = 'http://api.irail.be/connections/?lang=NL&format=json&from=' . urlencode($stationvan) . '&to=' . urlencode($stationnaar);
     
     echo $url;
     
     $r = new HttpRequest($url, HttpRequest::METH_GET);
     try {
	  $r->send();
	  if ($r->getResponseCode() == 200) {
	       echo $r->getResponseBody();
	       
	       $json = json_decode($r->getResponseBody(), true);
	       return $json;
	  }
     } catch (HttpException $ex) {
	  echo $ex;
     }

}


function calculateClosest($stations,$x,$y){
     $statmin = $stations[0]["name"];
     $dismin = 999999;
     
     foreach($stations as $station){
	  $dis = distance($x,$y,$station["locationX"], $station["locationY"]);
	  
	  if( $dis< $dismin){
	       $dismin = $dis;
	       $statmin =  $station["name"];
	  }
	  
	       
     }
     return $statmin;
}


function distance($x1,$y1,$x2,$y2){
     return sqrt((($x1-$x2)*($x1-$x2) + ($y1-$y2)*($y1-$y2)));

}



?>