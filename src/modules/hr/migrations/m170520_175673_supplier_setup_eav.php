<?php

use app\modules\hr\models\Supplier;
use nullref\eav\helpers\Migration as EavHelper;
use nullref\eav\models\Types;
use yii\db\Migration;

class m170520_175673_supplier_setup_eav extends Migration
{
    public function safeUp()
    {
        return EavHelper::createSet(Supplier::EAV_SET, 'Supplier', [
            [
                'attributes' => [
                    'name' => 'ПІБ (назва компанії) ',
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
                    'name' => 'Eлектронна пошта',
                    'code' => 'email',
                    'type' => Types::TYPE_STRING,
                    'sort_order' => 3,
                ],
                'config' => [
                    'show_in_grid' => false,
                ],
            ],
            [
                'attributes' => [
                    'name' => 'Описовий блок (пропозиції)',
                    'code' => 'description',
                    'type' => Types::TYPE_TEXT,
                    'sort_order' => 4,
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
