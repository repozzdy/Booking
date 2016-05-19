<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class BaseController extends \yii\rest\ActiveController {

    //按召集和输出
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
            'contentNegotiator' => [
                'formats' => ['text/html' => \yii\web\Response::FORMAT_JSON]
            ]
        ]);
    }

    /**
     * 重置系统自实现方法
     * @return array
     */
    public function actions() {
        $actions = parent::actions();
        unset($actions['index'], $actions['create'], $actions['update'], $actions['delete'], $actions['view']);
        return $actions;
    }

    public function actionIndex() {
        $modelClass = $this->modelClass;
        $query = $modelClass::find();
        return new ActiveDataProvider(['query' => $query]);
    }

    public function actionCreate() {
        $model = new $this->modelClass;
//        $model->load(Yii::$app->request->bodyParams);
        $model->attributes = Yii::$app->request->post();
        if (!$model->save()) {
            return array_values($model->getFirstErrors())[0];
        }
        return $model;
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->attributes = Yii::$app->request->post();
        if (!$model->save()) {
            return array_values($model->getFirstErrors())[0];
        }
        return $model;
    }

    public function actionDelete($id) {
        return $this->findModel($id)->delete();
    }

    public function actionView($id) {
        return $this->findModel($id);
    }

    protected function findModel($id) {
        $modelClass = $this->modelClass;
        if (($model = $modelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function checkAccess($action, $model = null, $params = []) {

    }

}
