---
layout: post
title:  "cocos2d-js v3.0-rc2 frameRate が効かない問題について"
date:   2014-01-23 8:35:47
---

cocos2d-js v3.0-rc0 から v3.0-rc2 にバージョンを上げた時に package.json の frameRate が効かなくなっていた．
とりあえず下記イシューで修正されてるので次のバージョンで直っているはず．

> Fixed #2170: fixed not working frameRate setting. by VisualSJ · Pull Request #2173 · cocos2d/cocos2d-html5
>
> https://github.com/cocos2d/cocos2d-html5/pull/2173

## 修正までの流れ

frameRate を 30 にしていても 60 になってしまっている問題を発見．おそらく下記部分あたりだろうなと思ってコード読んでた．

> Fixed #5785: requestAnimFrame doesn't work after re-focus on Samsung mob... · ce4134a · cocos2d/cocos2d-html5
>
> https://github.com/cocos2d/cocos2d-html5/commit/ce4134a9115e0f7a809e2d9e85d8d2fa9079abd4

たぶんこうだろうなと思って修正してみた．
https://twitter.com/nise_nabe/status/504048585021743105

> fixed not working frameRate setting by nise-nabe · Pull Request #2170 · cocos2d/cocos2d-html5
>
> https://github.com/cocos2d/cocos2d-html5/pull/2170

問題は mainLoop ではなく _setup() の方だということでべつの修正をしてもらった．

> Fixed #2170: fixed not working frameRate setting. by VisualSJ · Pull Request #2173 · cocos2d/cocos2d-html5
>
> https://github.com/cocos2d/cocos2d-html5/pull/2173

いまは直ってるはず．
