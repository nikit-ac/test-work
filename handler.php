<?php
if ($fp = fopen('file.csv', 'r')) {
  while ($phrase_arr = fgetcsv($fp, 1000, ";")) {
    foreach ($phrase_arr as $phrase) {
      if ($phrase) {
        $phrases [] = iconv("WINDOWS-1251", "utf-8", $phrase);// или одно не то или другое
      }
    }
  }
  fclose($fp);
}

if ($_POST['param'] == "full") {
  $phrases = array_unique($phrases);
}

if ($_POST['param'] == "part") {
  foreach ($phrases as $phrase_number => $phrase) {
    $words = explode(" ", $phrase);
    foreach ($words as $word_number => $word) {
      $words_matrix [$word_number][$phrase_number] = $word;
      $phrase_matrix [$phrase_number][$word_number] = $word;
    }
  }

  foreach ($words_matrix as $number => $word_number) {
    $matrix_unique [$number] = array_unique($word_number);
  }

  foreach ($matrix_unique as $word_number => $word_phrases) {
    foreach ($word_phrases as $phrase_number => $word) {
      $final_matrix [$phrase_number][$word_number] = $word;
    }
  }
  ksort($final_matrix);

  foreach ($final_matrix as $phrase_number => $phrases) {
    $diff_count [$phrase_number] = count($phrases);
  }

  $count = $_POST['count'];
  $count = 2;
  foreach ($diff_count as $phrase_number => $value) {
    if ($value <= $count) {
      $unique_phrase = $phrase_matrix[$phrase_number];



      $unique_phrases [] = implode(" ", $unique_phrase);
    }
  }

}



echo "<pre>";
print_r($unique_phrases);
die();




?>