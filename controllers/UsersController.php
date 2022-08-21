<?php


namespace app\controllers;


use app\models\Workers;
use app\models\Users;
use yii\web\Controller;

class UsersController extends Controller
{
    public $layout = 'admin';
   // public $layout = 'login';
    public function actionIndex()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();

        $work = workers::find()->all();
        return $this->render('index',compact('work'));
    }


    public function actionUsers()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $work = workers::find()->all();
        return $this->render('users',compact('work'));
    }


    public function actionAddUser()
    {
       $session = Yii::$app->session;
        // открываем сессию
       $session->open();

       $User = new Users;
       $User -> login = 'test';
       $User -> password = Yii::$app->getSecurity()->generatePasswordHash('password');
       $User -> status = 2;
       $User -> save();
       print_r($User);
       return $this->render('index',compact('User'));
    }









}