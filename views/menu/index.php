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
           <li><a href="/menu" > Все </a></li>
        <?php
          foreach ($catalog as $value): ?>

            <li><a href="<?=Yii::$app->urlManager->createUrl(['menu/'.$value['id']])?>"> <?= $value['name'] ?> </a></li>

         <? endforeach; ?>

        </ul>

    </div>


    <div class="col-lg-7 col-md-9 col-xs-12 main content">
        <div class="bar-padding-top-fix visible-lg"> </div>

    <div class="page-header">
    <h1>Меню</h1>
    <p>
        Заказ сделанный после <?= '12:30' ?> будет перенесен на следующий день

    </p>
    <span class="pull-right hidden-xs"><a href="<?=Yii::$app->urlManager->createUrl(['menu'])?>" class="btn btn-default btn-sm all"><span><i class="material-icons">format_align_right</i></span> Все</a> 	      </span>
    <span class="pull-right hidden-xs"><a href=" <?=Yii::$app->urlManager->createUrl(['menu/favorites'])?> " class="btn btn-default btn-sm star"><span><i class="material-icons">star_rate</i></span>Избранное</a>    </span>
    <br>
</div>

<div class="bar-padding-top-fix visible-xs visible-sm"> </div>
<div>

    <div class="row">

       <?php foreach ($dishs as $dish): ?>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="thumbnail">
<!--              <span class="sale-icon-content">-->
<!--                <span class="sale-icon label">Акция</span>-->
<!--                <span class="newtip-icon label">Новинка</span>-->
            </span>
                <div class="caption">
                    <a class="product-image" href="<?=Yii::$app->urlManager->createUrl(['dish/'.$dish->id])?>" title="<?= $dish->name ?>">
<!--                        <img data-src=".." alt="--><?//= $dish->name ?><!--" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">-->
                    </a>

                    <h5 style="height: 15px;"><a href=".." title="<?= $dish->name ?>"><?= $dish->name ?></a></h5>
                    <h4 class="product-price" style="height: 27px;"><?= $dish->price ?>&nbsp;₽ <span class=" price-old"></span></h4>
                    <div class="stock" style="height: 21px;">


                        <span class="product-sklad-list-block"> <?= $dish->ingredients ?> <?= $dish->id ?></span>
                    </div>
                </div>
                <div class="caption">

                    <button class="btn btn-primary btn-sm btn-block addToCartList product_card__add_btn" id="<?= $dish->id ?>" data-id="<?= $dish->id ?>">В корзину</button>

                    <a class="btn btn-primary btn-sm btn-block  hide hidden" href="" title="">
                        <input type="hidden" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    </a>
                    <? if($page =='favorites'): ?>
                        <button class="btn btn-default addToWishList btn-sm btn-block delete_favorit" id="<?= $dish->id ?>" data-id="<?= $dish->id ?>">Удалить</button>
                    <? else: ?>
                    <button class="btn btn-default addToWishList btn-sm btn-block product_card__favorits_btn " id="<?= $dish->id ?>" data-id="<?= $dish->id ?>">Отложить</button>
                    <? endif; ?>
                </div>
            </div>
        </div>

        <? endforeach; ?>



    </div>
</div>

<div class="row">

</div>














