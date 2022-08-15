<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

use yii\widgets\ActiveForm;


$this->params['list'] = '/users';
$this->params['add'] = '/user_add';
$this->params['find'] = '/user_find';

?>
<div class="mdl-grid mdl-grid--no-spacing dashboard">

    <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">




        <div class="mdl-card mdl-shadow--2dp tables">

            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Список пользователей</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <h3> Пользователь <?= $model->login ?> добавлен</h3>




            </div>
        </div>



        <!-- Pie chart-->
        <div class="tables mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
            <div class="mdl-card mdl-shadow--2dp pie-chart">




            </div>
        </div>
    </div>














