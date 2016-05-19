<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property integer $hotel_id
 * @property integer $room_number
 * @property string $price
 * @property integer $type
 * @property string $introduction
 * @property integer $reserved_at
 * @property integer $status
 */
class Room extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_id', 'room_number', 'type', 'status'], 'required'],
            [['hotel_id', 'room_number', 'type', 'reserved_at', 'status'], 'integer'],
            [['price'], 'number'],
            [['introduction'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hotel_id' => 'Hotel ID',
            'room_number' => 'Room Number',
            'price' => 'Price',
            'type' => 'Type',
            'introduction' => 'Introduction',
            'reserved_at' => 'Reserved At',
            'status' => 'Status',
        ];
    }
}
