<?php

use yii\db\Migration;

/**
 * Class m220730_123629_newtable_all
 */
class m220730_123629_newtable_all extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Поставщики
        $this->createTable('vendors', array(
            'id' => 'pk',
            'name' => 'string',
            'active' => 'boolean',
            'status' => 'integer',
        ));

        //Пункты меню
        $this->createTable('menu_items', array(
            'id' => 'pk',
            'name' => 'string',

        ));

        //Блюда
        $this->createTable('dishs', array(
            'id' => 'pk',
            'name' => 'string',
            'id_menu_item' => 'integer',
            'id_vendor' => 'integer',
            'ingredients' => 'string',
            'price' => 'integer',
        ));

        //Заказы
        $this->createTable('orders', array(
            'id' => 'pk',
            'date_create' => 'date',
            'id_user' => 'integer',
            'id_dish' => 'integer',
        ));

        //Заказ-блюдо (дополнительная таблица для связи)
        $this->createTable('order_dish', array(
            'id' => 'pk',
            'id_order' => 'integer',
            'id_dish' => 'integer',
        ));


        $this->addForeignKey(
            'DishToVendor','dishs','id_vendor','vendors','id', 'CASCADE'
        );

        $this->addForeignKey(
            'DishToMenu','dishs','id_menu_item','menu_items','id', 'CASCADE'
        );


        $this->addForeignKey(
            'OrderToDish_order','order_dish','id_order','orders','id', 'CASCADE'
        );

        $this->addForeignKey(
            'OrderToDish_dish','order_dish','id_dish','dishs','id', 'CASCADE'
        );


    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220730_123629_newtable_all cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220730_123629_newtable_all cannot be reverted.\n";

        return false;
    }
    */
}
