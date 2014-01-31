---
layout: post
title:  "Groonga http サーバへ php でアクセスするライブラリ書いてる"
date:   2014-01-31 11:22
---

[nise-nabe/groonga-http-php](https://github.com/nise-nabe/groonga-http-php)


| コマンド        | 実装済みか |
|-----------------|------------|
| cache_limit     |            |
| check           |            |
| clearlock       |            |
| column_create   | o          |
| column_list     |            |
| column_remove   |            |
| column_rename   |            |
| define_selector |            |
| defrag          |            |
| delete          |            |
| dump            |            |
| load            | o          |
| log_level       |            |
| log_put         |            |
| log_reopen      |            |
| normalize       |            |
| quit            |            |
| register        |            |
| ruby_eval       |            |
| ruby_load       |            |
| select          | o          |
| shutdown        |            |
| status          | o          |
| suggest         |            |
| table_create    | o          |
| table_list      | o          |
| table_remove    | o          |
| tokenize        |            |
| truncate        | o          |

## インストール

composer でインストールする

composer.json
```
{
	"repositories": [
		{
			"type": "package",
			"package": {
				"name": "nise-nabe/groonga-http-php",
				"version": "dev-master",
				"source" : {
					"url": "git://github.com/nise-nabe/groonga-http-php",
					"type": "git",
					"reference": "master"
				}
			}
		}
	],
	"require": {
		"nise-nabe/groonga-http-php": "dev-master",
		"guzzle/guzzle": "v3.8.0"
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


