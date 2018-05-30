<?
header("Content-type: text/css", true);
class Style{
   private static $language = "style.css";
   function __construct() {
     $css = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/assets/css/".self::$language);
     echo $css;
     die();
   }
}
new Style();