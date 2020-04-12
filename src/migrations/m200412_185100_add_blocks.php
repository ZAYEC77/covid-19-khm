<?php

use nullref\cms\models\Block;
use yii\db\Migration;

class m200412_185100_add_blocks extends Migration
{
    public function safeUp()
    {
        /** @var Block $existBlock */

        $existBlock = Block::findOne(['id' => 'general_info']);
        if ($existBlock) {
            $oldId = 'old_' . $existBlock->id;
            $existBlock->id = $oldId;
            $existBlock->save();
        }
        $this->insert(Block::tableName(), [
            'id' => 'general_info',
            'class_name' => 'html',
            'name' => 'Загальна інформація',
            'visibility' => '1',
            'config' => serialize([
                "content" => "<p>Контактні дані кол-центру, номери для зв'язку ...</p>\r\n",
                "tag" => "div",
                "tagClass" => "",
                "id" => NULL
            ]),
            'created_at' => 1586717517,
            'updated_at' => 1586717517,
        ]);


        $existBlock = Block::findOne(['id' => 'hospital_needs']);
        if ($existBlock) {
            $oldId = 'old_' . $existBlock->id;
            $existBlock->id = $oldId;
            $existBlock->save();
        }
        $this->insert(Block::tableName(), [
            'id' => 'hospital_needs',
            'class_name' => 'html',
            'name' => 'Потреби лікарень',
            'visibility' => '1',
            'config' => serialize([
                "content" => "<p>Список потреба для лікарень з вказаним об'ємом та іншими деталями\r\n</p>",
                "tag" => "div",
                "tagClass" => "",
                "id" => NULL
            ]),
            'created_at' => 1586717518,
            'updated_at' => 1586717518,
        ]);


        $existBlock = Block::findOne(['id' => 'join_fight']);
        if ($existBlock) {
            $oldId = 'old_' . $existBlock->id;
            $existBlock->id = $oldId;
            $existBlock->save();
        }
        $this->insert(Block::tableName(), [
            'id' => 'join_fight',
            'class_name' => 'html',
            'name' => 'Доєднатись до боротьби',
            'visibility' => '1',
            'config' => serialize([
                "content" => "<p>Ви можете подати свою заяку в якості лікаря, або волонтера за посиланнями:</p>\r\n",
                "tag" => "div",
                "tagClass" => "",
                "id" => NULL
            ]),
            'created_at' => 1586717520,
            'updated_at' => 1586717520,
        ]);


        $existBlock = Block::findOne(['id' => 'register_benefactor']);
        if ($existBlock) {
            $oldId = 'old_' . $existBlock->id;
            $existBlock->id = $oldId;
            $existBlock->save();
        }
        $this->insert(Block::tableName(), [
            'id' => 'register_benefactor',
            'class_name' => 'html',
            'name' => 'Я благодійник',
            'visibility' => '1',
            'config' => serialize([
                "content" => "<p>Заповніть, будь ласка, форму і ми зв'яжемось з Вами у випадку необхідності</p>\r\n",
                "tag" => "div",
                "tagClass" => "",
                "id" => NULL
            ]),
            'created_at' => 1586717523,
            'updated_at' => 1586717523,
        ]);


        $existBlock = Block::findOne(['id' => 'register_doctor']);
        if ($existBlock) {
            $oldId = 'old_' . $existBlock->id;
            $existBlock->id = $oldId;
            $existBlock->save();
        }
        $this->insert(Block::tableName(), [
            'id' => 'register_doctor',
            'class_name' => 'html',
            'name' => 'Я хочу бути лікарем резерву',
            'visibility' => '1',
            'config' => serialize([
                "content" => "<p>Заповніть, будь ласка, форму і ми зв'яжемось з Вами у випадку необхідності</p>\r\n",
                "tag" => "div",
                "tagClass" => "",
                "id" => NULL
            ]),
            'created_at' => 1586717527,
            'updated_at' => 1586717527,
        ]);


        $existBlock = Block::findOne(['id' => 'register_volunteer']);
        if ($existBlock) {
            $oldId = 'old_' . $existBlock->id;
            $existBlock->id = $oldId;
            $existBlock->save();
        }
        $this->insert(Block::tableName(), [
            'id' => 'register_volunteer',
            'class_name' => 'html',
            'name' => 'Я хочу бути волонтером',
            'visibility' => '1',
            'config' => serialize([
                "content" => "<p>Заповніть, будь ласка, форму і ми зв'яжемось з Вами у випадку необхідності</p>\r\n",
                "tag" => "div",
                "tagClass" => "",
                "id" => NULL
            ]),
            'created_at' => 1586717532,
            'updated_at' => 1586717532,
        ]);


        $existBlock = Block::findOne(['id' => 'suppliers']);
        if ($existBlock) {
            $oldId = 'old_' . $existBlock->id;
            $existBlock->id = $oldId;
            $existBlock->save();
        }
        $this->insert(Block::tableName(), [
            'id' => 'suppliers',
            'class_name' => 'html',
            'name' => 'Перелік постачальників',
            'visibility' => '1',
            'config' => serialize([
                "content" => "<p>Список постачальників з додатковою інформацією.</p>\r\n\r\n<p>Якщо ви бажаєте стати постачальників, або благодійником – подайте свою заявку за посиланням нижче:</p>\r\n",
                "tag" => "div",
                "tagClass" => "",
                "id" => NULL
            ]),
            'created_at' => 1586717538,
            'updated_at' => 1586717538,
        ]);


    }

    public function safeDown()
    {
        /** @var Block $oldBlock */

        $this->delete(Block::tableName(), ['id' => 'general_info']);

        $oldBlock = Block::findOne(['id' => 'old_general_info']);
        if ($oldBlock) {
            $oldBlock->id = 'general_info';
            $oldBlock->save();
        }


        $this->delete(Block::tableName(), ['id' => 'hospital_needs']);

        $oldBlock = Block::findOne(['id' => 'old_hospital_needs']);
        if ($oldBlock) {
            $oldBlock->id = 'hospital_needs';
            $oldBlock->save();
        }


        $this->delete(Block::tableName(), ['id' => 'join_fight']);

        $oldBlock = Block::findOne(['id' => 'old_join_fight']);
        if ($oldBlock) {
            $oldBlock->id = 'join_fight';
            $oldBlock->save();
        }


        $this->delete(Block::tableName(), ['id' => 'register_benefactor']);

        $oldBlock = Block::findOne(['id' => 'old_register_benefactor']);
        if ($oldBlock) {
            $oldBlock->id = 'register_benefactor';
            $oldBlock->save();
        }


        $this->delete(Block::tableName(), ['id' => 'register_doctor']);

        $oldBlock = Block::findOne(['id' => 'old_register_doctor']);
        if ($oldBlock) {
            $oldBlock->id = 'register_doctor';
            $oldBlock->save();
        }


        $this->delete(Block::tableName(), ['id' => 'register_volunteer']);

        $oldBlock = Block::findOne(['id' => 'old_register_volunteer']);
        if ($oldBlock) {
            $oldBlock->id = 'register_volunteer';
            $oldBlock->save();
        }


        $this->delete(Block::tableName(), ['id' => 'suppliers']);

        $oldBlock = Block::findOne(['id' => 'old_suppliers']);
        if ($oldBlock) {
            $oldBlock->id = 'suppliers';
            $oldBlock->save();
        }


        return true;
    }
}
