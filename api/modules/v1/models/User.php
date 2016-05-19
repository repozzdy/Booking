<?php

namespace api\modules\v1\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $type
 * @property string $username
 * @property string $realname
 * @property string $auth_key
 * @property string $password_hash
 * @property string $access_token
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends Base {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'access_token', 'email'], 'required'],
            [['username', 'realname', 'password_hash', 'access_token', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token', 'access_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'username' => 'Username',
            'realname' => 'Realname',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'access_token' => 'Access Token',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 根据查询条件获取列表
     * @param $condition
     * @return \yii\data\ActiveDataProvider
     */
    public static function queryAll($condition) {
        $query = static::find();  //获取查询实例
        $query->andFilterWhere($condition);
        return new \yii\data\ActiveDataProvider(['query' => $query]);
    }

    /**
     * 注册用户
     * @return int|null
     */
    public static function signup() {
        $user = new \common\models\User();
        $post = Yii::$app->request->post();
        $user->username = $post['username'];
        $user->email = $post['email'];
        $user->setPassword($post['password']);
        $user->generateAuthKey();
        $user->generateAccessToken();
        return $user->save() ? $user->id : null;
    }


}
