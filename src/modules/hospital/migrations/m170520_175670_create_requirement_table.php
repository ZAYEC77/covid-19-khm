<?php

use nullref\core\traits\MigrationTrait;
use yii\db\Migration;

class m170520_175670_create_requirement_table extends Migration
{
    use MigrationTrait;

    public function safeUp()
    {
        $this->createTable('{{%requirement}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'hospital_id' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());

        $this->createIndex('requirement_hospital_id_ix', '{{%requirement}}', ['hospital_id']);
        $this->addForeignKey('requirement_hospital_id_fk', '{{%requirement}}', ['hospital_id'],
            '{{%hospital}}', ['id'], 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('requirement_hospital_id_ix', '{{%requirement}}');
        $this->dropIndex('requirement_hospital_id_ix', '{{%requirement}}');
        $this->dropTable('{{%requirement}}');
    }
}
