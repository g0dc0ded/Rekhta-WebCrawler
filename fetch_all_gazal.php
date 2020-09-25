<?php
class fetch_url
{
    public static function start()
    {
        $response = file_get_contents("https://www.rekhta.org/poets/abdul-ghafoor-nassakh/ghazals");
        return $response;
    }
}
class scraping
{
    public static function start()
    {
        $response  = fetch_url::start();
        $htmldoc = new DOMDocument();
        @$htmldoc->loadHTML($response);
        echo "<pre>";
        $a = $htmldoc->getElementsByTagName('div');
        foreach ($a as $k => $row) {
            if (strpos($row->attributes[0]->nodeValue, "contentListItemsMedia") !== false) {
                foreach ($row->childNodes as $l => $row1) {
                    if (!empty(@$row1->attributes)) {

                        foreach (@$row1->attributes as $row3) {

                            if (@$row3->nodeName == "href") {
                                $url  = @$row3->value;
                                //echo "<br>";
                                fetch_gazal::start($url);
                            }
                        }
                    }
                }
            }
        }
    }
}
scraping::start();


class fetch_gazal
{
    public static function start($url)
    {
        //https://www.rekhta.org/ghazals/is-nahiin-kaa-koii-ilaaj-nahiin-dagh-dehlvi-ghazals
        $response = file_get_contents($url);
        $htmldoc = new DOMDocument();
        @$htmldoc->loadHTML($response);
        $a = $htmldoc->getElementsByTagName('div');
        $arr =[];
        echo "<pre>";
        foreach ($a as $k => $row) {
            // print_r(@$row->attributes[1]->name);
            if (@$row->attributes[1]->nodeValue == "on") {
                $b = $row->getElementsByTagName('div');
                foreach ($b as $l => $row1) {
                    if (@$row1->attributes[0]->nodeValue == "c") {
                        $c = $row1->getElementsByTagName('p');
                        foreach ($c as $m => $row2) {
                            array_push($arr , $row2->nodeValue);
                           // print_r($row2->nodeValue);
                            //echo "<br>";
                        }
                    }
                }
            }
        }
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        foreach ($a as $k => $row) {
            // print_r(@$row->attributes[1]->name);
            if (@$row->attributes[1]->nodeValue == "on") {
                $b = $row->getElementsByTagName('div');
                foreach ($b as $l => $row1) {
                    if (@$row1->attributes[0]->nodeValue == "t") {
                        $c = $row1->getElementsByTagName('p');
                        foreach ($c as $m => $row2) {
                            print_r($row2->nodeValue);
                            echo "<br>";
                        }
                    }
                }
            }
        }
        print_r($arr);
    }
    
}
