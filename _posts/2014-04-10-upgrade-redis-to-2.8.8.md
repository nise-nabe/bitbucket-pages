---
layout: post
title:  "2.8.8 install ログ"
date:   2014-01-23 8:35:47
---

### 環境

debian 7

### 手順

```
$ curl -O http://download.redis.io/releases/redis-2.8.8.tar.gz
$ tar xvf redis-2.8.8.tar.gz
$ cd redis-2.8.8
$ make
...
zmalloc.h:50:31: fatal error: jemalloc/jemalloc.h: No such file or directory
compilation terminated.
make[1]: *** [adlist.o] Error 1
make[1]: Leaving directory `/path/to/redis-2.8.8/src'
make: *** [all] Error 2
```

原因はたぶん自分で入れた gcc のせいっぽいので debian のパッケージの gcc を使うように変更．
gcc を自分でビルドしてるといろいろひっかかりそうなので今後気をつける．
（たぶんビルドオプションが足りない？）

```
$ gcc --version
gcc (GCC) 4.8.1
Copyright (C) 2013 Free Software Foundation, Inc.                                                                                                                                  
This is free software; see the source for copying conditions.  There is NO
warranty; not even for MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
$ /usr/bin/gcc --version
gcc (Debian 4.7.2-5) 4.7.2
Copyright (C) 2012 Free Software Foundation, Inc.                                                                                                                                  
This is free software; see the source for copying conditions.  There is NO
warranty; not even for MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
```

続き

```
$ PATH=/usr/bin:$PATH make
```

ビルド成功
