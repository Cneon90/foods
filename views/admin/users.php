<?php

/** @var yii\web\View $this */

$this->title = 'Вход';
use yii\helpers\Html;

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
                <table class="mdl-data-table mdl-js-data-table" data-upgraded=",MaterialDataTable">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">ID</th>
                        <th class="mdl-data-table__cell--non-numeric">Имя</th>

                        <th class="mdl-data-table__cell--non-numeric">Фамилия</th>
                        <th class="mdl-data-table__cell--non-numeric">Логин</th>

                        <th class="mdl-data-table__cell--non-numeric">Телефон</th>




                        <th class="mdl-data-table__cell--non-numeric">Статус</th>
                        <th class="mdl-data-table__cell--non-numeric"></th>

                    </tr>
                    </thead>
                    <tbody>

                    <?foreach ($users as $user) { ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric"><?= $user->id ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?= $user->first_name ?></td>

                        <td class="mdl-data-table__cell--non-numeric"><?= $user->last_name ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--green"><?= $user->login ?></span> </td>

                        <td class="mdl-data-table__cell--non-numeric"><?= $user->phone ?></td>



                        <td class="mdl-data-table__cell--non-numeric"><?= $user->status ?></td>


                        <td class="mdl-data-table__cell--non-numeric">

                            <a href="/user_edit/<?= $user->id ?>" class="btnRename mdl-button"  >
                                Изменить
                            </a>


                            <button class="btnRename mdl-button" >
                                Удалить

                        </td>



                    </tr>
                    <?   };   ?>

                    </tbody>
                </table>







            </div>
        </div>



        <!-- Pie chart-->
        <div class="tables mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
            <div class="mdl-card mdl-shadow--2dp pie-chart">




            </div>
        </div>
    </div>














