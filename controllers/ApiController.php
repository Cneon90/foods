<?php


namespace app\controllers;



use app\models\Cart;
use app\models\Dishs;
use yii\base\BaseObject;
use yii\web\Controller;
use Yii;

class ApiController extends Controller
{


    public function actionCard()
    {
        return 'hello';
    }


    public function actionAddtocart()
    {
        $id = Yii::$app->request->Post('id');
        $dish = Dishs::findOne($id);
        if(!empty($disg)) return 0;
        $session = Yii::$app->session;
        $session -> open();
        $cart = new Cart();
        $cart -> addToCart($dish);

//        print_r($session['cart']);
//        print_r('count:'.$session['cart.qty']);
//        print_r('sum:'.$session['cart.sum']);
//        echo "</pre>";
//        return 1;
//        $this->layout = false;
//        return $this->render('cartmodal', compact('session'));
        return $session['cart.qty'];
    }

    public function actionCartcount()
    {
        $session = Yii::$app->session;
        $session -> open();
        $cart = new Cart();
        return $cart -> cart_count();
    }



}