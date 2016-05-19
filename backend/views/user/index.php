<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [  //select下拉选择
                'attribute' => 'type',
                //用于搜索
                'filter' => Yii::$app->params['adminType'],
                'headerOptions' => ['width' => '150'],
            ],
            'username',
            'realname',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            [
                'attribute' => 'created_at',
                //用于列表显示
                'value' => function ($model) {
                    return date('Y-m-d H:i', $model->created_at) ? date('Y-m-d H:i', $model->created_at) : '';
                }
            ],
            [
                'attribute' => 'updated_at',
                //用于列表显示
                'value' => function ($model) {
                    return $model->updated_at > $model->created_at ? date('Y-m-d H:i', $model->updated_at) : '';
                },
                'label' => '上次更新时间'
            ],
            [
                'attribute' => 'status',
                'filter' => Yii::$app->params['adminStatus'],
                'headerOptions' => ['width' => '80'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
