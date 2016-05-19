<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '订单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$hotelName = '[未知]';
$roomNumber = '[未知]';
$hotel = app\models\Hotel::findOne(['id' => $model->hotel_id]);
if ($hotel) {
    $hotelName = $hotel['name'];
}
$room = app\models\Room::findOne(['id' => $model->room_id]);
if ($room) {
    $roomNumber = $room['room_number'];
}
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('删除', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => '确定删除此订单吗?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'uid',
            [
                'attribute' => 'hotel_id',
                'value' => $hotelName,
                'label' => '酒店名',
            ],
            [
                'attribute' => 'room_id',
                'value' => $roomNumber,
                'label' => '房间号'
            ],
            'payed_at:datetime',
            'pay_price',
            [
                'attribute' => 'pay_state',
                'value' => isset(Yii::$app->params['orderPayState'][$model->pay_state]) ? Yii::$app->params['orderPayState'][$model->pay_state] : '其他',
            ],
            'created_at:datetime',
            'updated_at:datetime',
            'remark',
            ['attribute' => 'status', 'value' => isset(Yii::$app->params['orderStatus'][$model->status]) ? Yii::$app->params['orderStatus'][$model->status] : '其他'],
        ],
    ]) ?>

</div>
