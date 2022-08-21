<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;

AppAsset::register($this);
// echo($this->params['Content']);
$maxDish =  $this->params['max'];
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html;>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eda</title>
    <!-- Header -->
    <!-- Стикер-полоска -->
        <?php $this->registerCssFile('@web/css/style.css' ); ?>
        <?php $this->registerCssFile('@web/css/bootstrap-theme-simplex.css' ); ?>
<!--        --><?php //$this->registerCssFile('@web/css/style3.css' ); ?>
        <?php $this->registerCssFile('@web/css/flipclock.css' ); ?>
        <?php $this->registerCssFile('@web/css/style2.css' ); ?>
        <?php $this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css' ); ?>

    <?php $this->registerMetaTag(['name' => 'csrf-param', 'content' => Yii::$app->getRequest()->csrfParam], 'csrf-token'); ?>
   <?php  $this->registerMetaTag(['name' => 'csrf-token', 'content' => Yii::$app->getRequest()->getCsrfToken()], 'csrf-param'); ?>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!---->
<!--        --><?php //$this->registerCssFile('@web/css/out.min.css' ); ?>
<!--        --><?php //$this->registerCssFile('@web/css/bar.css' ); ?>
<!--        --><?php //$this->registerCssFile('@web/css/bootstrap-select.min.css' ); ?>
<!---->
<!--        --><?php //$this->registerCssFile('@web/css/editor.css' ); ?>
<!---->
<!---->
<!--        --><?php //$this->registerCssFile('@web/css/highslide.css' ); ?>
<!---->
<!---->
<!--        --><?php //$this->registerCssFile('@web/css/solid-menu.css' ); ?>
<!--        --><?php //$this->registerCssFile('@web/css/suggestions.min.css' ); ?>
<!--        --><?php //$this->registerCssFile('@web/css/application.min.css' ); ?>
<!--        --><?php //$this->registerCssFile('@web/css/site.css' ); ?>
    <?php $this->registerJsFile('@web/js/main.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/jqfunc.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/jquery.cookie.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/jquery.lazyloadxt.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/jquery.maskedinput.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/jquery.suggestions.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/jquery.waypoints.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerJsFile('@web/js/jquery-1.11.0.min.js', ['depends' => 'yii\web\YiiAsset'] ); ?>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Header -->
<header class="container-fluid ">
    <!-- Стикер-полоска -->
    <div class="top-banner hide d-none">
        <div class="sticker-text">Бесплатная доставка при заказе от 3000 рублей. <a href="/">Подробности</a></div>
        <span class="close sticker-close">x</span>
    </div>
    </div>
    <!-- /Стикер-полоска -->
    <div class="row">
        <div class="col-md-12 hidden-xs">
            <ul class="nav nav-pills pull-right">
                <?php
                   if ($_SESSION['authorization'] == 1) echo '<div class="welcom">Добро пожаловать:'.$_SESSION['Name'].'</div>';
                ?>
                <?php
                if ($_SESSION['authorization'] == 1):;
                ?>
                    <li class="exit"><a href="/exit"> Выход </a> </li>
                 <? else: ?>
                    <li role="presentation"><a href="/login" data-toggle="modal" data-target="#userModal"><span>  <i class="material-icons">account_box</i>  </span>  <div class="buttons"> Войти </div> </a></li>
                    <li role="presentation"><a href="/registration"><span>  <i class="material-icons">person_add</i> </span> <div class="buttons"> Зарегистрироваться </div>  </a></li>
                <?endif;?>
             </ul>
        </div>
    </div>
    <div class="row vertical-align">
        <div class="col-md-3 col-sm-3 col-xs-12 text-center">
            <div class="logo">
                <a href="/"><img src="../web/img/icon3.png" alt="Название интернет-магазина"></a>
            </div>
        </div>
    </div>
</header>
<!--/ Header -->

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-hover" id="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <div class=" header-menu-wrapper col-md-9 col-sm-9" style="opacity: 1; height: auto;">
                <div class="row">
                    <ul class="nav navbar-nav main-navbar-top">
                        <!-- dropdown catalog menu -->
                        <li>
                            <div class="solid-menus">
                                <nav class="navbar no-margin navbar-hover">
                                    <div id="navbar-inner-container">
                                        <div class="collapse navbar-collapse" id="solidMenu">

                                            <ul class="nav navbar-nav">
                                                <li>
                                                    <a class="dropdown-toggle disabled" data-toggle="dropdown" href="/my" data-title="Каталог">Личный кабинет </a>
                                                </li>
                                                <li class="visible-xs"><a href="/">Отложенные товары</a></li>
                                                <li class="visible-xs"><a href="/">Прайс-лист</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </li>
    <!-- dropdown brand menu -->
                        <li class="hidden-xs" id="brand-menu">
                            <a href="/menu" data-toggle="dropdown">Меню </a>
                        </li>
                    </ul>
                    <div class="additional-nav-menu"><a href="/" class="dropdown-toggle link" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i></a><ul class="dropdown-menu dropdown-menu-right aditional-link" role="menu"><li class="visible-xs" style=""><a href="/">Новости</a></li><li class=""><a href="/">О компании</a></li></ul></div></div>
            </div>
            <div class="col-md-3 col-sm-3">
                <ul class="nav navbar-nav navbar-right visible-lg visible-md visible-sm" id="cart">
                    <li><a id="cartlink" data-trigger="hover" data-container="#cart" data-toggle="popover" data-placement="bottom" data-html="true" data-url="/order/" data-content="&lt;div id=&quot;visualcart_content&quot;&gt;
    &lt;div class=&quot;list-group&quot; id=&quot;visualcart&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;text-center&quot; id=&quot;visualcart_order&quot; style=&quot;display:none&quot;&gt;
        &lt;a class=&quot;btn btn-info&quot; href=&quot;/order/&quot;&gt;Оформить заказ&lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;"

        <?php
            if ($_SESSION['authorization'] == 1): ?>
                          <a href="/cart" data-original-title="" title="">
                            <span>
                             <i class="material-icons carts">shopping_cart</i> товаров
                            </span>
                            <span class="label label-info answer" id="_answer_count"> 0 </span> на
                            <span class="label label-info" id="_answer_sum">0</span>
                            <span class="rubznak">p</span></a>
            <?php endif; ?>

                        <div id="visualcart_tmp" class="hide"><div id="visualcart_content">
                                <div class="list-group" id="visualcart">
                                </div>
                             <div class="text-center" id="visualcart_order" style="display:none">
                                    <a class="btn btn-info" href="/">Оформить заказ</a>
                                </div>
                            </div></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div id="notification" class="success-notification" style="display:none">
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
        <span class="notification-alert"> </span>
    </div>
</div>

<div class="container-fluid main-container">
            <?= $content ?>
</div>

        <div class="col-md-2 sidebar col-xs-12 visible-lg">
            <div class="page-header hidden-xs hide d-none">
                <h2>Новости</h2>
            </div>
            <div class="list-group left-block hidden-xs ">
              <?  if (isset($maxDish)): ?>
                <span class="list-group-item active">Часто заказываемые</span>
                <ul class="left-block-list">
                   <?   foreach ($maxDish as $val): ?>
                     <li class="elem"><a href="<?=Yii::$app->urlManager->createUrl(['dish/'.$val['id_dish']])?> ">  <?=$val['name'] ?> </a> </li>
                    <? endforeach; ?>
                </ul>
                <? endif;?>
            </div>
            <div class="news-list row">
          </div>
        </div>
    </div>

  <footer class="footer well ">
        <div class="row">
            <!-- My Account Links Starts -->
            <div class="col-md-3 col-sm-4 col-xs-12" itemscope="" itemtype="">
                <h4><ul class="social-menu list-inline">
                       </ul></h4>
                <h5>© <span itemprop="name">Еда</span>, 2022</h5>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <h5>Личный кабинет</h5>
                <ul>
                    <li><a href="/my">Мои заказы</a></li>
                </ul>
            </div>
            <!-- My Account Links Ends -->
            <!-- Customer Service Links Starts -->
            <div class="col-md-3 col-sm-4 col-xs-12">
                <h5>Навигация</h5>
                <ul>
                    <li><a href="/menu" title="Прайс-лист">Меню</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <ul class="line">
                    <h5>Контакты</h5>
                    <li class="contact"><a href="/contact">Контакты</a></li>
                    <li class="about"><a href="/about">О компании</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

<div class="highslide-container"
     style="padding: 0px; border: none; margin: 0px; position: absolute; left: 0px; top: 0px; width: 100%; z-index: 1001; direction: ltr;"><a class="highslide-loading" title="Click to cancel" href="javascript:;" style="position: absolute; top: -9999px; opacity: 0.75; z-index: 1;">Loading...</a><div style="display: none;"></div><table cellspacing="0" style="padding: 0px; border: none; margin: 0px; visibility: hidden; position: absolute; border-collapse: collapse; width: 0px;"><tbody style="padding: 0px; border: none; margin: 0px;"><tr style="padding: 0px; border: none; margin: 0px; height: auto;">
            <td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px; background: url(./web/img/drop-shadow.png) 0px -40px; height: 20px; width: 20px;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px; background: url(./web/img/drop-shadow.png) -20px 0px; height: 20px; width: 20px;"></td></tr><tr style="padding: 0px; border: none; margin: 0px; height: auto;"><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px; background: url(./web/img/drop-shadow.png) 0px -80px; height: 20px; width: 20px;"></td><td class="drop-shadow highslide-outline" style="padding: 0px; border: none; margin: 0px; position: relative;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px; background: url(./web/img/drop-shadow.png) -20px -80px; height: 20px; width: 20px;"></td></tr><tr style="padding: 0px; border: none; margin: 0px; height: auto;"><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px; background: url(./web/img/drop-shadow.png) 0px -20px; height: 20px; width: 20px;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px; background: url(./web/img/drop-shadow.png) 0px -60px; height: 20px; width: 20px;"></td><td style="padding: 0px; border: none; margin: 0px; line-height: 0; font-size: 0px; background: url(./web/img/drop-shadow.png) -20px -20px; height: 20px; width: 20px;"></td></tr></tbody></table><img src="./web/img/drop-shadow.png" style="padding: 0px; border: none; margin: 0px; position: absolute; top: -9999px;"></div></body></html>
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>