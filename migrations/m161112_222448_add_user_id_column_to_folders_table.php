<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `folders`.
 */
class m161112_222448_add_user_id_column_to_folders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('folders', 'user_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('folders', 'user_id');
    }
}
