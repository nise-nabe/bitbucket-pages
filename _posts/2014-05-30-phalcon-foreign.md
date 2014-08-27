---
layout: post
title:  "Phalcon のリレーションについて"
date:   2014-01-23 8:35:47
---

 
例えば下記のようなリレーションを考慮したスキーマを考える．

```
CREATE user (
  id    INT(11)      NOT NULL  AUTO_INCREMENT,
  name  VARCHAR(256) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARASET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tweet (
  id      INT(11)      NOT NULL  AUTO_INCREMENT,
  body    VARCHAR(256) NOT NULL,
  user_id INT(11)      NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARASET=utf8 COLLATE=utf8_unicode_ci;)
```

これを Phalcon 上の Model で表すと下記のようになる.

```php

namespace Timeline\Model;

use Phalcon\Mvc\Model;

class User extends Model
{
    public function initialize()
    {
        $this->hasMany('id', 'Timeline\Model\Tweet', 'user_id', array('alias' => 'tweets'));
    }
}
```

```php

namespace Timeline\Model;

use Phalcon\Mvc\Model;

class Tweet extends Model
{
    public function initialize()
    {
        $this->belongsTo('user_id', 'Timeline\Model\User', 'id', array('alias' => 'user'));
    }
}
```

```
    {% for tweet in user.tweets %}
        {{ tweet.body }}
    {% endfor %}
```
