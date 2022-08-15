<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

use yii\widgets\ActiveForm;


$this->params['list'] = '/dishs';
$this->params['add'] = '/dish_add';
$this->params['find'] = '/dish_find';

?>
<div class="mdl-grid mdl-grid--no-spacing dashboard">

    <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">




        <div class="mdl-card mdl-shadow--2dp tables">

            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Блюдо</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <h3> Блюдо <?= $model->name ?> добавлено</h3>




            </div>
        </div>





    </div>














