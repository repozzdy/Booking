<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $type
 * @property string $username
 * @property string $realname
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function behaviors() {
        return [
            TimestampBehavior::className(),  //默认会填充create_at和updated_at字段，其他方式请参考类文档http://www.yiichina.com/doc/api/2.0/yii-behaviors-timestampbehavior
//            'createdAtAttribute' => 'created_at',
//            'value' => new Expression('NOW()'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'string'],
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['username', 'realname', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类别',
            'username' => '用户名',
            'realname' => '真实姓名',
//            'auth_key' => 'Auth Key',
//            'password_hash' => 'Password Hash',
//            'password_reset_token' => 'Password Reset Token',
            'email' => '邮箱',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'status' => '状态',
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }


    /**
     * 查询完成之后处理数据
     */
    public function afterFind(){
        $this->type = isset(Yii::$app->params['adminType'][$this->type]) ? Yii::$app->params['adminType'][$this->type] : '普通管理员';
        $this->status = isset(Yii::$app->params['adminStatus'][$this->status]) ? Yii::$app->params['adminStatus'][$this->status] : '';
        return parent::afterFind();
    }
}
