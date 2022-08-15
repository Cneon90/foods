<?php


namespace app\controllers;


use app\models\Dishs;
use app\models\MenuItems;
use yii\web\Controller;

class MenuController extends Controller
{
   // public $layout = 'login';
    public function actionMenu()
    {

        $dishs = Dishs::find()->all();

        return $this->render('index',compact('dishs'));

    }

    public function actionIndex()
    {
        $dishs = Dishs::find()->all();

        return $this->render('index',compact('dishs'));

    }

    public function actionDish($id)
    {
        $dish = Dishs::findOne($id);
        return $this->render('dish',compact('dish'));
    }

}