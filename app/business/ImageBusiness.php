<?php

namespace MC\Business;
use MC\DataAccess\ImageDaoMySql;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use MC\Entity\Image;

class ImageBusiness extends Business {
    private static $imageFolder = './../../public/front/resource/img/';
    
    public function __construct()
    {
        $this->dao = new ImageDaoMySql();
    }

    public function create(array $data, array $img_data = null){
        unset($data['id']);
        unset($data['SAVE']);
        if(!isset($data['is_banner']) or empty($data['is_banner'])){
            $data['is_banner'] = 0;
        }
        $ext = explode('/',$img_data['image']['type'])[1];
        $image_name = uniqid() .'.'. $ext;
        $this->saveImage($img_data['image']['tmp_name'],$image_name);

        $data['path'] = $image_name;
        $this->dao->create($data);
    }

    public function update(array $data, ?array $img_data = null){
        unset($data['SAVE']);
        $id = $data['id'];
        unset($data['id']);
        if(!isset($data['is_banner']) or empty($data['is_banner'])){
            $data['is_banner'] = 0;
        }
        if($img_data != null){
            $ext = explode('/',$img_data['image']['type'])[1];
            $image_name = uniqid() .'.'. $ext;
            $this->saveImage($img_data['image']['tmp_name'],$image_name);
        }
        $data['path'] = $image_name;
        $this->dao->update($data, [['id','=',$id]]);
    }
    
    private function saveImage($image, $img_name){
        $manager = new ImageManager(new Driver());
        $image = $manager->read($image);
        $image->resizeDown(460,610);
        $path = self::$imageFolder . $img_name;
        $image->save($path);
        return true;

    }

    public function getMovieImages(int $id_movie){
        $images =  $this->dao->all(["path"],[["id_movie","=",$id_movie]]);
        if(!$images){
            return self::$imageFolder . "default.jpg";
        }
        return $images;
    }

    public function getBanner(int $id_movie){
        $movie_path = $this->dao->find(["path"],[["id_movie", "=", $id_movie],["is_banner","=",1]],as_array:true);
        if(!$movie_path){
            return self::$imageFolder . "default.jpg";
        }
        return self::$imageFolder . $movie_path["path"];       
    }

    public static function getImageFolder(){
        return self::$imageFolder;
    }
}
