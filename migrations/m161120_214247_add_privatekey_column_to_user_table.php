<?php

use yii\db\Migration;

/**
 * Handles adding privatekey to table `user`.
 */
class m161120_214247_add_privatekey_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'privatekey', $this->text());
        $this->addColumn('user', 'publickey', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'privatekey');
        $this->dropColumn('user', 'publickey');
    }
}
