---
layout: post
title:  "Redis 2.8.4 -> 2.8.5 upgrade ログ"
date:   2014-02-09 3:00:00
---

自分は /usr/local/src にソースを取ってきてるのでそこで作業

```
$ redis-cli -v
redis-cli 2.8.4
$ cd /usr/local/src
$ sudo curl -O http://download.redis.io/releases/redis-2.8.5.tar.gz
$ sudo tar xvf redis-2.8.5.tar.gz
$ cd redis-2.8.5
$ sudo make
$ sudo make install
$ redis-cli -v
redis-cli 2.8.5
```
