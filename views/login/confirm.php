<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

?>


<div class="text-center">
    Поздравляем, вы зарегистрированы
</div>


<?php



   if ($_SESSION['authorization'] == 1)
      {

        echo $_SESSION['Name'].'<br>';
        echo $_SESSION['Login'];

      } ?>














