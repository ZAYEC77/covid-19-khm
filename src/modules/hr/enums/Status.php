<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2020 NRE
 */


namespace app\modules\hr\enums;


use Yii;

class Status
{
    const ON_MODERATION = 'on_moderation';
    const PUBLIC = 'published';

    public static function getValue($key)
    {
        return self::getList()[$key] ?? Yii::t('app', 'N/A');
    }

    public static function getList()
    {
        return [
            self::ON_MODERATION => Yii::t('app', 'On moderation'),
            self::PUBLIC => Yii::t('app', 'Published'),
        ];
    }
}
