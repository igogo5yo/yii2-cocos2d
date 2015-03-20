Cocos2d-html5 for Yii 2
=====================================

This is the Cocos2d-html5 extension for Yii 2. It have AssetBundle for including [Cocos2d-html5](http://cocos2d-x.org/) to your Yii 2 web application.

Please submit issue reports and pull requests to the main repository.
For license information check the [LICENSE](LICENSE.md)-file.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist igogo5yo/yii2-cocos2d
```

or add

```
"igogo5yo/yii2-cocos2d: ">=1.0"
```

to the require section and change your minimum-stability option to

```
"minimum-stability": "dev",
```

in your `composer.json` file

Usage
----

For using this extension you may add in to your AssetBundle depends:

```php
    public $depends = [
        'igogo5yo\cocos2d\Cocos2dAsset'
    ];
```

or register it self in your View:

```php
	igogo5yo\cocos2d\Cocos2dAsset::register($this);
```
