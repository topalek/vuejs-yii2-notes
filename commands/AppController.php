<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class AppController extends Controller
{

    /**
     * @param $name
     * @param $password
     * @throws \yii\base\Exception
     */
    public function actionAddUser($name, $password)
    {
        $user = new User();
        $user->username = $name;
        $user->password_hash = Yii::$app->security->generatePasswordHash($password);
        $user->access_token = Yii::$app->security->generateRandomString(255);

        if ($user->save()) {
            Console::output('Saved');
        } else {
            print_r($user->errors);
            Console::output('Not saved');
        }
    }
}
