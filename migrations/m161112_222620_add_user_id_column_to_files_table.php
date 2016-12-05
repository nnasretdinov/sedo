<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `files`.
 */
class m161112_222620_add_user_id_column_to_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('files', 'user_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('files', 'user_id');
    }
}
