<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('添加订单', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'uid',
            'hotel_id',
            'room_id',
//            'payed_at:datetime',
            // 'pay_price',
             [
                 'attribute' => 'pay_state',
                 'filter' => Yii::$app->params['orderPayState'],
                 'headerOptions' => ['width' => 120],
                 'value' => function($model){
                     return isset(Yii::$app->params['orderPayState'][$model->pay_state]) ? Yii::$app->params['orderPayState'][$model->pay_state] : '其他';
                 }
             ],
//             'created_at:datetime',
            // 'updated_at:datetime',
            // 'remark',
            [
                'attribute' => 'status',
                'filter' => Yii::$app->params['orderStatus'],
                'headerOptions' => ['width' => 120],
                'value' => function($model){
                    return isset(Yii::$app->params['orderStatus'][$model->status]) ? Yii::$app->params['orderStatus'][$model->status] : '其他';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
