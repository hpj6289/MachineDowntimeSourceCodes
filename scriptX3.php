<?php

$curl=curl_init();
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_URL,"http:localhost/Synopsys/Page3.php");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$content=curl_exec($curl);
curl_close($curl);
//Now initialiozing the DOM parser basically:-

$dom=new DOMDocument();
@$dom=loadHTML($content);
//Now making use of the web element's XPaths basically actually:-\

$Xpath=new DOMXPath($dom);
//This is done to retrieve all the links that areb there on the HTML web page:-
$elements=$Xpath->query("html/body//a");
//using foreach loop to traverse through the links genrally:-
foreach($elements as $e){

	echo $e->nodeValue()."</br>";
}
