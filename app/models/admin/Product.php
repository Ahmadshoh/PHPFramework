<?php

namespace app\models\admin;

use app\models\AppModel;

class Product extends AppModel
{
    public $attributes = [
        'title' => '',
        'category_id' => '',
        'description' => '',
        'price' => '',
        'visible' => '',
        'recommended' => '',
        'alias' => '',
        'alif_link' => '',
        'amount' => ''
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['category_id'],
            ['price'],
        ],
        'integer' => [
            ['category_id'],
        ],
    ];

    public function uploadImg($name, $wmax, $hmax){
        $uploaddir = WWW . '/images/';
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'])); // расширение картинки
        $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
        if($_FILES[$name]['size'] > 1048576){
            $res = array("error" => "Ошибка! Максимальный вес файла - 1 Мб!");
            exit(json_encode($res));
        }
        if($_FILES[$name]['error']){
            $res = array("error" => "Ошибка! Возможно, файл слишком большой.");
            exit(json_encode($res));
        }
        if(!in_array($_FILES[$name]['type'], $types)){
            $res = array("error" => "Допустимые расширения - .gif, .jpg, .png");
            exit(json_encode($res));
        }
        $new_name = md5(time()).".$ext";
        $uploadfile = $uploaddir.$new_name;
        if(@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile)){
            if($name == 'single'){
                $_SESSION['single'] = $new_name;
            }else{
                $_SESSION['multi'][] = $new_name;
            }
            self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
            $res = array("file" => $new_name);
            exit(json_encode($res));
        }
    }

//    public static function resize($target, $dest, $wmax, $hmax, $ext){
//        list($w_orig, $h_orig) = getimagesize($target);
//        $ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная
//
//        if(($wmax / $hmax) > $ratio){
//            $wmax = $hmax * $ratio;
//        }else{
//            $hmax = $wmax / $ratio;
//        }
//
//        $img = "";
//        // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
//        switch($ext){
//            case("gif"):
//                $img = imagecreatefromgif($target);
//                break;
//            case("png"):
//                $img = imagecreatefrompng($target);
//                break;
//            default:
//                $img = imagecreatefromjpeg($target);
//        }
//        $newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
//
//        if($ext == "png"){
//            imagesavealpha($newImg, true); // сохранение альфа канала
//            $transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
//            imagefill($newImg, 0, 0, $transPng); // заливка
//        }
//
//        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
//        switch($ext){
//            case("gif"):
//                imagegif($newImg, $dest);
//                break;
//            case("png"):
//                imagepng($newImg, $dest);
//                break;
//            default:
//                imagejpeg($newImg, $dest);
//        }
//        imagedestroy($newImg);
//    }

}