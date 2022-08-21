<?php

namespace app\models;


use app\models\OrderDetail;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;
use app\models\Vendors;
use app\models\Dishs;
use app\models\MenuItems;


class service
{
    public function test()
    {
        return 1;
    }

    public function maxDishs()
    {
        return  Yii::$app->db
            ->createCommand('SELECT name,id_dish,Quantity,SUM(Quantity) 
                                 FROM `detail` 
                                 LEFT JOIN `dishs` ON dishs.id = detail.id_dish
                                 GROUP BY id_dish order BY SUM(Quantity) DESC LIMIT 3;')
            ->queryAll();
    }
}