<?php
/*
Don't remove this!
This system is built on great enthusiasm and can be changed by any developer. Many thanks to everyone who participated and helped develop the notification system.
Built with Bootstrap4, HTML, CSS, JS, Telegram API.
Special thanks to "Adam_Sboev".
For all questions and wishes of TG - @kynya00.
*/
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <title>Заявки</title>
  <link rel="shortcut icon" href="/photo/logo.ico" type="image/x-icon">
  <style>
    .custom-file-input ~ .custom-file-label::after {
      content: "Обзор";
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
      <img src="photo/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"> Администрирование республиканского онкологического диспансера</a>
  </nav>
  <div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4" align="center">Модифицированная и улучшенная система отправки заявки</h1>
        <p class="lead" align="center">Данная система позволяет быстро, легко и доступно отправить заявку программисту для решения той или иной проблемы.</p>
      </div>
    </div>
  </div>
  <form action="functions.php" method="POST" enctype="multipart/form-data">
    <div class="container-md">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="family">Фамилия</label>
          <input required pattern="^[А-Яа-яЁё\s]+$" name="family" type="text" class="form-control" id="family" placeholder="Например, Иванов" autocomplete="off">
        </div>
        <div class="form-group col-md-6">
          <label for="name">Имя</label>
          <input required pattern="^[А-Яа-яЁё\s]+$" name="name" type="text" class="form-control" id="name" placeholder="Например, Иван" autocomplete="off">
        </div>
        <div class="form-group col-md-6">
          <label for="cabinet">Кабинет</label>
          <input required pattern="[0-9\s-+_\.\(\)\[\]]{1,10}" name="cabinet" type="text" class="form-control" id="cabinet" placeholder="Например, 4.04" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label for="phone">Номер телефона</label>
        <input required pattern="[0-9]{10,11}" name="phone" type="text" class="form-control" id="phone" placeholder="Например, 89061241919" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="textarea">Ваша проблема? Опишите подробнее.</label>
        <textarea required name="textarea" class="form-control" id="textarea" placeholder="Например, у меня сломался принтер" rows="3" autocomplete="off"></textarea>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Загрузить</span>
        </div>
        <div class="custom-file">
          <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01" accept="image/*" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
          <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
        </div>
      </div>

      <input name="send" type="submit" value="Отправить" class="btn btn-primary" />
    </div>
  </form>

  <footer class="p-3 mt-4 bg-light text-dark">
    <div class="container">
      <p class="float-right">
        <a href="index.php">Back to top</a>
      </p>
      <p>Содержимое этой страницы предоставляется на условиях следующей лицензии <a href="https://directory.fsf.org/wiki/License:CC0">CC0 (Creative Commons CC0)</a> &copy; @kynya00</p>
      <p>Ознакомиться с данной лицензией Вы можете на <a href="https://directory.fsf.org/wiki/License:CC0">данном сайте.</a></p>
    </div>
  </footer>

</body>

</html>