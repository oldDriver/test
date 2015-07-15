<?php
namespace src\services;
use src\models\User;
use lib\Debug;

class ImageService
{
    const IMAGE_RATIO = 1.25;
    
    const THUMBNAIL_WIDTH = 150;

    public static function uploadUserPhoto(User $user, $file)
    {
        if (!$file['error']) {
            $filename = $file['tmp_name'];
            $imagesize = getimagesize($filename);
            $image = self::createImage($filename);
            $path = self::createPath($user);
            self::saveImage($image, $path);
            self::createUserThumnail($image, $imagesize, $path);
            imagedestroy($image);
        }
        return false;
    }

    /**
     * @param string $filename
     * @return boolean|unknown
     */
    private static function createImage($filename)
    {
        $type = exif_imagetype($filename);
        $allowedTypes = array(
                1,  // [] gif
                2,  // [] jpg
                3,  // [] png
                6   // [] bmp
        );
        if (!in_array($type, $allowedTypes)) {
            return false;
        }
        switch ($type) {
            case 1 :
                $image = imageCreateFromGif($filename);
                break;
            case 2 :
                $image = imageCreateFromJpeg($filename);
                break;
            case 3 :
                $image = imageCreateFromPng($filename);
                break;
            case 6 :
                $image = imageCreateFromBmp($filename);
                break;
        }
        return $image;
    }

    /**
     * @param User $user
     * @return string
     */
    private static function createPath(User $user)
    {
        $date = new \DateTime($user->getCreatedAt());
        $dirname = dirname(dirname(dirname(__FILE__))).'/web/images/user/'.$date->format('Y').'/'.$date->format('m').'/'.$date->format('d').'/'.$user->getId();
        if (!file_exists($dirname)) {
            $command = "mkdir -m 0777 -p $dirname";
            exec($command);
        }
        return $dirname;
    }

    private static function saveImage($image, $path, $type = 'original')
    {
        imagepng($image, $path.'/'.$type.'.png');
    }

    private static function createUserThumnail($image, $imagesize, $path)
    {
        $width = self::THUMBNAIL_WIDTH;
        $height = floor(self::THUMBNAIL_WIDTH * self::IMAGE_RATIO);
        $originalWidth = $imagesize[0];
        $originalHeight = $imagesize[1];
        $originalRatio = $originalHeight / $originalWidth;
        if ($originalRatio > self::IMAGE_RATIO) {
            // too tall
            $targetHeight = $height;
            $targetWidth = $height / $originalRatio;
        } else {
            // too wide
            $targetWidth = $width;
            $targetHeight = $width * $originalRatio;
        }
        $temp = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($temp, 255, 255, 255);
        imagefill($temp, 0, 0, $white);
        imagecopyresized($temp, $image, round(($width - $targetWidth) / 2), round(($height - $targetHeight) / 2), 0, 0, $targetWidth, $targetHeight, $originalWidth, $originalHeight);
        self::saveImage($temp, $path, 'thumbnail');
        imagedestroy($temp);
    }

    public static function getThumbnailPath($user)
    {
        $date = new \DateTime($user['createdAt']);
        return '/images/user/'.$date->format('Y').'/'.$date->format('m').'/'.$date->format('d').'/'.$user['id'].'/thumbnail.png';
    }
}