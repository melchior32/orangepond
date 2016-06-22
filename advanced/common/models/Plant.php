<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plant".
 *
 * @property integer $id
 * @property string $name
 * @property integer $colour_id
 * @property string $created
 *
 * @property Colour $colour
 */
class Plant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'colour_id'], 'required'],
            [['colour_id'], 'integer'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['colour_id'], 'exist', 'skipOnError' => true, 'targetClass' => Colour::className(), 'targetAttribute' => ['colour_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'colour_id' => 'Colour',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColour()
    {
        return $this->hasOne(Colour::className(), ['id' => 'colour_id']);
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created = date("Y-m-d H:i:s");
            }
            return true;
        }
        return false;
    }
}
