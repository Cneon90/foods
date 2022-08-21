<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->params['max'] = $maxdish;
?>
<div class="row">
    <div class="col-lg-3 col-md-3 sidebar col-xs-3 visible-lg visible-md">
        <!-- jQuery -->


        <!--/ ProductDay Mod -->


    </div>


    <div class="col-lg-7 col-md-9 col-xs-12 main content">
        <div class="bar-padding-top-fix visible-lg"> </div>
        <h4> Заказ номер - <?= $dish['id'] ?> </h4>
        <h2>  <?= $dish['name'] ?> </h2>
        <div class="bar-padding-top-fix visible-xs  "> </div>

        <div class="row ">
            <div class="Card-Product">
                <div class="Icon">Картинка блюда</div>
                <div class="Descriptions"><?= $dish['ingredients'] ?></div>
                <div class="Price"><?= $dish['price'] ?></div>
            </div>
        </div>
    </div>


    <div class="col-md-2 sidebar col-xs-12 visible-lg">
        <div class="page-header hidden-xs hide d-none">

        </div>
    <div class="row"></div>









