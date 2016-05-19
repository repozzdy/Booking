<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $hotel_id
 * @property integer $room_id
 * @property integer $payed_at
 * @property string $pay_price
 * @property integer $pay_state
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $remark
 * @property integer $status
 */
class Order extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'order';
    }

    public function behaviors() {
        return [
            TimestampBehavior::className(),  //自动填充创建和更新时间
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['uid', 'hotel_id', 'room_id', 'pay_state', 'status'], 'required'],
            [['uid', 'hotel_id', 'room_id', 'payed_at', 'pay_state', 'created_at', 'updated_at', 'status'], 'integer'],
            [['pay_price'], 'number'],
            [['remark'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'uid' => '用户ID',
            'hotel_id' => '酒店ID',
            'room_id' => '房间ID',
            'payed_at' => '支付时间',
            'pay_price' => '支付价格',
            'pay_state' => '支付状态',
            'created_at' => '订单创建时间',
            'updated_at' => '订单的更新时间',
            'remark' => '订单备注',
            'status' => '订单状态',
        ];
    }

    /**
     * @inheritdoc
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find() {
        return new OrderQuery(get_called_class());
    }

}
