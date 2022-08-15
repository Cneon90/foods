<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

$this->params['list'] = '/vendors';
$this->params['add'] = '/vendor_add';
$this->params['find'] = '/vendor_find';

?>
<div class="mdl-grid mdl-grid--no-spacing dashboard">

    <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">




        <div class="mdl-card mdl-shadow--2dp tables">

            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Список поставщиков</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <table class="mdl-data-table mdl-js-data-table" data-upgraded=",MaterialDataTable">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">ID</th>
                        <th class="mdl-data-table__cell--non-numeric">Название</th>

                        <th class="mdl-data-table__cell--non-numeric">Активный</th>


                        <th class="mdl-data-table__cell--non-numeric">Статус</th>
                        <th class="mdl-data-table__cell--non-numeric"></th>

                    </tr>
                    </thead>
                    <tbody>

                    <?foreach ($vendors as $vendor) { ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric"><?= $vendor->id ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?= $vendor->name ?></td>

                        <td class="mdl-data-table__cell--non-numeric"><?= $vendor->active ?></td>


                        <td class="mdl-data-table__cell--non-numeric"><?= $vendor->status ?></td>






                        <td class="mdl-data-table__cell--non-numeric">

                            <button class="btnRename mdl-button" >
                                Изменить
                            </button>


                            <button class="btnRename mdl-button" >
                                Удалить

                        </td>



                    </tr>
                    <?   };   ?>

                    </tbody>
                </table>







            </div>
        </div>



    </div>














