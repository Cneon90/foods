<?php

/** @var yii\web\View $this */

$this->title = 'Меню';


$this->params['Content'] =
    <<<HERE
        Меню
     
        
HERE;

?>

<div class="text-center"> <h3>  Меню </h3> <?php echo $this->params['work']; ?> </div>


<div class="main_slider">


<?php foreach ($dishs as $dish): ?>




            <div class="product_card">
                <div class="product_card__main_thread">
                    <div class="product_card__averse">
                        <div class="product_card__pins">

                            <div title="Хит" class="type_pin--36"></div>
                        </div>
                        <div data-id="115" class="product_card__image">
                                    <img src="web/img/115.png">
                        </div>

                        <div class="product_card__group">
                            <div class="product_card__subgroup" data-id="115">
                                <div class="product_card__title">
                                   <?= $dish->name ?>
                                    <span class="product_card__tooltip prod_tooltip">
                            <span class="prod_tooltip__trigger t-tooltip" data-chain="115"></span>
                        </span>
                                </div>

                                    <div class="product_card__description">
                                        <?= $dish->ingredients ?>
                                    </div>

                            </div>
                            <div class="product_card__cost" data-ar="none">
                                <div class="product_card__price">
                                    <div class="product_card__actual_price">
                                        <?= $dish->price ?>&nbsp;₽
                                    </div>
                                    <div class="product_card__old_price old_price" style="display:none;">
                                        <div class="old_price__crossed">
                                            <?= $dish->price ?>&nbsp;₽
                                        </div>

                                    </div>
                                </div>
                                <div class="product_card__order">
                                    <div class="product_card__add_btn" id="<?= $dish->id ?>" data-id="<?= $dish->id ?>" >
                                        Заказать
                                    </div>
                                    <div class="product_card__add_btn" data-product="<?= $dish->id ?>">
                                        в избранное
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="product_card__reverse">

                    </div>
                </div>


            </div>





<? endforeach; ?>


            </div>









