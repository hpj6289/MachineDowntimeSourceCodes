<?php
$target_url="//";
error_reporting(E_ALL ^ E_DEPRECATED);
$server="localhost";
$username="root";
$password="";
$connect_mysql=mysql_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysql_select_db("random",$connect_mysql) or die ("Could not Connect to Database");
function storeLink($url,$gathered_from) {
	$query = "INSERT INTO finalproject3 (url, gathered_from) VALUES ('$url', '$gathered_from')";
	mysql_query($query) or die('Error, insert query failed');
}
$url = 'http://localhost/Synopsys/Page3.php';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
//echo $result;

$dom = new DOMDocument();
@$dom->loadHTML($result);

$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");
for ($i = 0; $i < $hrefs->length; $i++) {
	$href = $hrefs->item($i);
	$url = $href->getAttribute('href');
	storeLink($url,$target_url);
	echo "<br />Link stored: $url";
}

?>