<?php
echo "<pre>";
if (substr(strrchr($_FILES['uploadfile']['name'], '.'), 1) == csv) {

  if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $_FILES['uploadfile']['name'])){
  // Передать фразу в index.php "Файл успешно загружен"
    echo "
    <html>
      <head>
        <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
      </head>
    </html>";

  } else{
    // Передать фразу в index.php "Ошибка при загрузке файла"
  }
} else {
     // Передать фразу в index.php "Неверное расшиерние файла"
}

?>
