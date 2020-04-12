<?php

use nullref\core\traits\MigrationTrait;
use yii\db\Migration;

class m170520_174350_create_hospital_table extends Migration
{
    use MigrationTrait;

    public function safeUp()
    {
        $this->createTable('{{%hospital}}', [
            'id' => $this->primaryKey(),
            'identifier' => $this->string()->unique(),
            'name' => $this->string(),
        ], $this->getTableOptions());
    }

    public function safeDown()
    {
        $this->dropTable('{{%hospital}}');
    }
}
