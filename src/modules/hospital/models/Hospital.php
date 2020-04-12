<?php

namespace app\modules\hospital\models;

use nullref\eav\behaviors\Entity;
use nullref\eav\models\attribute\Set;
use nullref\eav\models\Entity as EntityModel;
use nullref\useful\helpers\Memoize;
use nullref\useful\traits\Mappable;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "{{%hospital}}".
 *
 * @property int $id
 * @property string|null $identifier
 * @property string|null $name
 *
 * @property Requirement[] $requirements
 *
 * @property EntityModel $eav
 *
 */
class Hospital extends \yii\db\ActiveRecord
{
    use Mappable;

    const EAV_SET = 'hospital';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%hospital}}';
    }

    /**
     * {@inheritdoc}
     * @return HospitalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HospitalQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identifier', 'name'], 'string', 'max' => 255],
            [['identifier'], 'unique'],
            [['name'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'identifier' => Yii::t('app', 'Identifier'),
            'name' => Yii::t('app', 'Name'),
            'requirements' => Yii::t('app', 'Requirements'),
        ];
    }

    /**
     * Gets query for [[Requirements]].
     *
     * @return \yii\db\ActiveQuery|RequirementQuery
     */
    public function getRequirements()
    {
        return $this->hasMany(Requirement::class, ['hospital_id' => 'id']);
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
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
            'slug' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'name',
                'slugAttribute' => 'identifier',
                'ensureUnique' => true,
                'skipOnEmpty' => true,
            ],
        ];
    }
}
