<?php
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_URL, "http://localhost/Synopsys/SX3.php");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          $content= curl_exec($curl);
          curl_close($curl);   


          $dom = new DOMDocument();
          @$dom->loadHTML($content);

           $xPath = new DOMXPath($dom);
           $elements = $xPath->query("/html/body/div[2]/div/div[3]/table/tbody/tr[1]/th[3]");
            foreach ($elements as $e) {
            echo $e->nodeValue. "<br />";
            }
           

   ?>