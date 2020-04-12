<?php


use app\modules\hospital\models\Hospital;
use nullref\eav\helpers\Migration as EavHelper;
use nullref\eav\models\Types;
use yii\db\Migration;

class m170520_175643_hospital_setup_eav extends Migration
{
    public function safeUp()
    {
        return EavHelper::createSet(Hospital::EAV_SET, 'Hospital', [
            [
                'attributes' => [
                    'name' => 'Телефон',
                    'code' => 'telephone',
                    'type' => Types::TYPE_STRING,
                    'sort_order' => 1,
                ],
                'config' => [
                    'show_in_grid' => true,
                ],
            ],
            [
                'attributes' => [
                    'name' => 'Адреса',
                    'code' => 'address',
                    'type' => Types::TYPE_TEXT,
                    'sort_order' => 2,
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
