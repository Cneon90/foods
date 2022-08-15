<?php

use yii\db\Migration;

/**
 * Class m220805_161135_users
 */
class m220805_161135_users extends Migration
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
        $this->dropTable('users');
        echo "m220805_161135_users  reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220805_161135_users cannot be reverted.\n";

        return false;
    }
    */
}
