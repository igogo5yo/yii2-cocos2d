<?php
/*
 * This file is part of the igogo5yo project.
 *
 * (c) igogo5yo project <http://github.com/igogo5yo/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace igogo5yo\cocos2d;

use yii\web\AssetBundle;
use yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;

/**
 * Asset bundle for the cocos2d-html5
 *
 * @author Skliar Ihor <skliar.ihor@gmail.com>
 * @since 1.0
 */
class Cocos2dAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $sourcePath = '@bower/cocos2d-html5';
    public $css = [
    ];

    public $js = [
        'CCBoot.js'
    ];

    public $cocosSrcPath = '@webroot/js/cocos_src';
    public $cocosConfig = [
        "jsList" => [],
        "project_type" => "javascript",
        "debugMode" => 1,
        "showFPS" => true,
        "frameRate" => 60,
        "id" => "gameCanvas",
        "renderMode" => 0,
        "engineDir" => "",
        "modules" => ["cocos2d"]
    ];

    public function init()
    {
        parent::init();

        $basePath = Yii::getAlias($this->basePath);
        $cocosSrcPath = Yii::getAlias($this->cocosSrcPath, 755, true);

        if (!file_exists($cocosSrcPath)) {
            FileHelper::createDirectory($cocosSrcPath);
        }

        $pathes = FileHelper::findFiles($cocosSrcPath);
        foreach ($pathes as $k => $v) {
            $pathes[$k] = str_replace($basePath . DIRECTORY_SEPARATOR, '', $v);
        }
        
        $this->cocosConfig[ 'engineDir' ] = Yii::$app->assetManager->getPublishedUrl( $this->sourcePath );
        $this->cocosConfig[ 'jsList' ] = $pathes;

        file_put_contents( $basePath . '/project.json', Json::encode( $this->cocosConfig ) );
    }
}
