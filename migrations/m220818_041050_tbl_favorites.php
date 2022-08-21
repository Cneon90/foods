<?php

use yii\db\Migration;

/**
 * Class m220818_041050_tbl_favorites
 */
class m220818_041050_tbl_favorites extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
			 //Избранное
        $this->createTable('favorites', array(
            'id' => 'pk',
            'id_user' => 'integer',
            'id_dish' => 'integer',
			
        ));
		
		
		 $this->addForeignKey(
            'userToDish','favorites','id_user','Users','id', 'CASCADE'
        );
		
		 $this->addForeignKey(
            'dishToUser','favorites','id_dish','dishs','id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220818_041050_tbl_favorites cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220818_041050_tbl_favorites cannot be reverted.\n";

        return false;
    }
    */
}
