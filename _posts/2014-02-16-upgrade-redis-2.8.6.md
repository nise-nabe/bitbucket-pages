---
layout: post
title:  "Redis 2.8.5 -> 2.8.6 upgrade ログ"
---

自分は /usr/local/src にソースを取ってきてるのでそこで作業

```
$ redis-cli -v
redis-cli 2.8.5
$ cd /usr/local/src
$ sudo curl -O http://download.redis.io/releases/redis-2.8.6.tar.gz
$ sudo tar xvf redis-2.8.6.tar.gz
$ cd redis-2.8.6
$ sudo make
$ sudo make install
$ redis-cli -v
redis-cli 2.8.6
```
