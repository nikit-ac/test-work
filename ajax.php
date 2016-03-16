<?php
  $data = json_decode($_POST[data]);
  $answer = 0;
  $fp = fopen('file.csv', 'a');
  foreach ($data as $phrase) {
    if ($phrase) {
      $phrase = array($phrase);
      fputcsv($fp, $phrase);
      $answer = 1;
    }
  }
  fclose($fp);
  echo $answer;
?>