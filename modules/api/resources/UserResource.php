<?php
/**
 * Created by topalek
 * Date: 27.07.2020
 * Time: 16:12
 */

namespace app\modules\api\resources;


use app\models\User;

class UserResource extends User
{
    public function fields()
    {
        return [
            'id',
            'username',
            'access_token'
        ];
    }

}