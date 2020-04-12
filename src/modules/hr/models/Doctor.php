<?php

namespace app\modules\hr\models;

use nullref\eav\behaviors\Entity;
use nullref\eav\models\attribute\Set;
use nullref\eav\models\Entity as EntityModel;
use nullref\useful\helpers\Memoize;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%doctor}}".
 *
 * @property int $id
 * @property string $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EntityModel $eav
 */
class Doctor extends \yii\db\ActiveRecord
{
    const EAV_SET = 'doctor';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%doctor}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],
            'eav' => [
                'class' => Entity::class,
                'entity' => function () {
                    return new EntityModel([
                        'sets' => [
                            Memoize::call([Set::class, 'findOne'], [['code' => self::EAV_SET]]),
                        ],
                    ]);
                },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DoctorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DoctorQuery(get_called_class());
    }
}
