<?php

namespace MC\Business;
use MC\DataAccess\ImageDaoMySql;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageBusiness {
    private ImageDaoMySql $dao;
    private string $imageFolder;
    
    public function __construct()
    {
        $this->dao = new ImageDaoMySql();
        $this->imageFolder = './../../public/front/resource/img/';
    }

    public function find(int $id, $as_array = false){
        return $this->dao->find($id, $as_array);
    }

    public function all(array $filter, $as_array = false){
        return $this->dao->all($filter, $as_array);
    }

    public function create(array $data, array $img_data){
        unset($data['id']);
        unset($data['SAVE']);
        $ext = explode('/',$img_data['image']['type'])[1];
        $image_name = uniqid() .'.'. $ext;
        $this->saveImage($img_data['image']['tmp_name'],$image_name);

        $data['path'] = $image_name;


        $this->dao->create($data);
    }

    public function update(array $data){
        $this->dao->update($data);
    }

    public function delete(int $id){
        $this->dao->delete($id);
    }

    public function getColumns(){
        return $this->dao->getColumns();
    }

    
    private function saveImage($image, $img_name){
        $manager = new ImageManager(new Driver());
        $image = $manager->read($image);
        $path = $this->imageFolder . $img_name;
        $image->save($path);
        return true;

    }

    public function getBanner(int $movie_id){
        $movie_path = $this->dao->getBanner($movie_id);
        return $this->imageFolder . $movie_path;       
    }

}
