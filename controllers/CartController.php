<?php


namespace app\controllers;
use app\models\Dishs;
use app\models\Cart;
use app\models\Orders;
use app\models\Detail;
use app\models\service;
use app\models\Users;
use Yii;
use yii\base\BaseObject;
use yii\web\Controller;


class CartController extends Controller
{


    public function actionIndex()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $cart = new Cart();
        $cart_dish = $cart -> showCart();
        $sum = $cart -> sum();
        $count = $cart -> cart_count();
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('index',compact('cart_dish','sum','count','maxdish'));
    }

    public function actionCartclear()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $cart = new Cart();
        $cart -> clearCart();
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('index',compact('maxdish'));
    }

    public function actionBuy()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();

        $user_id = $_SESSION['user_id'];//Получаем ID пользователя
       //Создаем новый заказ
        $order = new Orders;
        $order -> id_user = $user_id;//Указываем ID пользователя
        $order -> date_create = $today = date("Y-m-d");

        //Перебираем корзину
        $i=0;
        foreach ($_SESSION['cart'] as $cart)
        {//Перебрасываем из корзины в массив для сохранения в бд
            $detail [$i] = new Detail;
            $detail[$i] -> id_dish = $cart['id_dish'];
            $detail[$i] -> Quantity = $cart['qty'];
            $detail[$i] -> Price = $cart['price'];
            //echo $cart['name'].' '.$cart['qty'].'<br>';
            $i++;
        }
        $order -> detail = $detail;
        $order->save();

        $cart = new Cart();//Очищаем корзину
        $cart -> clearCart();
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('index',compact('maxdish'));
    }

    public function actionDelete($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->deleteCart($id);
        $this->redirect('/cart');
       // return $this->render('index');
    }



}