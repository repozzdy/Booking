<?php

namespace api\modules\v1\models;

use Yii;
use yii\web\IdentityInterface;


class Base extends \yii\db\ActiveRecord implements IdentityInterface {

    public static function findIdentity($id) {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey) {
        return $this->auth_key == $authKey;
    }


}
