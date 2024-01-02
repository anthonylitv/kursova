<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\base\Model;

class ImageUpload extends Model

{

    public $image;

    public function uploadFile(UploadedFile $file,$currentImage)
    {
        $this->image = $file;
    
        $this->deleteCurrentImage($currentImage);

        $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
    
        $file->saveAs(Yii::getAlias('@web') . 'uploads/' . $filename);
    
        return $filename;
    }

    public function deleteCurrentImage($currentImage)
{
    if (file_exists(Yii::getAlias('@web') . 'uploads/' . $currentImage) &&

        is_file(Yii::getAlias('@web') . 'uploads/' . $currentImage)) {

        unlink(Yii::getAlias('@web') . 'uploads/' . $currentImage);

    }
}

public function rules(){

    return[

        [['image'], 'required'],

        [['image'],'file', 'extensions' => 'jpg,png']

    ];

}

}