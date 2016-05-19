<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hotel */
/* @var $get Yii::$app->request->get() */
/* @var $form yii\widgets\ActiveForm */

$provinceList = \app\models\Region::get(['pid' => 0]);
$cityList = [];
$provId = $model->province;
$cityId = $model->city;
if ($provId) {
    $cityList = \app\models\Region::get(['pid' => $provId]);
}
$avatar = !empty($model->avatar) ? $model->avatar : Yii::$app->params['hotelImg'];
?>

<div class="hotel-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--    --><? //= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename')->textInput(['maxlength' => true]) ?>

    <?= Html::label('头像') ?>
    <br/>
    <?= Html::img($avatar, ['width' => '30%', 'height' => '30%', 'style' => 'border:5px solid #ccc;margin-bottom:10px;']) ?>
    <?= Html::input('hidden', 'avatar', $avatar) ?>

    <?php $model->province = $provId; ?>
    <?= $form->field($model, 'province')->dropDownList($provinceList, ['prompt' => '请选择省份', 'onchange' => "city_list()"]) ?>

    <?php $model->city = $cityId; ?>
    <?= $form->field($model, 'city')->dropDownList($cityList, ['prompt' => '请选择城市']) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introduction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'level')->dropDownList(Yii::$app->params['hotelLevel'], ['prompt' => '请选择酒店星级']) ?>
    <script>
        //回调城市列表
        function city_list() {
            var pid = $('#hotel-province').val();
            $.ajax({
                type: 'get',
                url: '/region/all',
                data: {'pid': pid},
                success: function (result) {
                    if (result && result.code === 200) //成功获取列表
                    {
                        var tags = '';
                        $("#hotel-city").empty();
                        for (id in result.data) {
                            tags += '<option value=' + id + '>' + result.data[id] + '</option>'
                        }
                        $("#hotel-city").append(tags);
                    }
                },
            });
        }
    </script>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
