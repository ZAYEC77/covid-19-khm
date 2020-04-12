<?php

use app\modules\hospital\models\Requirement;
use nullref\core\traits\MigrationTrait;
use nullref\eav\helpers\Migration as EavHelper;
use nullref\eav\models\Types;
use yii\db\Migration;

class m170520_175671_requirement_setup_eav extends Migration
{
    use MigrationTrait;

    public function safeUp()
    {
        return EavHelper::createSet(Requirement::EAV_SET, 'Requirement', [
            [
                'attributes' => [
                    'name' => 'Об\'єм',
                    'code' => 'amount',
                    'type' => Types::TYPE_STRING,
                    'sort_order' => 1,
                ],
                'config' => [
                    'show_in_grid' => true,
                ],
            ],
            [
                'attributes' => [
                    'name' => 'Опис',
                    'code' => 'description',
                    'type' => Types::TYPE_TEXT,
                    'sort_order' => 2,
                ],
                'config' => [
                    'show_in_grid' => false,
                ],
            ],
            [
                'attributes' => [
                    'name' => 'Примітка',
                    'code' => 'note',
                    'type' => Types::TYPE_TEXT,
                    'sort_order' => 3,
                ],
                'config' => [
                    'show_in_grid' => false,
                ],
            ],
        ]);
    }

    public function safeDown()
    {
    }
}
