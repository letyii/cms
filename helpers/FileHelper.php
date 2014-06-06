<?php

namespace app\helpers;

class FileHelper extends \yii\helpers\FileHelper {

    public static function getExtention($file) {
        if (($ext = pathinfo($file, PATHINFO_EXTENSION)) !== '')
            return strtolower($ext);
        return FALSE;
    }
}
