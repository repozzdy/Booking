<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "region".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $name
 */
class Region extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'pid', 'name'], 'required'],
            [['id', 'pid'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * 获取地区列表
     * @param $condition
     * @return array|null
     */
    public static function get($condition) {
        $region = static::findAll($condition);
        if (!empty($region)) {
            return ArrayHelper::map($region, 'id', 'name');
        }
        return array();
    }

    public static function getOne($condition){
        $region = static::findOne($condition);
        if (!empty($region)) {
            return ArrayHelper::map(array($region), 'id', 'name');
        }
        return array();
    }

}
