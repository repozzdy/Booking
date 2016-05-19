<?php

use yii\db\Migration;

class m160512_023857_alter_room_table extends Migration {
    public function up() {
        $this->addColumn('room', 'updated_time', 'int(10) comment "预订修改时间" ');
    }

    public function down() {
        echo "m160512_023857_alter_room_table cannot be reverted.\n";

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
