---
layout: post
title:  "Groonga http サーバへ php でアクセスするライブラリ書いた"
date:   2014-01-31 11:22
---

github [nise-nabe/groonga-http-php](https://github.com/nise-nabe/groonga-http-php)

packagist [nise-nabe/groonga-http-php](/https://packagist.org/packages/nise-nabe/groonga-http-php)

## インストール

composer でインストールする

composer.json

```
{
	"require": {
		"nise-nabe/groonga-http-php": "v0.8.0",
	}
}
```

```
$ composer install
```

### 使い方

```
$client = \Groonga\Http\Client('http://localhost:10041');
$response = $client->select('User'); # json_decode() された結果が返ってくる
```

このままだと使いにくいので連想配列に変換したものを返すクライアントクラス ExClient を書いてる．

```
$client = \Groonga\Http\ExClient('http://localhost:10041');
$response = $client->select('User'); #  下記形式のように返す
// array(
//     'count' => int,
//     'columns' => array
//     'data' => array # column => value の連想配列
// )
```


