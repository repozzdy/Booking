<?php

namespace api\modules\v1\models;

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
class Order extends Base {

    //支付状态
    const STATE_UNPAYED = 0;
    const STATE_PAYED = 1;

    //订单状态
    const STATUS_CANCELED = 2;
    const STATUS_DELETED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'uid', 'hotel_id', 'room_id', 'pay_state', 'created_at', 'status'], 'required'],
            [['id', 'uid', 'hotel_id', 'room_id', 'payed_at', 'pay_state', 'created_at', 'updated_at', 'status'], 'integer'],
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
            'uid' => 'Uid',
            'hotel_id' => 'Hotel ID',
            'room_id' => 'Room ID',
            'payed_at' => 'Pay Time',
            'pay_price' => 'Pay Price',
            'pay_state' => 'Pay State',
            'created_at' => 'Created Time',
            'updated_at' => 'Updated Time',
            'remark' => 'Remark',
            'status' => 'Status',
        ];
    }

    public static function queryAll() {
        $query = static::find();
        $get = Yii::$app->request->get();
        if (!isset($get['uid'])) {
            return false;
        }
        $condition = array();

        //酒店id
        if (isset($get['hotel_id'])) {
            $condition['hotel_id'] = $get['hotel_id'];
        }

        //房间id
        if (isset($get['room_id'])) {
            $condition['room_id'] = $get['room_id'];
        }

        //支付状态
        if (isset($get['pay_state'])) {
            $condition['pay_state'] = $get['pay_state'];
        }

        $query->andFilterWhere($condition);

        //过滤时间
        if (isset($get['created_at']) && $time = strtotime($get['created_at'])) {
            $date = date('Y-m-d', $time);
            $endTime = strtotime($date) + 24 * 3600;
            $query->andWhere('created_at >= ' . $time . ' and created_at <= ' . $endTime);
        }
        if (isset($get['updated_at']) && $time = strtotime($get['updated_at'])) {
            $date = date('Y-m-d', $time);
            $endTime = strtotime($date) + 24 * 3600;
            $query->andWhere('updated_at >= ' . $time . ' and updated_at <= ' . $endTime);
        }

        return new \yii\data\ActiveDataProvider(['query' => $query]);
    }

    /**
     * 更新订单
     * @param $id
     * @return bool|null|static
     */
    public static function updateOrder($id) {
        $model = static::findOne(['id' => $id, 'pay_state' => static::STATE_UNPAYED]);
        if (!$model) {
            Yii::warning(sprintf("cannot find the order where id is '%d' and pay_state is '%s'", $id, static::STATE_UNPAYED), 'api');
            return false;
        }
        $post = Yii::$app->request->post();
        $post['updated_at'] = time();
        $model->attributes = $post;
        if (!$model->save()) {
            Yii::warning(sprintf("failed to udpate order where id is '%d', attributes in [%s]", $id, var_export($model->attributes, true)), 'api');
            return array_values($model->getFirstErrors())[0];
        }
        return $model;
    }

    public static function deleteOrder($id) {
        //未支付时取消订单：status设为2
        $model = static::findOne(['id' => $id, 'pay_state' => static::STATE_UNPAYED]);
        $status = static::STATUS_CANCELED;
        if (!$model) {
            $model = static::findOne(['id' => $id, 'pay_state' => static::STATE_PAYED]);
            //已完成支付：status设为0
            if ($model) {
                $status = static::STATUS_DELETED;
            }
        }
        $params = Yii::$app->request->post();
        $params['status'] = $status;
        $model->attributes = $params;
        if (!$model->save()) {
            Yii::warning(sprintf("failed to udpate order where id is '%d', attributes in [%s]", $id, var_export($model->attributes, true)), 'api');
            return array_values($model->getFirstErrors())[0];
        }
        return $model;

    }
}
