<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;
$this->params['max'] = $maxdish;
?>



<div class="row">

    <div class="col-lg-3 col-md-3 sidebar col-xs-3 visible-lg visible-md">

    </div>


    <div class="col-lg-7 col-md-9 col-xs-12 main content">



<div class="text-center">
   <h4>  Заказ - <?=$numberOrder ?>  </h4>
</div>

     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Количество</th>
      <th scope="col">Цена</th>
    </tr>
  </thead>

    <tbody>

        <?php
           $i=0;
           $sum=0;
              foreach ($OrderList as $order):
        ?>


     <tr>
      <th scope="row"><?=$i+1?></th>
      <td><?= $dish[$i]['name'] ?></td>
      <td><?= $order['Quantity'] ?></td>
      <td><?= $order['Price'] ?></td>
    </tr>
    <tr>
            <? $sum += $order['Price']; ?>

          <?php $i++; endforeach; ?>
          <tr>
      <th scope="row"></th>
      <td></td>
      <td> Общая сумма: </td>
      <td> <?= $sum ?></td>
    </tr>
    <tr>
  </tbody>
</table>
















