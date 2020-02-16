<?php

namespace console\controllers;

use common\models\Articles;
use yii\console\Controller;
use yii\helpers\Console;
use Yii;

class UserController extends Controller
{
    public function actionIndex()
    {
        $articles = Articles::findAll();
        echo '<pre>';
        print_r($articles);
       die();
    }
    public function actionSetTimeCallData(){
        echo "Test cron job"; // your logic for deleting old post goes here
        exit();
    }
}