<?php

use yii\db\Migration;

class m170708_161939_add_date_to_comment extends Migration
{
    public function safeUp()
    {
        $this->addColumn('comment','date',$this->date());
    }

    public function safeDown()
    {
       $this->dropColumn('comment','date');
    }




    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170708_161939_add_date_to_comment cannot be reverted.\n";

        return false;
    }
    */
}
