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
                       'id_dish' => $dish->id,
                       'qty' => $qty,
                       'name'=> $dish -> name,
                       'price'=> $dish -> price,
                   ];
           }

           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $dish-> price : $qty * $dish-> price;
       }

       //Удаление из корзины (удаляется все количество)
       public function deleteCart($id)
       {
           $cart = $_SESSION['cart'];
           $minus = $cart[$id]['qty'] * $cart[$id]['price'];
           $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $cart[$id]['qty'];
           $_SESSION['cart.sum'] = $_SESSION['cart.sum'] - $minus;
           unset($cart[$id]);
           $_SESSION['cart'] = $cart;
           return $id;
       }

       public function cart_count()
       {
           if (empty($_SESSION['cart.qty'])) return 0;
           return $_SESSION['cart.qty'];
       }


    //Показ корзины
    public function showCart()
    {
        return $_SESSION['cart'];
    }


    //Очистка корзины
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
        if (empty($_SESSION['cart.sum'])) return 0;
        return $_SESSION['cart.sum'];
    }



}