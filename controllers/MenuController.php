<?php


namespace app\controllers;


use app\models\Detail;
use app\models\Dishs;
use app\models\Favorites;
use app\models\MenuItems;
use app\models\service;
use app\models\Settings;
use yii\web\Controller;
use Yii;

class MenuController extends Controller
{

    //Основное меню (все блюда)
    public function actionMenu()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $acriv_vendor = Settings::findOne(1); //Получаем активный вендор
        $dishs = Dishs::find()->where(['id_vendor' => $acriv_vendor->id_vendor])->all();
        $catalog = MenuItems::find()->all();
        $serv = new service();
        $maxdish = $serv->maxDishs();

       return $this->render('index',compact('dishs','catalog','maxdish'));
    }

    //Определенный раздел меню
    public function actionCategory($cat=1)
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $acriv_vendor = Settings::findOne(1);//Получаем активный вендор
        $dishs = Dishs::find()->where(['id_menu_item' => $cat])->andwhere(['id_vendor' => $acriv_vendor->id_vendor])->all();
        $catalog = MenuItems::find()->all();
        $serv = new service();
        $maxdish = $serv->maxDishs();
      return $this->render('index',compact('dishs','catalog','maxdish'));
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $dishs = Dishs::find()->all();
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('index',compact('dishs','maxdish'));
    }



    public function actionFavorites()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();

        $user_id = $_SESSION['user_id'];
        $favorites = Favorites::find()->with(['dish'])
            ->where(['id_user' => $user_id])
            ->all();

        $dishs = [];

        foreach ($favorites as $val)
        {
            array_push($dishs, $val['dish']);
        }


        foreach ($favorites as $val)
        {

        }
        $catalog = MenuItems::find()->all();
        $page = 'favorites';
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('index',compact('dishs','catalog','page','maxdish'));
    }


    public function actionDish($id)
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $dish = Dishs::findOne($id);
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('dish',compact('dish','maxdish'));
    }

}