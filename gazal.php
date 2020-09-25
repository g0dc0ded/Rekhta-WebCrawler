<?php


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.rekhta.org/ghazals/is-nahiin-kaa-koii-ilaaj-nahiin-dagh-dehlvi-ghazals",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);

$htmldoc = new DOMDocument();
@$htmldoc->loadHTML($response);
$a = $htmldoc->getElementsByTagName('div');
echo "<pre>";
foreach($a as $k => $row){
   // print_r(@$row->attributes[1]->name);
   if(@$row->attributes[1]->nodeValue == "on"){
       $b = $row->getElementsByTagName('div');
        foreach($b as $l => $row1){
            if(@$row1->attributes[0]->nodeValue == "c"){
                $c =$row1->getElementsByTagName('p');
               foreach($c as $m=> $row2){
                   print_r($row2->nodeValue);
                   echo "<br>";
               }
            }
        }
 } 
}
echo "<br>";
echo "<br>";echo "<br>";echo "<br>";
foreach($a as $k => $row){
    // print_r(@$row->attributes[1]->name);
    if(@$row->attributes[1]->nodeValue == "on"){
        $b = $row->getElementsByTagName('div');
         foreach($b as $l => $row1){
             if(@$row1->attributes[0]->nodeValue == "t"){
                 $c =$row1->getElementsByTagName('p');
                foreach($c as $m=> $row2){
                    print_r($row2->nodeValue);
                    echo "<br>";
                }
             }
         }
  } 
 }
