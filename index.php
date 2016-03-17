<!DOCTYPE HTML>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Тестовое</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/my.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/jquery-2.2.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/my.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
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
          <b><?php if ($_GET) {$_GET['answer'];} ?></b><!--  Доделать -->
          <hr/>
        </div>

        <div class="col-md-4">

        <?php
          if ($_GET) {
            echo "<h4>Таблица значений</h4></hr>";

            if ($_GET['view'] == "file") {
              echo "Данные загружены в <a href='result.csv'>файл</a> ";
            }
            if ($_GET['view'] == "table") {
              $fp = fopen('result.csv', 'r');

              while ($phrase_arr = fgetcsv($fp, "/n")) {
                $phrases [] = $phrase_arr;
              }

             $page = 1;// передать сюда номер страницы

              echo '<table class="table table-bordered">';
              for ($i=0; $i <= 9; $i++) {
                echo "<tr>";
                for ($j=0; $j <= 1; $j++) {
                  $num = $i * 2 + $j + ($page - 1) * 20;
                  if (count($phrases[0]) > $num) {
                    echo "<td>";
                    echo $phrases[0][$num];
                    echo "</td>";
                  }
                }
                echo "</tr>";
              }
              echo '</table>';
              fclose($fp);
            }
          }
        ?>
          <div class="pagination">
            <ul>
              <li class="active"><span>1</span></li>
              <li class="active"><span>2</span></li>
              <li class="active"><span>3</span></li>
            </ul>
          </div>
        </div>
      </div>
      <form action="handler.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4 brd">
            <label class="radio">
              <p><input type="radio" name="param" value="full" onfocus="hideNumber()" checked>Точное совпадение</p>
              <p><input type="radio" name="param" value="part"  onfocus="showNumber()">Частичное совпадение</p>
            </label>
          <div class="control-group hide-span" id="text-diff">
            <label>Максимальное количество различных слов</label>
            <div class="controls">
              <input type="text" id="number-diff" min="1" size="2" onchange="checkNumber(this.value)">
              <span class="help-inline hide-span">Нужно ввести целое число</span>
            </div>
          </div>
          </div>
          <div class="col-md-4 bdr">
            <label class="radio">
              <p><input type="radio" name="result" value="repeating" checked>Показать повторяющиеся фразы</p>
              <p><input type="radio" name="result" value="unique">Показать уникальные фразы</p>
            </label>
          </div>
          <div class="col-md-4 brd">
            <label class="radio">
              <p><input type="radio" name="type" value="view" checked>Вывести на экран</p>
              <p><input type="radio" name="type" value="file">Загрузить в файл</p>
            </label>
          </div>
        </div>
        <input type="submit" value="Удалить дубликаты" id="del" >
      </form>
    </div>
  </body>
</html>

