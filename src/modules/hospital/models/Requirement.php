<?php

namespace app\modules\hospital\models;

use nullref\eav\behaviors\Entity;
use nullref\eav\models\attribute\Set;
use nullref\eav\models\Entity as EntityModel;
use nullref\useful\helpers\Memoize;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%requirement}}".
 *
 * @property int $id
 * @property string|null $name
 * @property int $hospital_id
 * @property string $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EntityModel $eav
 *
 * @property Hospital $hospital
 */
class Requirement extends \yii\db\ActiveRecord
{
    const EAV_SET = 'requirement';

    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DONE = 'done';

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => Yii::t('app','New'),
            self::STATUS_IN_PROGRESS => Yii::t('app','In Progress'),
            self::STATUS_DONE => Yii::t('app','Done'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%requirement}}';
    }

    /**
     * {@inheritdoc}
     * @return RequirementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequirementQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hospital_id', 'status', 'name'], 'required'],
            [['hospital_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'status'], 'string', 'max' => 255],
            [['hospital_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hospital:: class, 'targetAttribute' => ['hospital_id' => 'id']],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'hospital_id' => Yii::t('app', 'Hospital ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Hospital]].
     *
     * @return \yii\db\ActiveQuery|HospitalQuery
     */
    public function getHospital()
    {
        return $this->hasOne(Hospital:: class, ['id' => 'hospital_id']);
    }
}
