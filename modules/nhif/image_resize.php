<?php

function image_resize($file_name, $width, $height, $crop=true) {
   list($wid, $ht) = getimagesize($file_name);
   $r = $wid / $ht;
   if ($crop) {
      if ($wid > $ht) {
         $wid = ceil($wid-($width*abs($r-$width/$height)));
      } else {
         $ht = ceil($ht-($ht*abs($r-$w/$h)));
      }
      $new_width = $width;
      $new_height = $height;
   } else {
      if ($width/$height > $r) {
         $new_width = $height*$r;
         $new_height = $height;
      } else {
         $new_height = $width/$r;
         $new_width = $width;
      }
   }


   $source = imagecreatefrompng($file_name);

   $dst = imagecreatetruecolor($new_width, $new_height);
   imagecopyresampled($dst, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht);
   return $dst;
}

//define("image", "/home/israel/Downloads/signature47757.jpg");

//$img_to_resize = image_resize('./signature47757.jpg', 250, 250);

 




?>