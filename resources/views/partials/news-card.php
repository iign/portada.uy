<script id="template" type="x-tmpl-mustache">
  {{ #. }}
    <article class="news-item hidden">
      <div>
          <a href="medio/{{ feed.slug }}" class="medium">{{ feed.title }}</a>
      </div>
      <div>
          <a class="title link js-news-item-link" data-href="{{ permalink }}"
              data-readability="http://outline.com/{{ permalink }}"
              href="{{ permalink }}">
              {{{ title }}}
          </a>
      </div>
      <div class="description">
          {{{ intro }}}
      </div>
      <div class="time-wrap">
        <time class="time timeago time-relative" title="{{ created_at }}-0300" datetime="{{ created_at }}-0300">{{ created_at }}</time>
      </div>
    </article>
  {{ /. }}
</script>
