<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Room */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '房间', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确认删除此房间吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'hotel_id',
                'value' => \app\models\Hotel::findOne($model->hotel_id)['name'],
            ],
            'room_number',
            [
                'attribute' => 'price',
                'value' => $model->price > 10000 ? floatval($model->price / 10000) . '万元' : $model->price . '元',
            ],
            [
                'attribute' => 'type',
                'value' => isset(Yii::$app->params['roomType'][$model->type]) ? Yii::$app->params['roomType'][$model->type] : '锁定',
            ],
            'introduction',
            [
                'attribute' => 'reserved_at',
                'value' => $model->status == 2 ? date('Y年m月d日 H:i', $model->reserved_at) : '',
            ],
            [
                'attribute' => 'status',
                'value' => isset(Yii::$app->params['roomStatus'][$model->status]) ? Yii::$app->params['roomStatus'][$model->status] : '锁定',
            ],
        ],
    ]) ?>

</div>
