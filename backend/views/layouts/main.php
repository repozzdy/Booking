<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link id="wizFav" rel="icon" type="image/x-icon" href="/favicon1.ico">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '酒店预订管理系统',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '首页', 'url' => ['/index/index']],
        ['label' => '酒店预订', 'url' => ['/index/booking']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '登录', 'url' => ['/index/login']];
    } else {
        $li = '<li>'
            . Html::beginForm(['/hotel/index'], 'post')
            . Html::submitButton(
                '酒店管理',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
        $li .= '<li>'
            . Html::beginForm(['/room/index'], 'post')
            . Html::submitButton(
                '房间管理',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
        $li .= '<li>'
            . Html::beginForm(['/order/index'], 'post')
            . Html::submitButton(
                '订单管理',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
        $li .= '<li>'
            . Html::beginForm(['/user/index'], 'post')
            . Html::submitButton(
                '管理员管理',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
        $li .= '<li>'
            . Html::beginForm(['/user/view?id=' . Yii::$app->user->identity->getId()], 'post')
            . Html::submitButton(
                Yii::$app->user->identity->username,
                ['class' => 'btn']
            )
            . Html::endForm()
            . '</li>';
        $li .= '<li>'
            . Html::beginForm(['/index/logout'], 'post')
            . Html::submitButton(
                '退出',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
        $menuItems[] = $li;
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems, 
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => '首页',
                'url' => Yii::$app->homeUrl,
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; BookIng <?= date('Y') ?></p>

        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
