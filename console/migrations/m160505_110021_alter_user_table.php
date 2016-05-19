<?php

use yii\db\Migration;

class m160505_110021_alter_user_table extends Migration
{
    public function up()
    {
        $this->alterColumn('user','realname','string');
    }

    public function down()
    {
        echo "m160505_110021_alter_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
