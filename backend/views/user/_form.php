<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(Yii::$app->params['adminType'])->label('类型') ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('用户名') ?>

    <? if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>
    <? } ?>

    <?= $form->field($model, 'realname')->textInput(['maxlength' => true])->label('真实姓名') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('邮箱') ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['readonly' => true])->label(false) ?>

    <?= $form->field($model, 'updated_at')->hiddenInput(['readonly' => true])->label(false) ?>

    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['adminStatus'])->label('状态') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
