<?php

namespace app\ext;

/**
 * Позволяет узнать название атрибута первичного ключа и атрибута для идентификации сущности (Наименование, Ф.И.О., и т.д.) для таблицы БД
 */
interface IdentInterface
{
    /**
     * Возвращает название атрибута первичного ключа
     * @return string
     */
    public static function getPkColumnName();

    /**
     * Возвращает название атрибута идентификации сущности
     * @return string
     */
    public static function getIdentColumnName();
}