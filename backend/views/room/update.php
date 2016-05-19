<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Room */

$this->title = '房间更新: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '房间', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="room-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>
        <? if ($model->status == 2) { ?>
            <?= Html::label('预定时间') . '：'?>
            <?= date('Y年m月d日 H:i', $model->reserved_at) ?>
        <? } ?>
    </h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
