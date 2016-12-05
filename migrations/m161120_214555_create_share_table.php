<?php

use yii\db\Migration;

/**
 * Handles the creation of table `share`.
 */
class m161120_214555_create_share_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('share', [
            'id' => $this->primaryKey(),
            'user' => $this->text(),
            'file' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('share');
    }
}
