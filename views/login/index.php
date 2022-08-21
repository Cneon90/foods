<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

?>

<div class="row">

    <div class="col-lg-3 col-md-3 sidebar col-xs-3 visible-lg visible-md">


    </div>


    <div class="col-lg-7 col-md-9 col-xs-12 main content">




<form action="/confirm"  method="post" name="user_forma">
    <div class="modal-body">
        <div class="form-group">

            <input type="text" name="Login" class="form-control suggestions-input" placeholder="Login" style="box-sizing: border-box;">
            <div class="suggestions-wrapper"><span class="suggestions-addon" data-addon-type="spinner" style="left: 273px; top: -33px; height: 32px; width: 32px;">

                </span><ul class="suggestions-constraints" style="left: 13px; top: -17px;"></ul><div class="suggestions-suggestions" style="position: absolute; display: none; left: 0px; top: -1px; width: 306px;">

                </div>
            </div>
            <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
            <br>

            <input type="password" name="password" class="form-control" placeholder="Пароль" required="" value="">
            <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>
        </div>

        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    </div>
    <div class="modal-footer flex-row">

        <input type="hidden" value="1" name="user_enter">
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="/registration">Зарегистрироваться</a>
    </div>
</form>

<? if (isset($Error))
    echo "Нет такого"
?>











