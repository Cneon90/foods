<?php

/** @var yii\web\View $this */

$this->title = 'Регистрация';
use yii\helpers\Html;
//$this->params['Content'] =
//    <<<HERE
//        Регистрация
//
//HERE;

use yii\widgets\ActiveForm;

?>

<div class="row">

    <div class="col-lg-3 col-md-3 sidebar col-xs-3 visible-lg visible-md">

        <ul class="list-group sidebar-nav hidden-xs hidden-sm">

            <li><a href="/">Каталог3</a></li>

            <li><a href="/">Каталог3</a></li>

            <li><a href="/">Каталог3</a></li>

        </ul>
    </div>


    <div class="col-lg-7 col-md-9 col-xs-12 main content">

        <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>

        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end() ?>

        <? if (isset($Error)) echo 'Такой пользователь уже существует';?>


    <div class="panel panel-smart">

    </div>














