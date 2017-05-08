{% if articles is not empty %}
  <div class="box_article">
    {% for author_key, author_value in articles %}
      <div class="block_author">
        <p class="name_author">{{ author_value.name }}</p>
        {% for article_key, article_value in author_value.item %}
        <div class="block_article">
          <p class="article_name">{{ article_value.name }}</p>
          <p class="article_text">{{ article_value.text | raw }}</p>
          <p class="article_date">{{ article_value.date_added }}</p>
          </div>
        {% endfor %}     
      </div>
    {% endfor %}
  </div>
  {% if total > 1 %}
  <ul class="pagination">
    {% if page != 1 %}
    <li><a href="/?page=1">&laquo;</a></li>
    {% endif %}
    {% if page - 2 > 0 %}
      <li><a href="/?page={{ page-2 }}">{{ page-2 }}</a></li>
    {% endif %}
    {% if page - 1 > 0 %}
      <li><a href="/?page={{ page-1 }}">{{ page-1 }}</a></li>
    {% endif %}
       <li class="active"><a href="/?page={{ page }}">{{ page }}</a></li>
    {% if page + 1 <= total %}
      <li><a href="/?page={{ page + 1 }}">{{ page + 1 }}</a></li>
    {% endif %}
    {% if page + 2 <= total %}
      <li><a href="/?page={{ page + 2 }}">{{ page + 2 }}</a></li>
    {% endif %}
    {% if page != total %}
    <li><a href="/?page={{ total }}">&raquo;</a></li>
    {% endif %}
  </ul>
  {% endif %}
{% else %}
  <div class="box_article">
    Ни одной статьи не найдено.
  </div>
{% endif %}