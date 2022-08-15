<?php


namespace app\controllers;


use app\models\Workers;
use app\models\Users;
use yii\base\BaseObject;
use yii\web\Controller;
use Yii;

class LoginController extends Controller
{

   // public $layout = 'admin';
    public function actionIndex()
    {
        $User = Users::find()->all();
        return $this->render('index',compact('User'));
    }


    public function actionRegistration()
    {
        $model = new Users();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены
            $user = new Users();
            //Метод в том числе проверяет существует ли такой пользователь, если да то возвращает 0
            if($user->CreateUser($model) == 0) {
                return $this->render('registration', ['model' => $model,'Error' => '1']);
            }
        }
        return $this->render('registration',['model' => $model]);
    }



    public function actionConfirm()
    {
        $session = Yii::$app->session;
        $session->open();
        $user = new Users();
        if($user->authorization($_POST['Login'],$_POST['password'])==0)
            return $this->render('index',['Error'=>'1']);
        return $this->render('confirm',compact('Login'));
    }



    //Выход из сессии
    public function actionExit()
    {
        $user = new Users();
        $user->session_logout();
        return $this->render('index');
    }





    public function actionNewuser()
    {


    }



}