<?php

    $site = "test";
    $pages = 32;
    $folder = "myimg";

    mkdir($folder,777);

    for($z=1;$z<$pages;$z++){

      $doc = new DOMDocument();
      if($z == 1){
        $content = file_get_contents("http://".$site.".tumblr.com");
      }else {
        $content = file_get_contents("http://".$site.".tumblr.com/page/".$z);
      }
      $doc->loadHTML($content);
      $imagepaths=array();
      $imageTags = $doc->getElementsByTagName('img');
      var_dump($imageTags);
      foreach($imageTags as $tag) {

          $imagepaths[]=$tag->getAttribute('src');
      }

    
   
     for($i=0;$i<count($imagepaths);$i++){


          $ext = end(explode(".",$imagepaths[$i]));

          $cont = file_get_contents($imagepaths[$i]);

          file_put_contents($folder."/".rand(3123123,312312312312).".".$ext,$cont);

      } 

    }
