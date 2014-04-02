---
layout: post
title:  "RequireJS を使った時に jquery プラグインを使う方法"
date:   2014-04-02 11:57
---

こんな感じでよいらしい？

つまり それぞれ paths で指定した上で shim に jquery を記述し， requirejs では読み出すだけでそのまま呼び出すことはないので引き数に渡さないという感じ:．

```
requirejs.config({
  baseUrl : '/js',
  paths: {
    jquery:   ['jquery-1.7.2.min'],
    mustache: ['jquery.mustache.min'],
    fancybox: ['jquery.fancybox-1.3.4']
  },
  shim: {
    mustache: ['jquery'],
    fancybox: ['jquery']
  }
});

requirejs(['jquery', 'mustache', 'fancybox'], function($) {
  $.ajax({
    url: '/test.json'
  }).done(function(ret) {
    var html = $.mustache($('#some-tmpl').html(), ret);
    $('#content').html(html);
  });

  $(document).on('click', 'a', function(event) {
    $.fancybox({ href: $(this).attr('href') });
  });
});
```
