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
?>
<?php $this->beginPage() ?>


<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php $this->registerJsFile('@web/js/main.js', ['depends' => 'yii\web\YiiAsset'] ); ?>
    <?php $this->registerCssFile('@web/css/main.css' ); ?>
    <?php $this->registerCssFile('@web/css/out.min.css' ); ?>
    <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>


<main>

    <div class="wrapper">

        <div class="logo"> <img src="web/img/food.png"> </div>
        <div class="caption">Заказ еды</div>

        <div class="loging">

            <?php
                  if ($_SESSION['authorization'] == 1): ?>
                    <a href="/cart">
                         <span class="cart" onclick="card()" data-id="2" >  <span <i class="material-icons">shopping_cart</i> </span> <span class="answer" id="_answer" data-id="45">  </span> </div>
                    </a>
            <?php endif; ?>

            Добро пожаловать:
            <?php
                  if ($_SESSION['authorization'] == 1) echo $_SESSION['Name'];
                  else echo 'Гость';
            ?>
        </div>

        <div class="sidebar">

                <ul id="navbar">
                    <li><?= Html::a("Главная страница", "/"); ?></li>
                    <li><?= Html::a("Меню", "/menu"); ?></li>

                    <?php if ($_SESSION['authorization'] == 1)
                        {?>
                     <li><?= Html::a("Выход", "/exit"); ?></li>
                    <?php
                        }
                        else {
                    ?>
                    <li><?= Html::a("Вход", "/login"); ?></li>
                    <li><?= Html::a("Регистрация", "/registration"); ?></li>
                     <?
                        } ?>




                </ul>





      </div>

        <div class="content">
            <?= $content ?>
        </div>


        <div class="footer">Footer</div>



    </div>

</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
