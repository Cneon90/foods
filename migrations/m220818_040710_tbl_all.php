<?php

use yii\db\Migration;

/**
 * Class m220818_040710_tbl_all
 */
class m220818_040710_tbl_all extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		//Настройки
		
	   $this->createTable('settings', array(
            'id' => 'pk',
            'id_vendor' => 'integer',
            'menu_quantity' => 'integer',
            //'' => 'integer',
        ));
		
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
            'price' => 'float',
        ));

        //Заказы
        $this->createTable('orders', array(
            'id' => 'pk',
            'date_create' => 'date',
            'id_user' => 'integer',
        ));
		
		//детали заказа
        $this->createTable('detail', array(
            'id' => 'pk',
            'id_dish' => 'integer',
			'Quantity' => 'integer',
			'Price' => 'float',
        ));

        //Заказ-блюдо (дополнительная таблица для связи) Detail
        $this->createTable('order_detail', array(
            'id' => 'pk',
            'id_order' => 'integer',
            'id_detail' => 'integer',
         ));


        $this->addForeignKey(
            'DishToVendor','dishs','id_vendor','vendors','id', 'CASCADE'
        );

        $this->addForeignKey(
            'DishToMenu','dishs','id_menu_item','menu_items','id', 'CASCADE'
        );

		 $this->addForeignKey(
            'OrderUser','orders','id_user','users','id', 'CASCADE'
        );
		


       
        $this->addForeignKey(
            'OrderTodetail_Order','order_detail','id_order','orders','id', 'CASCADE'
        );



        $this->addForeignKey(
			//name                               table              id                table        id
            'OrderTodetail_detail','order_detail','id_detail','detail','id', 'CASCADE'
        );
		
		
		
		
		


	   $this->addForeignKey(
			//name          table          id        table   id
            'dishToDetail','detail','id_dish','dishs','id', 'CASCADE'
        );




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220818_040710_tbl_all cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220818_040710_tbl_all cannot be reverted.\n";

        return false;
    }
    */
}
