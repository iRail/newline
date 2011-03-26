<?php
  /**
   * Awesome newline script
   */

function getClosestStation($x,$y){
     $r = new HttpRequest('http://api.irail.be/stations/?lang=NL&format=json', HttpRequest::METH_GET);
     try {
	  $r->send();
	  if ($r->getResponseCode() == 200) {
	       $json = json_decode($r->getResponseBody());
	       return calculateClosest($json["station"],$x,$y);
	  }
     } catch (HttpException $ex) {
	  echo $ex;
     }
  }

function getConnection($stationvan,$stationnaar){
     $r = new HttpRequest('http://api.irail.be/connections/?lang=NL&format=json&from=' . url_encode($stationvan) . 'to=' . url_encode($stationnaar), HttpRequest::METH_GET);
     try {
	  $r->send();
	  if ($r->getResponseCode() == 200) {
	       $json = json_decode($r->getResponseBody());
	       return calculateClosest($json["station"],$x,$y);
	  }
     } catch (HttpException $ex) {
	  echo $ex;
     }

}


function calculateClosest($stations,$x,$y){
     //TODO

}



?>