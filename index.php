<!DOCTYPE HTML>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Тестовое</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/my.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/jquery-2.2.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/my.js" type="text/javascript"></script>
  </head>
  <body>
    <!-- <form enctype="multipart/form-data" method="post" class="form-horizontal"> -->
    <div class="container">
      <form>
        <legend>Форма для ввода данных</legend>
          <?php
          for ($i=0; $i < 10; $i++) {
            echo  '<p><input type="text" onfocus="hideMessage()" name=phrase'.$i.'></p>';
          }
          ?>
        <button class="btn btn-inverse" type="reset" onclick="hideMessage()">Очитсить</button>
        <button class="btn btn-primary" onclick="sendAjax()" id="send-ajax">Добавить</button>
        <span class="text-success hide-span" id="data-success">Данные добавлены</span>
        <span class="text-danger hide-span" id="data-error">Ошибка добавления данных</span>
      </form>

      <p>Либо выберете файл .csv</p>
      <form action="load.php" method="post" enctype="multipart/form-data">
      <input type="file" name="uploadfile" accept=".csv">
      <input type="submit" value="Загрузить"></form>
      <b><?= $_GET['answer'] ?></b>
      <hr/>
      <form action="handler.php" method="post" enctype="multipart/form-data">
        <label class="radio">
          <p><input type="radio" name="param" value="full" checked>Точное совпадение</p>
          <p><input type="radio" name="param" value="part">Частичное совпадение</p>
        </label>
        <input type="submit" value="Удалить дубликаты">
      </form>

    </div>




  </body>
</html>

