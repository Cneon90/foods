<?php

/** @var yii\web\View $this */

$this->title = 'Меню';


$this->params['Content'] =
    <<<HERE
        Меню
     
        
HERE;
$this->params['max'] = $maxdish;

?>

<div class="row">

    <div class="col-lg-3 col-md-3 sidebar col-xs-3 visible-lg visible-md">

        <ul class="list-group sidebar-nav hidden-xs hidden-sm">

            <li><a href="/">Каталог3</a></li>

            <li><a href="/">Каталог3</a></li>

            <li><a href="/">Каталог3</a></li>

        </ul>
    </div>


    <div class="col-lg-7 col-md-9 col-xs-12 main content">




<div class="bar-padding-top-fix visible-lg"> </div>


<div class="bar-padding-top-fix visible-xs visible-sm"> </div>
<div>


    <div class="row">

        <div class="Card-Product">
            <div class="Icon">Icon</div>
            <div class="Descriptions">Descriptions</div>
            <div class="Price">Price</div>


        </div>

    </div>
</div>

<div class="row">

</div>






    <div class="mainDish">
        <div class="title"> Название: <?= $dish->name ?> </div>

        <br>
        <br>
        <br>
        <div class="ingridient"> Ингридиенты: <?=$dish -> ingredients ?>  </div>
        <br>
        <br>
        <br>
        <div class="price"> Цена: <?=$dish -> price ?></div>

    </div>












