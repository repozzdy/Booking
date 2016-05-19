<?php

use yii\db\Migration;

class m160512_031541_alter_room_table extends Migration
{
    public function up()
    {
        $this->dropColumn('room', 'updated_time');
        $this->renameColumn('room', 'reserved_time', 'reserved_at');
    }

    public function down()
    {
        echo "m160512_031541_alter_room_table cannot be reverted.\n";

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
