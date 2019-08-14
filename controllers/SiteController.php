<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\ext\IdentData;

/**
 * Основной контроллер
 */
class SiteController extends Controller
{
    /**
     * 'Белый список' для действия actionGetIdentData()
     */
    public static $identModelClassList = [
        'billboard' => '\app\models\Billboard',
        'metro' => '\app\models\Metro',
        'transport' => '\app\models\Transport',
    ];


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     * Это одностраничное приложение.
     * Данные только отображаются на экране. Обратного взаимодействия нет (в ТЗ этого не указано).
     * Для оптимизации можно использовать Vue.js.
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'identData' => [
                'billboard' => [
                    'caption' => 'BillBoards',
                    'data' => IdentData::getIdentData('\app\models\Billboard'),
                ],
                'transport' => [
                    'caption' => 'Transport',
                    'data' => IdentData::getIdentData('\app\models\Transport'),
                ],
                'metro' => [
                    'caption' => 'Metro',
                    'data' => IdentData::getIdentData('\app\models\Metro'),
                ],
            ],
        ]);
    }

    /**
     * Данный код не используется в задаче, но показывает возможности такого подхода к решению задачи.
     * Действие возвращает данные сооветстующей модели в формате JSON.
     *
     * @param $identModelName string. Ключ для $identModelClassList
     * @return array. Результат ответа сервера в виде: {"10":"metro_1","20":"metro_2","30":"metro_3"}.
     */
    public function actionGetIdentData($identModelName)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $identModelClassName = isset(static::$identModelClassList[$identModelName]) ? static::$identModelClassList[$identModelName] : '';
        return IdentData::getIdentData($identModelClassName);
    }
}
