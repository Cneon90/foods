<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

?>
<div class="text-center">
КОРЗИНА

</div>


<pre>
<?php

 ?>

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
           $i=1;
           if (isset($cart_dish))
              foreach ($cart_dish as $cart):
        ?>


     <tr>
      <th scope="row"><?=$i++?></th>
      <td><?= $cart['name'] ?></td>
      <td><?= $cart['qty'] ?></td>
      <td><?= $cart['price'] ?></td>
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




</pre>


<a href="/cart_clear"> Очистить корзину </a>









