<?php
class fetch_post_name{
    public static function start($x){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.rekhta.org/PoetCollection?lang=1&pageNumber=$x&Info=classicalpoets&_=1590688848726",
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
    if(strpos( @$row->attributes[0]->nodeValue, "poetNameDatePlace" ) !== false){
        foreach($row->childNodes as $l => $row1){
            if(@$row1->tagName == "a"){
                echo "shayer=>". rtrim(ltrim($row1->nodeValue));
                echo "<br>";
                echo "real_link =>".$row1->attributes[0]->value;
                echo "<br>";echo "<br>";echo "<br>";
                //print_r($row1->attributes[0]->value);
            }
            
        }
    }
    
}

    }
}
for($x=0;$x <= 3;$x++){
  fetch_post_name::start($xs);
}
