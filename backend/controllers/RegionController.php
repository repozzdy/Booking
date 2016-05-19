<?php

namespace backend\controllers;

use app\models\Region;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * HotelController implements the CRUD actions for Hotel model.
 */
class RegionController extends BaseController {
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['all', 'one'],
                        'allow' => true
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionAll() {
        if (Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            $pid = 0;
            if (isset($get['pid']) && !empty($get['pid'])) {
                $pid = intval($get['pid']);
            }
            $result = Region::get(['pid' => $pid]);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'data' => $result,
                'code' => 200,
            ];
        }
    }
}
