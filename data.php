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

     $stationnaar = "gent dampoort";
     $treindatgemoetpakken = getConnection($stationvan,$stationnaar);
     //var_dump($treindatgemoetpakken);



    foreach($treindatgemoetpakken["connection"] as $connection){

        echo "<h3>";
        echo date('H:i', $connection["departure"]["time"]);

        if($connection["departure"]["delay"] != 0)
        {
            echo "<span style='color:red;'> + ".($connection["departure"]["delay"]/60)."min</span>";
        }

        echo ' : Departure from ';
        echo $connection["departure"]["stationinfo"]["name"];
        echo " at platform ";
        echo $connection["departure"]["platform"];
        echo " direction ";
        echo $connection["departure"]["direction"]["name"];
        echo " to arive at ";
        echo date('H:i', $connection["arrival"]["time"]);

        if( $connection["vias"]!= null){
        echo " (";
        echo $connection["vias"]["number"];
        echo " vias, but they ar not implemented yet)";
        echo "</h3>";
        }



        echo "<pre>";
        //print_r($connection);
        //print_r($connection["vias"]);
        echo "</pre>";

    }

}

?>

