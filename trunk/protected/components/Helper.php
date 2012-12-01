<?php

/*
 * Helper Function v 1
 */

class Helper {

    public function __construct($array = null) {
        if (!empty($array)) {
            foreach ($array as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    // Validate Email
    public static function validateEmail($params) {
        $result = true;
        if (!filter_var($params, FILTER_VALIDATE_EMAIL) || $params == null) {
            $result = false;
        }
        return $result;
    }

    // Validate IP
    public static function validateIP($params) {
        $result = true;
        if (!filter_var($params, FILTER_VALIDATE_IP) || $params == null) {
            $result = false;
        }
        return $result;
    }

    // Validate Null
    public static function validateNull($params) {
        $result = true;
        if (empty($params) || $params == null) {
            $result = false;
        }
        return $result;
    }

    // validate En Number
    public static function validateEnNumber($params) {
        $result = true;
        if (!preg_match('/^[a-zA-Z0-9]+$/i', $params)) {
            $result = false;
        }
        return $result;
    }

    // validate Number 
    public static function validateNumber($params) {
        $result = true;
        if (is_numeric($params)) {
            $result = false;
        }
        return $result;
    }

    // validate TH 
    public static function validateTH($params) {
        $result = true;
        $string = iconv('UTF-8', 'TIS-620', $params);
        if (!preg_match('/^[ก-ฮ๐-๙]+$/i', $params)) {
            $result = false;
        }
        return $result;
    }

    //  Post
    public static function getPost($name, $defaultValue = null) {
        return isset($_POST[$name]) ? $_POST[$name] : $defaultValue;
    }

    //  Get
    public static function getGet($name, $defaultValue = null) {
        return isset($_GET[$name]) ? $_GET[$name] : $defaultValue;
    }

    /* Get Token For Account 
     * Helper::genToken();
     */

    public static function genToken($len = 32, $md5 = true) {

        # Seed random number generator
        # Only needed for PHP versions prior to 4.2
        mt_srand((double) microtime() * 1000000);

        # Array of characters, adjust as desired
        $chars = array(
            'Q', '@', '8', 'y', '%', '^', '5', 'Z', '(', 'G', '_', 'O', '`',
            'S', '-', 'N', '<', 'D', '{', '}', '[', ']', 'h', ';', 'W', '.',
            '/', '|', ':', '1', 'E', 'L', '4', '&', '6', '7', '#', '9', 'a',
            'A', 'b', 'B', '~', 'C', 'd', '>', 'e', '2', 'f', 'P', 'g', ')',
            '?', 'H', 'i', 'X', 'U', 'J', 'k', 'r', 'l', '3', 't', 'M', 'n',
            '=', 'o', '+', 'p', 'F', 'q', '!', 'K', 'R', 's', 'c', 'm', 'T',
            'v', 'j', 'u', 'V', 'w', ',', 'x', 'I', '$', 'Y', 'z', '*'
        );

        # Array indice friendly number of chars; empty token string
        $numChars = count($chars) - 1;
        $token = '';

        # Create random token at the specified length
        for ($i = 0; $i < $len; $i++)
            $token .= $chars[mt_rand(0, $numChars)];

        # Should token be run through md5?
        if ($md5) {

            # Number of 32 char chunks
            $chunks = ceil(strlen($token) / 32);
            $md5token = '';

            # Run each chunk through md5
            for ($i = 1; $i <= $chunks; $i++)
                $md5token .= md5(substr($token, $i * 32 - 32, 32));

            # Trim the token
            $token = substr($md5token, 0, $len);
        } return $token;
    }

    /* Yii Register File Function
      Helper::register($file);
     */

    public static function register($file) {
        if (strpos($file, 'js') !== false) {
            return Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/' . $file);
        } else if (strpos($file, 'css') !== false) {
            return Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/' . $file);
        }
    }



    /*  Redirect with time delay
     *    Helper::redir("home",3);
     */

    public static function redir($link, $delay = 0) {
        header('Refresh: ' . $delay . '; url=' . $link . '');
    }

    /*  Import Yii Controllers 
     *    Helper::YiiImport("NameController");
     */

    public static function YiiImport($controller) {
        Yii::import('application.controllers.' . $controller);
    }

    /*  debug Console 
     *    Helper::debugConsole("NameController",$type = "json" );
     */

    public static function debugConsole($str, $type = "default") {
        if ($type == "default") {
            echo "<script type=\"text/javascript\">";
            echo "console.log($str);";
            echo "</script>";
        } else if ($type == "json") {
            $str = CJSON::encode($str);
            echo "<script type=\"text/javascript\">";
            echo "console.log($str);";
            echo "</script>";
        }
    }

    function _mirrorImage ( $imgsrc)
    {
        $width = imagesx ( $imgsrc );
        $height = imagesy ( $imgsrc );

        $src_x = $width -1;
        $src_y = 0;
        $src_width = -$width;
        $src_height = $height;

        $imgdest = imagecreatetruecolor ( $width, $height );

        if ( imagecopyresampled ( $imgdest, $imgsrc, 0, 0, $src_x, $src_y, $width, $height, $src_width, $src_height ) )
        {
            return $imgdest;
        }

        return $imgsrc;
    }

    function adjustPicOrientation($full_filename){
        $exif = exif_read_data($full_filename);
        if($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
            if($orientation != 1){
                $img = imagecreatefromjpeg($full_filename);

                $mirror = false;
                $deg    = 0;

                switch ($orientation) {
                    case 2:
                        $mirror = true;
                        break;
                    case 3:
                        $deg = 180;
                        break;
                    case 4:
                        $deg = 180;
                        $mirror = true;
                        break;
                    case 5:
                        $deg = 270;
                        $mirror = true;
                        break;
                    case 6:
                        $deg = 270;
                        break;
                    case 7:
                        $deg = 90;
                        $mirror = true;
                        break;
                    case 8:
                        $deg = 90;
                        break;
                }
                if ($deg) $img = imagerotate($img, $deg, 0);
                if ($mirror) $img = _mirrorImage($img);
                $full_filename = str_replace('.jpg', "-O$orientation.jpg",  $full_filename);
                imagejpeg($img, $full_filename, 95);
            }
        }
        return $full_filename;
    }


}
