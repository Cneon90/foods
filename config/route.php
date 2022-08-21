<?php
 $routing = [
     //Личный кабинет
     'my' => 'my/index',
     'orderfilter' => 'my/orderfilter',
     'order/<id>' => 'my/order',



     '/' => 'site/index',
     'login' => 'login/index',



    'registration' => 'login/registration',
    'confirm' => 'login/confirm',
    'newuser' => 'login/newuser',
    'exit'  => 'login/exit',

    //меню
     'menu' => 'menu/menu',
     'menu/favorites' => 'menu/favorites',
     'menu/<cat>' => 'menu/category',




     //Администраторская
    'admin' => 'admin/index',
    'admin/users' => 'admin/users',
    'admin/user_add' => 'admin/useradd',
    'user_edit/<id>' => 'admin/useredit',
    'admin/vendors' => 'admin/vendors',
    'admin/vendor_add' => 'admin/vendoradd',
    'admin/dishs' => 'admin/dishs',
    'admin/dish_add' => 'admin/dishsadd',


     //Api
     '/api/v1/cart' => 'api/card',
     '/api/v1/add_to_cart' => 'api/addtocart',
     '/api/v1/cart_count' => 'api/cartcount',
     '/api/v1/add_to_favorite' => 'api/favorite_add',
     '/api/v1/del_to_favorite' => 'api/favorite_del',
    // '/api/v1/orderfilter' => 'api/orderfilter',

     //Корзина
     'cart' => 'cart/index',
     'cart/cart_clear' => 'cart/cartclear',
     'cart/buy' => 'cart/buy',
     'cart/delete/<id>' => 'cart/delete',


     'dish/<id>' => 'menu/dish',
     'buy' => 'buy/design',




    //'posts/<year>/<category>' => 'login/menu',
];
