<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteSeo'];

?>
<div class="site-index">

    <div class="jumbotron">
<!--         <h1>祝贺你!</h1>
 -->
        <p class="lead">欢迎来到酒店预订管理系统.</p>

        <p><a class="btn btn-lg btn-success" href="/hotel">立即开始</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>酒店管理</h2>

                <p></p>

                <p><a class="btn btn-default" href="/hotel">酒店列表 &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>房间管理</h2>

                <p></p>

                <p><a class="btn btn-default" href="/room">房间列表 &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>用户管理</h2>

                <p></p>

                <p><a class="btn btn-default" href="/user">用户列表 &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
