<?php

use app\modules\hr\models\Doctor;
use nullref\eav\helpers\Migration as EavHelper;
use nullref\eav\models\Types;
use yii\db\Migration;

class m170520_175674_doctor_setup_eav extends Migration
{
    public function safeUp()
    {
        return EavHelper::createSet(Doctor::EAV_SET, 'Doctor', [
            [
                'attributes' => [
                    'name' => 'ПІБ',
                    'code' => 'name',
                    'type' => Types::TYPE_STRING,
                    'sort_order' => 1,
                ],
                'config' => [
                    'show_in_grid' => true,
                ],
            ],
            [
                'attributes' => [
                    'name' => 'Телефон',
                    'code' => 'telephone',
                    'type' => Types::TYPE_STRING,
                    'sort_order' => 2,
                ],
                'config' => [
                    'show_in_grid' => true,
                ],
            ],
            [
                'attributes' => [
                    'name' => 'Місце проживання',
                    'code' => 'address',
                    'type' => Types::TYPE_STRING,
                    'sort_order' => 3,
                ],
                'config' => [
                    'show_in_grid' => true,
                ],
            ],
            [
                'attributes' => [
                    'name' => 'Медична спеціальність',
                    'code' => 'medical_specialty',
                    'type' => Types::TYPE_TEXT,
                    'sort_order' => 4,
                ],
                'config' => [
                    'show_in_grid' => false,
                ],
            ],
            [
                'attributes' => [
                    'name' => 'Вік',
                    'code' => 'age',
                    'type' => Types::TYPE_INT,
                    'sort_order' => 5,
                ],
                'config' => [
                    'show_in_grid' => false,
                ],
            ],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%supplier}}');
    }
}
