<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
// echo($this->params['Content']);
?>
<?php $this->beginPage() ?>


<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <link rel="icon" type="web/image/png" href="web/img/DB_16х16.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ панель</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <?php $this->registerCssFile('@web/css/lib/getmdl-select.min.css' ); ?>
    <?php $this->registerCssFile('@web/css/lib/nv.d3.min.css' ); ?>
    <?php $this->registerCssFile('@web/css/application.min.css' ); ?>
    <!-- endinject -->











    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerJsFile('@web/js/main.js', ['depends' => 'yii\web\YiiAsset'] ); ?>

    <?php $this->registerJsFile('@web/js/d3.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/getmdl-select.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/material.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/nv.d3.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/layout/layout.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/scroll/scroll.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/charts/discreteBarChart.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/charts/linePlusBarChart.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/charts/stackedBarChart.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/employer-form/employer-form.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/line-chart/line-charts-nvd3.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/map/maps.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/pie-chart/pie-charts-nvd3.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/table/table.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/widgets/todo/todo.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>



    <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>



<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <div class="avatar-dropdown" id="icon">
                <span>Администратор</span>
                <img src="/web/img/Icon_header.png">
            </div>
        </div>
    </header>



    <div class="mdl-layout__drawer">
        <header>Главная</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">

                        <a class="mdl-navigation__link mdl-navigation__link" href="../admin">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Главная
                        </a>

                        <a class="mdl-navigation__link" href="../admin/users">
                            <i class="material-icons" role="presentation">person</i>
                            Пользователи
                        </a>


                        <a class="mdl-navigation__link" href="../admin/vendors">
                            <i class="material-icons">directions_bus</i>
                            Поставщики
                        </a>

                        <a class="mdl-navigation__link" href="../admin/dishs">
                            <i class="material-icons" role="presentation">local_pizza</i>
                            Блюда
                        </a>


                        <a class="mdl-navigation__link" href="#">
                            <i class="material-icons" role="presentation">local_dining</i>
                            Заказы
                        </a>


                        <a class="mdl-navigation__link" href="#">
                            <i class="material-icons" role="presentation">multiline_chart</i>
                            Отчёты
                        </a>








                        <div class="mdl-layout-spacer"></div>
                        <hr>
                        2022
                    </nav>
                </div>
            </div>
            <div class='scroller__bar' id="scroller__bar"></div>
        </div>
    </div>

    <main class="mdl-layout__content">
        <?= $content ?>

        <div class="mdl-grid mdl-cell mdl-cell--3-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
            <!-- Robot card-->
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp robot">

                    <div class="mdl-card__supporting-text">


                        <div class="mdl-card__title">
                            <h1 class="mdl-card__title-text"> <br><br><br><br><br><br><br> </h1>
                        </div>

                        <div class="item">
                            <a class="" href="../admin<?=($this->params['list']);?>">
                                <i class="material-icons" role="presentation">list</i>
                                список
                            </a>
                        </div>

                        <div class="item">
                            <a class="" href="../admin<?=($this->params['add']);?>">
                                <i class="material-icons" role="presentation">playlist_add</i>
                                Добавить
                            </a>
                        </div>


                        <div class="item">
                            <a class="" href="../admin<?=($this->params['find']);?>">
                                <i class="material-icons" role="presentation">search</i>
                                Найти
                            </a>
                        </div>



                    </div>
                </div>
            </div>


        </div>
</div>
    </main>

</div>














<?php $this->endBody() ?>
</body>




</html>
<?php $this->endPage() ?>
