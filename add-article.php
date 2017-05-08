<?require "/controllers/AddArticle.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Добавление статьи</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="/lib/jquery/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/js/script.js" type="text/javascript"></script>
</head>
<body>
  <div class="main">
    <ul class="nav nav-pills">
      <li><a href="/">Главная</a></li>
      <li class="active"><a href="/add-article.php">Добавление статьи</a></li>
    </ul>
    <h1 class="page_h1">Добавление статьи</h1>
    <div class="block_form_add">
        <?=$Form;?>
    </div>
  </div>
</body>
</html>