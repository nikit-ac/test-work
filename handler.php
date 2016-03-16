<?php
if ($fp = fopen('file.csv', 'r')) {
  while ($phrase_arr = fgetcsv($fp, 1000, ";")) {
    foreach ($phrase_arr as $phrase) {
      if ($phrase) {
        $phrases [] = $phrase;
      }
    }
  }
}
fclose($fp);


echo "<pre>";
print_r($phrases);
die();




?>