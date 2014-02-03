---
layout: post
title:  "ローカルの Docker client からリモートの Docker につなぐ"
date:   2014-01-23 8:35:47
---

### 目的

ローカルマシンの docker コマンドでリモートにある Docker サーバにアクセスする．

モチベーションは Mac がローカルだと Docker サーバが入らないし VirtualBox を用いるとディスクを使いすぎるのでローカルでは使いたくないというもの．

### 構築後の環境

リモートで Docker サーバが tcp でコマンドを受け取れる形で立ち上がっている．
ローカルでは ssh トンネルでリモートの Docker サーバが受けているポートにフォワーディングする．
ローカルの docker コマンドは ssh トンネルでつながっているポートをホストとして設定してコマンドを実行する．


### 環境

ローカル: Mac OSX
リモート: Ubuntu 12.04

### 設定

リモート側で /etc/default/docker に下記のように記述する．
こうすると Docker サーバが unix ソケット以外にも tcp でコマンドを受け取ってくれる．

```
DOCKER_OPTS="-H unix:///var/run/docker.sock -H 0.0.0.0:5555"
```

また，ローカルでは 下記のように DOCKER_HOST 変数を設定しておく．

```
## docker 
export DOCKER_HOST="tcp://localhost:5555"
```

.ssh/config で ssh 接続時にフォワーディングが動くように．

```
Host example.com
  LocalForward 5555 example.com:5555
```

このままだと毎回 ssh しないといけないので起動時に autossh でつながるようにする．
Mac だと Automator でアプリケーションとして保存してログイン時起動の設定を行うと良いらしい．[参考サイト](http://jonsview.com/how-to-automatic-ssh-tunnel)

### 動作確認手順

あとで書く．
