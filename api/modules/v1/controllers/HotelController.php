<?php

namespace api\modules\v1\controllers;

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class HotelController extends BaseController {
    public $modelClass = 'api\modules\v1\models\Hotel';

    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view'],  //只允许访问列表和详情
                        'allow' => true,
//                        'roles' => ['?'],  //?是游客guest，@表示认证用户
                    ]
                ]
            ],
        ]);
    }

}
