<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $file
 * @property integer $width
 * @property integer $height
 * @property string $title
 * @property string $created
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created'], 'safe'],
            [['file', 'title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'title' => 'Title',
            'created' => 'Created',
        ];
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created = date("Y-m-d H:i:s");

                $file = Yii::getAlias('@root') .'/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
                $this->imageFile->saveAs($file);
                
                $tab = getimagesize($file);
                $this->width = $tab[0];
                $this->height = $tab[1];

                $this->file = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            }
            return true;
        }
        return false;
    }
}
