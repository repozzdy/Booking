<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '酒店';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加酒店', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'ename',
//            'avatar',
            [
                'attribute' => 'province',
                'filter' => \app\models\Region::get(['pid' => 0]),
                'value' => function ($model) {
                    return \app\models\Region::getOne(['id' => $model->province])[$model->province];
                }
            ],
            [
                'attribute' => 'city',
                'filter' => '此功能尚未开放',
                'value' => function ($model) {
                    return \app\models\Region::getOne(['id' => $model->city])[$model->city];
                },
            ],
//             'address',
//             'introduction:ntext',
            [
                'attribute' => 'level',
                'filter' => Yii::$app->params['hotelLevel'],
                'value' => function($model){
                    return isset(Yii::$app->params['hotelLevel'][$model->level]) ? Yii::$app->params['hotelLevel'][$model->level] : '其他';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
