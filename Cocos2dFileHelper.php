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

use yii\helpers\FileHelper;

/**
 * FileHelper for the cocos2d-html5
 *
 * @author Skliar Ihor <skliar.ihor@gmail.com>
 * @since 1.0
 */
class Cocos2dAsset extends FileHelper
{
    public static function foreachFile($dir, $handler, $recursive = false)
    {
        if (!is_dir($dir)) {
            return;
        }

        if (isset($options['traverseSymlinks']) && $options['traverseSymlinks'] || !is_link($dir)) {
            if (!($handle = opendir($dir))) {
                return;
            }

            while (($file = readdir($handle)) !== false) {
                if ($file === '.' || $file === '..') {
                    continue;
                }

                $path = $dir . DIRECTORY_SEPARATOR . $file;

                if (is_dir($path) && $recursive) {
                    self::foreachFile($path, $handler, $recursive);
                } else {
                    call_user_func($handler, $path);
                }
            }
            closedir($handle);
        }
    }
}
