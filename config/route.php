<?php
 $routing = [
    '/' => 'site/index',
    'login' => 'login/index',
    'menu' => 'menu/menu',
    'registration' => 'login/registration',
    'confirm' => 'login/confirm',
    'newuser' => 'login/newuser',
    'exit'  => 'login/exit',




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

     //Корзина
     'cart' => 'cart/index',
     'cart_clear' => 'cart/cartclear',

     'dish/<id>' => 'menu/dish',

    //'posts/<year>/<category>' => 'login/menu',
];
