<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plant_image".
 *
 * @property integer $plant_id
 * @property integer $image_id
 *
 * @property Image $image
 * @property Plant $plant
 */
class PlantImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plant_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plant_id', 'image_id'], 'required'],
            [['plant_id', 'image_id'], 'integer'],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
            [['plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plant::className(), 'targetAttribute' => ['plant_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'plant_id' => 'Plant ID',
            'image_id' => 'Image ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlant()
    {
        return $this->hasOne(Plant::className(), ['id' => 'plant_id']);
    }
}
