<?php
if (substr(strrchr($_FILES['uploadfile']['name'], '.'), 1) == csv) {

  if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $_FILES['uploadfile']['name'])){
  // Передать фразу в index.php "Файл успешно загружен"
  header('Location: index.php?answer=Файл успешно загружен');

  } else{
    // Передать фразу в index.php "Ошибка при загрузке файла"
  header('Location: index.php?answer=Ошибка при загрузке файла');

  }
} else {
     // Передать фразу в index.php "Неверное расшиерние файла"
  header('Location: index.php?answer=Неверное расшиерние файла');

}

?>
