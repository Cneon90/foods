<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->params['max'] = $maxdish;
?>
        <div class="row">
            <div class="col-lg-3 col-md-3 sidebar col-xs-3 visible-lg visible-md">

            </div>


            <div class="col-lg-7 col-md-9 col-xs-12 main content">

                <div class="bar-padding-top-fix visible-lg"> </div>

                <div class="page-header ">
                    <h1>Заказы</h1>
                </div>
                <div>
                    <p> Просмотер всех своих заказов на указанный период </p>
                </div>



                <div class="selects">

                    <form action="/orderfilter" method="post">
                        <div class="col-md-6 sidebar col-xs-6"> Дата начало:	<div class="date">  <input type="date" id="date_end" name="date_start" value="<?= $start ?>">	 </div> </div>
                        <div class="col-md-4 sidebar col-xs-4"> Дата окончания:	<div class="date"> 	<input type="date" id="date_end" name="date_end" value="<?= $end ?>"> </div> </div>
                        <div class="col-md-1 sidebar col-xs-1"> <button type="submit"> Выбрать </button> </div>
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    </form>

                </div>



                <div class="bar-padding-top-fix visible-xs  "> </div>


                <div class="row ">

                   <?php foreach ($orders as $val): ?>

                   <a href="<?=Yii::$app->urlManager->createUrl(['order/'.$val['id']])?>">  <div class="col-md-2 order col-xs-12" >
                          <?= $val['date_create']; ?>
                    </div>
                   </a>

                    <? endforeach; ?>




                </div>

            </div>


            <div class="col-md-2 sidebar col-xs-12 visible-lg">

                <div class="page-header hidden-xs hide d-none">
                    <h2>Новости</h2>

                </div>







 <div class="row"></div>








