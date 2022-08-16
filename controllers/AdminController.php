<?php


namespace app\controllers;

use app\models\Workers;
use yii\base\BaseObject;
use yii\web\Controller;
use app\models\Users;
use app\models\Vendors;
use app\models\Dishs;
use Yii;

class AdminController extends Controller
{
    public $layout = 'admin';
   // public $layout = 'login';
    public function actionIndex()
    {
        $work = Users::find()->all();
        return $this->render('index',compact('users'));
    }

    //Показ всех пользователей
    public function actionUsers()
    {
        $users = Users::find()->all();
        return $this->render('users',compact('users'));
    }

    //Показать всех поставщиков
    public function actionVendors()
    {
        $vendors = Vendors::find()->all();
        return $this->render('vendors',compact('vendors'));
    }



    public function actionUseradd()
    {
        $model = new Users();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $User = new Users;
            $User -> login = $model->login;
            $User -> first_name = $model-> first_name;
            $User -> last_name = $model-> last_name;
            $User -> phone = $model-> phone;
            $hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $User -> password = $hash;
            $User -> status = 3;
            $User -> save();
            return $this->render('users_confirm', ['model' => $model]);
         }
        else {
                return $this->render('users_add', ['model' => $model]);
            }
    }

    public function actionUseredit($id)
    {
        $UserID = Users::findOne($id);

        //Заполняем форму данными из БД
        $model = new Users();
        $model->login = $UserID->login;
        $model->first_name = $UserID->first_name;
        $model->last_name = $UserID->last_name;
        $model->phone = $UserID->phone;
        $model->password = $UserID->password;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $User = $UserID;
            $User -> login = $model->login;
            $User -> first_name = $model-> first_name;
            $User -> last_name = $model-> last_name;
            $User -> phone = $model-> phone;
            $hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $User -> password = $hash;
            $User -> status = 3;
            $User -> update();
            $users = Users::find()->all();

            return $this->render('users',compact('users'));
        }
        else {
            return $this->render('users_edit', ['model' => $model]);
        }
    }


    public function actionVendoradd()
    {
        $model = new Vendors();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...
            $Vendor = new Vendors();
            $Vendor -> name = $model->name;
            $Vendor -> status = 1;
            $Vendor -> active = 1;
            $Vendor -> save();
            return $this->render('vendors_confirm', ['model' => $model]);
        }
        else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('vendors_add', ['model' => $model]);
        }
    }



    public function actionDishs()
    {
        $dishs = Dishs::find()->all();
        return $this->render('dishs',compact('dishs'));
    }

    public function actionDishsadd()
    {
        $model = new Dishs();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $dish = new Dishs();
            $dish -> name = $model->name;
            $dish -> ingredients = $model-> ingredients;
            $dish -> price = $model-> price;
            $dish -> id_menu_item = 2;
            $dish -> save();
            return $this->render('dish_confirm', ['model' => $model]);
        }
        else {
            return $this->render('dishs_add', ['model' => $model]);
        }
    }




}