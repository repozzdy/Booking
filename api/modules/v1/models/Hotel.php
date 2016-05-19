<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "hotel".
 *
 * @property integer $id
 * @property string $name
 * @property string $ename
 * @property string $avatar
 * @property integer $province
 * @property integer $city
 * @property string $address
 * @property string $introduction
 * @property integer $level
 */
class Hotel extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province', 'city'], 'required'],
            [['province', 'city', 'level'], 'integer'],
            [['introduction'], 'string'],
            [['name', 'ename', 'avatar'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 600],
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
            'ename' => 'Ename',
            'avatar' => 'Avatar',
            'province' => 'Province',
            'city' => 'City',
            'address' => 'Address',
            'introduction' => 'Introduction',
            'level' => 'Level',
        ];
    }
}
