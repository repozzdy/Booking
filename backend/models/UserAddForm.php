<?php
namespace app\models;

use common\models\User;
use yii\base\Model;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * UserAdd form
 */
class UserAddForm extends Model {
    public $username;
    public $email;
    public $password;
    public $type;
    public $realname;
    public $created_at;
    public $updated_at;
    public $status;
    public $isNewRecord = true;

    public function behaviors() {
        return [
            TimestampBehavior::className(),  //默认会填充create_at和updated_at字段，其他方式请参考类文档http://www.yiichina.com/doc/api/2.0/yii-behaviors-timestampbehavior
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function add() {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->type = empty($this->type) ? 2 : $this->type;
        $user->realname = $this->realname;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->created_at = $this->created_at;
        $user->updated_at = $this->updated_at;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
