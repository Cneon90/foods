<?php

/** @var yii\web\View $this */

$this->title = 'Меню';


$this->params['Content'] =
    <<<HERE
        Меню
     
        
HERE;

?>

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












