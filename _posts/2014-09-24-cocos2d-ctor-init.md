---
layout: post
title:  "cocos2d-js v3.0 では初期化処理を ctor に書く"
date:   2014-09-24 0:34:00
---

cocos2d-js v3.0 では初期化処理を ctor に書く．

init メソッドで下記文言が書かれている場合がある．

```
Initialization of the layer, please do not call this function by yourself, you should pass the parameters to constructor to initialize a layer
```

この文言は例えば下記のようなコミットで追加されている．コミットメッセージからおそらくコンストラクタをうまく使えるように書かれているみたいなのでこちらを使うのが良さそう．

> Doc #5829: Improve constructor definitions and fix issues in Layer's inl... · e3bb3bb · cocos2d/cocos2d-html5
> https://github.com/cocos2d/cocos2d-html5/commit/e3bb3bbc0c12f14b72605a941007018816e32ffa
