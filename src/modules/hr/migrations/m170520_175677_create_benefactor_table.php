<?php

use nullref\core\traits\MigrationTrait;
use yii\db\Migration;

class m170520_175677_create_benefactor_table extends Migration
{
    use MigrationTrait;

    public function safeUp()
    {
        $this->createTable('{{%benefactor}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());
    }

    public function safeDown()
    {
        $this->dropTable('{{%benefactor}}');
    }
}
