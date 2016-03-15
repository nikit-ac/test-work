<!DOCTYPE HTML>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Тестовое</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/jquery-2.2.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/my.js" type="text/javascript"></script>
  </head>
  <body>
    <!-- <form enctype="multipart/form-data" method="post" class="form-horizontal"> -->
      <legend>Форма для ввода данных</legend>
        <?php
        for ($i=0; $i < 10; $i++) {
          echo  '<p><input type="text" name=phrase'.$i.'></p>';
        }
        ?>
      <button class="btn btn-primary" id="send-ajax">Добавить</button>

      <p>Либо выберете файл .csv</p>
      <p><input type="file" name="file-csv" accept=".csv" >
      <input type="button" value="Отправить"></p>

      <p><input type="radio" name="browser" value="1" checked>Точное совпадение</p>
      <p><input type="radio" name="browser" value="2">Частичное совпадение</p>

     <!--  <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
         А вот вам опция номер один - очень крутая штука.
      </label>
      <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
        Опция два - это нечто другое. Выбрав ее, отменяете первую.
      </label> -->
    </form>




  </body>
</html>