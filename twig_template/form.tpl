 {% if Send %}
  <p class="text_after_add">Ваша статья была добавлена.</p>
  <a href="/add-article.php">Добавить ещё</a>
 {% else %}
  <form role="form" action="/add-article.php" method="post">
    <div class="form-group">
      <label for="article_author">Автор статьи</label>
      <input type="text" class="form-control" id="article_author" name="article_author" placeholder="Автор" required>
    </div>
    <div class="form-group">
      <label for="article_name">Название статьи</label>
      <input type="text" class="form-control" id="article_name" name="article_name" placeholder="Название" required>
    </div>
    <div class="form-group">
      <label for="article_text">Напишите содержание статьи</label>
      <textarea class="form-control" id="article_text" name="article_text" rows="5" placeholder="Текст" required></textarea>
    </div>
    <div class="form-group">
      <p class="help-block">* Все поля обязательны для заполнению</p>
    </div>
    <button type="submit" class="btn btn-primary">Добавить</button>
  </form>
{% endif %}