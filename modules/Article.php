<?php 
namespace flex\article;

/**
 * Class ModelLikbetLottery
 *
 * Class to work with article
 *
 * @author Dima Dzyubenko
 * @version 1.0
 */

class Article
{
	private $ob_pdo; 

	function __construct()
	{
		$this->ob_pdo = new \PDO('mysql:host=;dbname=test;charset=utf8', 'root', '');
	}

	/**
     * Добавить статью
     *
     * @param array $data Массив данный для добавления
     * @return bool Статус добавления
     */
    public function addArticle($data = array())
    {
    	//Проверка на существование пользователя
    	$stmt = $this->ob_pdo->prepare('SELECT * FROM `user` WHERE name=:name');
    	$stmt->bindValue(':name', $data['author'], \PDO::PARAM_STR);
		$stmt->execute();
		$user = $stmt->fetch(\PDO::FETCH_ASSOC);

		//Добавление пользователя если не существует
		if ($user['id'] > 0) {
			$user_add = $user['id'];
		} else {
			$stmt = $this->ob_pdo->prepare('INSERT INTO `user` (`name`,  `date_added`) VALUES (:author, NOW())');
			$stmt->bindValue(':author', $data['author'], \PDO::PARAM_STR);
			$stmt->execute();
			$user_add = $this->ob_pdo->lastInsertId();
		}

		//Добавление статьи
		$stmt = $this->ob_pdo->prepare('INSERT INTO `articles`(`user_id`, `name`, `text`, `date_added`) VALUES (:user_add, :name, :text_ar, NOW())');
		$stmt->bindValue(':user_add', $user_add, \PDO::PARAM_INT);
		$stmt->bindValue(':name', $data['name'], \PDO::PARAM_STR);
		$stmt->bindValue(':text_ar', $data['text'], \PDO::PARAM_STR);
		$stmt->execute();

    	return true;
    }

    /**
     * Список статей
     *
     * @param array $data Массив данный для добавления
     * @return array $result Список статей и пагинация
     */
	public function getArticle($data = array())
	{
		$result = array();
		$num = $data['limit'];
		$page = $data['page'];

		// Определяем общее число сообщений в базе данных
		$stmt = $this->ob_pdo->prepare('SELECT * FROM `articles`');
		$stmt->execute();
		$articles_count = $stmt->rowCount();
		if ($articles_count == 0) {
			$result['articles'] = array();
			$result['page'] = 1;
			$result['total'] = 1;
			return $result;
		}

		// Находим общее число страниц  
		$total = intval(($articles_count - 1) / $num) + 1;
		$page = intval($page);

		//На первую страницу
		if (empty($page) or $page < 0) {
			$page = 1; 
		}

		//На последнюю страницу
		if($page > $total) {
			$page = $total;
		}

		//Выборка статей и пользователя с условием пагинации
		$start = $page * $num - $num;
		$stmt = $this->ob_pdo->prepare("SELECT articles.*, user.name as name_user FROM `articles` LEFT JOIN `user` ON (articles.user_id = user.id) ORDER BY articles.".$data['order']." ".$data['order_by']." LIMIT :start, :num");
		$stmt->bindValue(':start', $start, \PDO::PARAM_INT);
		$stmt->bindValue(':num', $num, \PDO::PARAM_INT);
		$stmt->execute();
		$articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$result['page'] = $page;
		$result['total'] = $total;

		//Группирование по пользователям
		$articles_group = array();
		foreach ($articles as $key => $value) {
			$result['articles'][$value['user_id']]['item'][] = $value;
			$result['articles'][$value['user_id']]['name'] = $value['name_user'];
		}

		return $result;
	}
}
?>