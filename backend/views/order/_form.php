<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['readonly' => true]) ?>

<!--    --><?//= $form->field($model, 'uid')->textInput() ?>

<!--    --><?//= $form->field($model, 'hotel_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'room_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'payed_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'pay_price')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'pay_state')->textInput() ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['orderStatus']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
