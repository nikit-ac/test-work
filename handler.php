<?php
function di($var) //отладка
{
  echo "<pre>";
  print_r($var);
  die();
}

function sendResult($phrases_unique, $phrases_repeating) {
  $fp = fopen('result.csv', 'w');
  if ($_POST['result'] == "unique") {
    fputcsv($fp, $phrases_unique);
  }
  if ($_POST['result'] == "repeating") {
    fputcsv($fp, $phrases_repeating);
  }
  fclose($fp);
  if ($_POST['type'] == "view") {
    header('Location: index.php?view=table');
  }
  if ($_POST['type'] == "file") {
    header('Location: index.php?view=file');
  }
}

if ($fp = fopen('file.csv', 'r')) {
  while ($phrase_arr = fgetcsv($fp)) {
    foreach ($phrase_arr as $phrase) {
      if ($phrase) {
        $phrases [] = iconv("WINDOWS-1251", "utf-8", $phrase);// или одно не то или другое
      }
      if (count($phrases) >= 10000) {
        // Удалить файл
        header('Location: index.php?result=Превышен лимит фраз (10 000)');
      }
    }
  }
  fclose($fp);
}

if ($_POST['param'] == "full") {
  $phrases_unique = array_unique($phrases);
  $phrases_repeating = array_unique(array_diff_key($phrases, $phrases_unique));
  sendResult($phrases_unique, $phrases_repeating);
}

if ($_POST['param'] == "part") {
  foreach ($phrases as $phrase_number => $phrase) {
    $words = explode(" ", $phrase);
    foreach ($words as $word_number => $word) {
      $words_matrix [$word_number][$phrase_number] = $word;
      $phrase_matrix [$phrase_number][$word_number] = $word;
    }
  }

  foreach ($phrase_matrix as $phrase_number => $phrase) {
    $lenght_phrase [$phrase_number] = count($phrase);
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

  foreach ($final_matrix as $phrase_number => $words) {
    $unique_words [$phrase_number] = count($words);
    $diff_words [$phrase_number] = $lenght_phrase [$phrase_number] - $unique_words [$phrase_number];
  }

  $count = $_POST['count'];
  $phrases_unique = array();
  foreach ($unique_words as $phrase_number => $value) {
    if ($value > $count) {
      $phrase_unique = $phrase_matrix[$phrase_number];
      $phrases_unique [$phrase_number] = implode(" ", $phrase_unique);
    }
  }

  $phrases_repeating = array_diff($phrases, $phrases_unique);
  //Удалились уникальное значение которое всязано с повторяющимся

  sendResult($phrases_unique, $phrases_repeating);
}



?>