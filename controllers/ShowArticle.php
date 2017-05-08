<?
require "/vendor/autoload.php";
require "/modules/Article.php";

use flex\article\Article;

$data_twig = array();

$data['limit'] = 5;
$data['page'] = $_GET['page'];
$obArticle = new Article();

if ($data_twig = $obArticle->getArticle($data))
	 
$loader = new Twig_Loader_Filesystem("twig_template");
$twig = new Twig_Environment($loader);
$Article = $twig->render('list.tpl', $data_twig);
?>