<?php

namespace app\components;

use Yii;

class LetHelper {

    public static function string_to_ascii($string = '') {
        $string = str_replace(array("à", "á", "ạ", "ả", "ã", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ"), "a", $string);
        $string = str_replace(array("À", "Á", "Ạ", "Ả", "Ã", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ"), "A", $string);
        $string = str_replace(array("è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ"), "e", $string);
        $string = str_replace(array("È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ"), "E", $string);
        $string = str_replace("đ", "d", $string);
        $string = str_replace("Đ", "D", $string);
        $string = str_replace(array("ỳ", "ý", "ỵ", "ỷ", "ỹ"), "y", $string);
        $string = str_replace(array("Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ"), "Y", $string);
        $string = str_replace(array("ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ"), "u", $string);
        $string = str_replace(array("Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ"), "U", $string);
        $string = str_replace(array("ì", "í", "ị", "ỉ", "ĩ"), "i", $string);
        $string = str_replace(array("Ì", "Í", "Ị", "Ỉ", "Ĩ"), "I", $string);
        $string = str_replace(array("ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ"), "o", $string);
        $string = str_replace(array("Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ"), "O", $string);
        return $string;
    }

    public static function string_to_url($string = '') {
        $string = self::string_to_ascii($string);
//        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '-', $string);
        $string = strtolower($string);
        $string = preg_replace("/[\/_|+ -]+/", '-', $string);

//        $string = preg_replace('/\s\s+/', '-', $string);
        $string = trim($string, '-');
        return $string;
    }

    /**
     * Get url or path file uploaded
     * @param type $file
     * @param type $type URL | PATH
     * @return type
     */
    public static function getFileUploaded ($file, $type = 'URL') {
        if ($type == 'PATH')
            return Yii::$app->params['uploadPath'] . DIRECTORY_SEPARATOR . Yii::$app->params['uploadDir'] . DIRECTORY_SEPARATOR . $file;
        elseif ($type == 'URL') {
            return Yii::$app->params['uploadUrl'] . '/' . Yii::$app->params['uploadDir'] . '/' . $file;
        }
        return FALSE;
    }
}
