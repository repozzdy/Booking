<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;

class UserController extends BaseController {

    public $modelClass = 'api\modules\v1\models\User';

    public function behaviors() {
        return ArrayHelper::merge(
            parent::behaviors(), [
                'authenticator' => [
                    'class' => QueryParamAuth::className(),  //使用查询字符串访问口令方式认证
                    'optional' => ['create', 'login'],  //create/login两个action不用鉴权。查看QueryParamAuth及其父类AuthMethod
//                    'user' => $this->modelClass,  //使用鉴权的用户模型，这里不使用common/models/User,而用自定义的User。
                ],
            ]
        );
    }

    public function actionIndex() {
        $modelClass = $this->modelClass;
        return $modelClass::queryAll(['type' => 0]);
    }

    /**
     * 用户详情
     * @param $id
     * @return mixed
     */
    public function actionView($id) {
        $modelClass = $this->modelClass;
        return $modelClass::findOne(['id' => $id, 'type' => 0]);
    }

    /**
     * 注册用户
     * @return mixed
     */
    public function actionCreate() {
        $modelClass = $this->modelClass;
        return $modelClass::signup();
    }

}
