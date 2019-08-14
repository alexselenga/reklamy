<?php

namespace app\ext;

/**
 * Используется в наследуемых классах от \yii\db\ActiveRecord вместе с \app\ext\IdentInterface
 */
trait IdentTrait
{
    /**
     * Возвращает название атрибута первичного ключа (<Название таблицы>_id)
     * @return string
     */
    public static function getPkColumnName()
    {
        return static::tableName() . '_id';
    }

    /**
     * Возвращает название атрибута идентификации (<Название таблицы>_name)
     * @return string
     */
    public static function getIdentColumnName()
    {
        return static::tableName() . '_name';
    }
}
