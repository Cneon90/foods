<?php


namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
       public function addToCart($dish,$qty = 1)
       {
           //Если в корзине уже есть такое блюдо
           if(isset($_SESSION['cart'][$dish->id]))
           {
               $_SESSION['cart'][$dish->id]['qty'] += $qty;
           } else
           //Если такого блюда еще не было
           {
               $_SESSION['cart'][$dish->id] =
                   [
                       'qty' => $qty,
                       'name'=> $dish -> name,
                       'price'=> $dish -> price,

                   ];
           }

           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $dish-> price : $qty * $dish-> price;
       }

       public function cart_count()
       {
           return $_SESSION['cart.qty'];
       }

    public function showCart()
    {

        return $_SESSION['cart'];
    }

    public function clearCart()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        return 1;

    }

    public function sum()
    {
        return $_SESSION['cart.sum'];
    }



}