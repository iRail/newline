<?php
  /**
   * Awesome newline script
   */

function getClosestStation($x,$y){
$r = new HttpRequest('http://api.irail.be/stations/?lang=NL&format=json', HttpRequest::METH_GET);
$r->setOptions(array('lastmodified' => filemtime('local.rss')));
$r->addQueryData(array('category' => 3));
try {
    $r->send();
    if ($r->getResponseCode() == 200) {
        file_put_contents('local.rss', $r->getResponseBody());
    }
} catch (HttpException $ex) {
    echo $ex;
}

}

function getConnection($stationvan,$stationnaar){
     

}


?>