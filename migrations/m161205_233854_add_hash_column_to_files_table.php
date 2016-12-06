<?php

use yii\db\Migration;

/**
 * Handles adding hash to table `files`.
 */
class m161205_233854_add_hash_column_to_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('files', 'hash', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('files', 'hash');
    }
}
