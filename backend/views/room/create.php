<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Room */

$this->title = '添加房间';
$this->params['breadcrumbs'][] = ['label' => '房间', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
