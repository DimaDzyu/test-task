<?
require "/vendor/autoload.php";
require "/modules/Article.php";

use flex\article\Article;

$data_twig = array();
if (!empty($_POST['article_author']) && !empty($_POST['article_name']) && !empty($_POST['article_text'])) {

	$arrAddArticle = array(
		'author'	=> $_POST['article_author'],
		'name'		=> $_POST['article_name'],
		'text'		=> $_POST['article_text'],
	);

	$obArticle = new Article();
	if ($obArticle->addArticle($arrAddArticle)) {
		header("Location: /add-article.php?send=true");
	}
}

if ($_GET['send']=='true') {
	$data_twig['Send'] = true;
}

$loader = new Twig_Loader_Filesystem("twig_template");
$twig = new Twig_Environment($loader);
$Form = $twig->render('form.tpl', $data_twig);
?>