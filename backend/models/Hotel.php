<?php

namespace app\models;

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
class Hotel extends \yii\db\ActiveRecord
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
            [['name', 'address', 'level', 'province', 'city'], 'required'],
            [['id', 'province', 'city', 'level'], 'integer'],
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
            'name' => '酒店名',
            'ename' => '英文名',
            'avatar' => '头像',
            'province' => '省份',
            'city' => '城市',
            'address' => '地址',
            'introduction' => '简介',
            'level' => '星级',
        ];
    }

    /**
     * @inheritdoc
     * @return HotelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HotelQuery(get_called_class());
    }



}
