<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $file
 * @property string $title
 * @property string $created
 */
class Image extends \yii\db\ActiveRecord
{
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
            [['file', 'title', 'created'], 'required'],
            [['created'], 'safe'],
            [['file', 'title'], 'string', 'max' => 255],
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
}
