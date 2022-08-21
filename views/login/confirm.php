<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

?>

<div class="row">

    <div class="col-lg-3 col-md-3 sidebar col-xs-3 visible-lg visible-md">

        <ul class="list-group sidebar-nav hidden-xs hidden-sm">



        </ul>
    </div>


    <div class="col-lg-7 col-md-9 col-xs-12 main content">





<div class="text-center">

</div>


<?php



   if ($_SESSION['authorization'] == 1)
      {

        echo $_SESSION['Name'].'<br>';
        echo $_SESSION['Login'];
        echo $_SESSION['status'];

      } ?>














