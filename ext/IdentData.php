<?php


namespace app\ext;

/**
 * Статический класс-помощник для работы с моделями, реализующими yii\db\ActiveRecordInterface и app\ext\IdentInterface
 */
class IdentData
{
    /**
     * Возвращает набор данных "Ключ => значение".
     * @param IdentInterface $identModelClassName. Класс объекта ORM. Объект должен реализовать интерфейсы yii\db\ActiveRecordInterface и app\ext\IdentInterface.
     * @return array. Результат в виде: ['1' => 'name1', '2' => 'name2', ...]. Пустой массив, если параметр функции ошибочный.
     */
    public static function getIdentData($identModelClassName) {
        $result = [];

        if (is_subclass_of($identModelClassName,'app\ext\IdentInterface') && is_subclass_of($identModelClassName,'yii\db\ActiveRecordInterface')) {
            $pkColumnName = $identModelClassName::getPkColumnName();
            $identColumnName = $identModelClassName::getIdentColumnName();
            $models = $identModelClassName::find()->all();

            foreach ($models as $model) {
                $result[$model->$pkColumnName] = $model->$identColumnName;
            }
        }

        return $result;
    }
}