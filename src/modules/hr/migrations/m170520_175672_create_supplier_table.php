<?php

use nullref\core\traits\MigrationTrait;
use yii\db\Migration;

class m170520_175672_create_supplier_table extends Migration
{
    use MigrationTrait;

    public function safeUp()
    {
        $this->createTable('{{%supplier}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());
    }

    public function safeDown()
    {
        $this->dropTable('{{%supplier}}');
    }
}
