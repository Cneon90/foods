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

<div class="text-center">
    Регистрация
</div>
<br>
<br>
<br>
<br>
<div class="Form">
   <!-- <form action="/newuser" method="POST">
        <label for="fname">Логин:</label>
        <input type="text" name="login" >

        <label for="lname">Пароль:</label>
        <input type="password" name="password" >

        <label for="lname">Повторите пароль:</label>
        <input type="password" name="password2" >
        <label for="fname">Имя:</label>
        <input type="text" name="first_name" >
        <label for="fname">Фамилия:</label>
        <input type="text" name="last_name" >
        <input type="hidden" name="_csrf" value="<?//=Yii::$app->request->getCsrfToken()?>" />
        <button type="submit">Вход</button>
    </form>
    -->

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
</div>











