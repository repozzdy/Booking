<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hotel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '酒店', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$in = '';
$province = '';
$city = '';
$region = array();
if(!empty($model->province)){
    $in .= $model->province;
    $province = \app\models\Region::get(['id' => $model->province])[$model->province];
}
if(!empty($model->city)){
    $in .= ',' . $model->city;
    $city = \app\models\Region::get(['id' => $model->city])[$model->city];
}
if($in){
    $region = \app\models\Region::get(['id' => $model->province]);  //怎么使用in查询呢。。。？？？
}
?>
<div class="hotel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确认删除此酒店?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'ename',
            [
                'attribute' => 'avatar',
                'value' => '<img src="' . $model->avatar . '" width="20%" height="20%" style="border:3px solid #ccc;">',
            ],
            [
                'attribute' => 'province',
                'value' => $province,
            ],
            [
                'attribute' => 'city',
                'value' => $city,
            ],
            'address',
            'introduction:ntext',
            [
                'attribute' => 'level',
                'value' => isset(Yii::$app->params['hotelLevel'][$model->level]) ? Yii::$app->params['hotelLevel'][$model->level] : '其他',
            ],
        ],
    ]) ?>

</div>
