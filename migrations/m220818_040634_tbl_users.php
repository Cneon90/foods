<?php

use yii\db\Migration;

/**
 * Class m220818_040634_tbl_users
 */
class m220818_040634_tbl_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	  //пользователи
        $this->createTable('users', array(
            'id' => $this->primaryKey(),
            'login' => 'string NOT NULL',
            'first_name' => 'string NOT NULL',
            'last_name' => 'string NOT NULL',
            'phone' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'status' => 'integer',
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220818_040634_tbl_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220818_040634_tbl_users cannot be reverted.\n";

        return false;
    }
    */
}
