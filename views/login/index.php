<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

?>
<div class="text-center">
Для входа введите свой логин или пароль, если их у вас нет, зарегистрируйтесь

</div>

<br>
<br>
<br>
<br>

<div class="Form">
        <form action="/confirm" method="POST">
            <label for="fname">Логин:</label><br>
            <input type="text" name="Login" placeholder="Логин"><br> <br>
            <label for="lname">Пароль:</label><br>
            <input type="password" name="password" placeholder="Пароль"><br>
            <br>
            <button type="submit">Вход</button>
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        </form>

    <? if (isset($Error))
         echo "Нет такого"
         ?>


</div>











