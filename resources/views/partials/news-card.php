<script id="template" type="x-tmpl-mustache">
  {{ #. }}
    <article class="news-item hidden">
      <div>
          <a href="medio/{{ feed.slug }}" class="medium">{{ feed.title }}</a>
      </div>
      <a class="title link js-news-item-link" data-href="{{ permalink }}"
          data-readability="http://www.readability.com/m?url={{ permalink }}"
          href="{{ permalink }}">
          {{{ title }}}
      </a>
      <div class="description">
          {{{ intro }}}
      </div>
      <time class="time" datetime="{{ datetime }}">{{ date }}</time>
    </article>
  {{ /. }}
</script>
