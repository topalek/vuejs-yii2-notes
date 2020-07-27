<?php

namespace app\modules\api\models;

use app\models\User;
use app\modules\api\resources\UserResource;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupForm extends Model
{

    public $username;
    public $password;
    public $password_repeat;

    protected $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                'username',
                'unique',
                'targetClass' => '\app\modules\api\resources\UserResource',
                'message'     => 'This username has already been taken'
            ],
            [['username', 'password', 'password_repeat'], 'required'],
            ['password', 'compare', 'compareAttribute' => 'password_repeat']
        ];
    }

    public function register()
    {
        $this->_user = new UserResource();
        if ($this->validate()) {
            $this->_user->username = $this->username;
            $this->_user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $this->_user->access_token = Yii::$app->security->generateRandomString(255);

            if ($this->_user->save()) {
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
