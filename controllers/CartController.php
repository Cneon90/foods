<?php


namespace app\controllers;
use app\models\Dishs;
use app\models\Cart;
use app\models\Users;
use Yii;
use yii\base\BaseObject;
use yii\web\Controller;


class CartController extends Controller
{


    public function actionIndex()
    {
        $cart = new Cart();
        $cart_dish = $cart -> showCart();
        $sum = $cart -> sum();
        return $this->render('index',compact('cart_dish','sum'));
    }

    public function actionCartclear()
    {
        $cart = new Cart();
        $cart -> clearCart();
        return $this->render('index');
    }



}