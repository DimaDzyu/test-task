<?require "/controllers/ShowArticle.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="/lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="/lib/jquery/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/js/script.js" type="text/javascript"></script>
</head>
<body>
  <div class="main">
    <ul class="nav nav-pills">
      <li class="active"><a href="/">Главная</a></li>
      <li><a href="/add-article.php">Добавление статьи</a></li>
    </ul>
    <h1>Статьи</h1>
    <div class="block_form_add">
        <?=$Article;?>
    </div>
  </div>
</body>
</html>