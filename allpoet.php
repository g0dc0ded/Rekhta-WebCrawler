<?php

class fetch_url{
    public static $response;
    public static function start($url,$res_type){
        $opts = [
            "http" => [
                "method" => $res_type,
                "header" => "Accept-language: en\r\n"
            ]
        ];
        $context = stream_context_create($opts);
        // Open the file using the HTTP headers set above
        $response = file_get_contents($url, false, $context);
        self::$response =  $response;
    } 
}
$arr = [
    "url" => "https://www.rekhta.org/poets/rangin-saadat-yaar-khan"
];
fetch_url::start($arr["url"],"GET");
$htmldoc = new DOMDocument();
@$htmldoc->loadHTML(fetch_url::$response);
$a = $htmldoc->getElementsByTagName('ul');
echo "<pre>";
foreach ($a as $k => $row) {
    if (strpos(@$row->attributes[0]->nodeValue, "searchCategory") !== false) {
        $b = $row->getElementsByTagName('li');
        foreach ($b as $l => $row1) {
            // echo "real link=>" . $row1->firstChild->attributes[0]->value;
            //echo "<br>";
            //print_r($row1->firstChild->firstChild->nodeValue);
            foreach ($row1->firstChild->childNodes as $row3) {
                if ($row3->nodeName == "span") {
                    echo  $row1->firstChild->firstChild->nodeValue . "=>" . $row3->nodeValue;
                    echo "<br>";
                    echo "real link=>" . $row1->firstChild->attributes[0]->value;
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    // print_r($row3->nodeValue);
                }
            }
        }
    }
}
