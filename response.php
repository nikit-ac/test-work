<?php
  $data1 = $_POST[d];
  // $data = explode(",", $data1);
  $data1 = substr($data1, 1);
  $data1 = substr($data1, 0, -1);

echo var_dump($data1);
  // $fp = fopen('file.csv', 'a');
  // foreach ($data as $fields) {
  //   fputcsv($fp, $fields);
  // }
  // fclose($fp);
?>