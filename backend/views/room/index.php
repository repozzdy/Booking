<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '房间';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加房间', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'hotel_id',
            [
                'attribute' => 'hotel_id',
                'value' => function ($model) {
                    $hotel = \app\models\Hotel::findOne($model->hotel_id);
                    return isset($hotel->name)? $hotel->name . '(ID:' . $model->hotel_id . ')' : '未知';
                }
            ],
            'room_number',
            [
                'attribute' => 'price',
                'value' => function ($model) {
                    return $model->price > 10000 ? floatval($model->price / 10000) . '万元' : $model->price . '元';
                },
            ],
            [
                'attribute' => 'type',
                'filter' => Yii::$app->params['roomType'],
                'value' => function ($model) {
                    return isset(Yii::$app->params['roomType'][$model->type]) ? Yii::$app->params['roomType'][$model->type] : '其他';
                },
                'headerOptions' => ['width' => 100]
            ],
            // 'introduction',
            [
                'attribute' => 'reserved_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i', $model->reserved_at) ? date('Y-m-d H:i', $model->reserved_at) : '';
                },
            ],
            [
                'attribute' => 'status',
                'filter' => Yii::$app->params['roomStatus'],
                'value' => function ($model) {
                    return isset(Yii::$app->params['roomStatus'][$model->status]) ? Yii::$app->params['roomStatus'][$model->status] : '锁定';
                },
                'headerOptions' => ['width' => 100]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
