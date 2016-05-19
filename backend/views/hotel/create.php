<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hotel */

$this->title = '酒店添加';
$this->params['breadcrumbs'][] = ['label' => '酒店', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
