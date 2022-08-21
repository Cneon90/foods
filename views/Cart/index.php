<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;
$this->params['max'] = $maxdish;
?>


<div class="row">
    <div class="col-lg-3 col-md-3 sidebar col-xs-3 visible-lg visible-md">
        <ul class="list-group sidebar-nav hidden-xs hidden-sm">

        </ul>
    </div>


<div class="col-lg-7 col-md-9 col-xs-12 main content">
<div class="text-center">
 <h3>КОРЗИНА</h3>
</div>

<?php
 if (!$count == 0):
 ?>

     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Количество</th>
      <th scope="col">Цена</th>
      <th scope="col">Удалить</th>
    </tr>
  </thead>
    <tbody>
        <?php
           $i=1;
           if (isset($cart_dish))
              foreach ($cart_dish as $cart):
        ?>
     <tr>
      <th scope="row"><?=$i++?></th>
      <td><?= $cart['name'] ?></td>
      <td><?= $cart['qty'] ?></td>
      <td><?= $cart['price'] ?></td>
      <td> <a href="<?=Yii::$app->urlManager->createUrl(['cart/delete/'.$cart['id_dish']])?>">Удалить </a> </td>
    </tr>
    <tr>
       <?php endforeach; ?>
          <tr>
      <th scope="row"></th>
      <td></td>
      <td> Общая сумма:</td>
      <td> <?= $sum ?></td>
    </tr>
    <tr>
  </tbody>
</table>






    <div class="btn">
         <div class="float-left">  <a href="<?=Yii::$app->urlManager->createUrl(['cart/cart_clear'])?>"> Очистить корзину </a> </div>
    </div>

     <div class="btn">
        <div class="float-left">  <a href="<?=Yii::$app->urlManager->createUrl(['cart/buy'])?>"> Оформить заказ </a></div>
    </div>







<? else: ?>

 <div class="text-center">
    <h3> Корзина пуста </h3>
</div>

<? endif; ?>



</pre>











