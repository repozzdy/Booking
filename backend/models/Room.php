<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
class Room extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['hotel_id', 'room_number', 'price', 'type', 'status'], 'required'],
            [['hotel_id', 'room_number', 'type', 'status'], 'integer'],
            [['price'], 'number'],
            [['reserved_at'], 'integer'],
            [['introduction'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'hotel_id' => '所属酒店',
            'room_number' => '房间号',
            'price' => '价格',
            'type' => '类型',
            'introduction' => '介绍',
            'reserved_at' => '预定时间',
            'status' => '当前状态',
        ];
    }

    /**
     * @inheritdoc
     * @return RoomQuery the active query used by this AR class.
     */
    public static function find() {
        return new RoomQuery(get_called_class());
    }

    public function afterFind() {
//        $this->reserved_at = date('Y-m-d H:i', $this->reserved_at);
    }
}
