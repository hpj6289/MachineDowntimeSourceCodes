<?php 
 $curl = curl_init();
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_URL, "http://www.localhost/Synopsys/Page3.php");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          $content= curl_exec($curl);
          curl_close($curl);    



          $dom = new DOMDocument();
          @$dom->loadHTML($content);

           $xPath = new DOMXPath($dom);
           $elements = $xPath->query("/html/body/div[1]/table/tbody/tr[1]/th[4]");
            foreach ($elements as $e) {
            echo $e->nodeValue. "<br />";
            }

?>
            
     