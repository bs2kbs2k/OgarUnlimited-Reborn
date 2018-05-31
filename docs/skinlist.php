<?php
header('Content-Type: text/plain');

$dir = 'skinlist';
$skins = scandir($dir);
foreach($skins as $a){
  if(strpos($a, ".png")){
    if($a[0] != "_" && !empty($a)){
      echo str_replace(".png", "", $a)."\n" ;
    }
  }
}
exit;