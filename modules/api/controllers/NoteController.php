<?php
/**
 * Created by topalek
 * Date: 27.07.2020
 * Time: 21:08
 */

namespace app\modules\api\controllers;


use app\models\Note;
use app\modules\api\resources\NoteResource;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;

class NoteController extends ActiveController
{
    public $modelClass = NoteResource::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class,
        ];
        $behaviors['authenticator']['except'] = ['options'];
        $behaviors['cors'] = ['class' => Cors::class];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        return new ActiveDataProvider(
            [
                'query' => Note::find()->andWhere(['user_id' => \Yii::$app->user->id]),
            ]
        );
    }


}
