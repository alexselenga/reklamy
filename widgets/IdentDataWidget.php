<?php


namespace app\widgets;

use yii\base\InvalidConfigException;

/**
 * Выводит данные, указанные в $identData, например:
 * 'billboard' => [ //Идентификатор. Используется в разметке html и в js.
 *   'caption' => 'BillBoards', //Подпись
 *   'data' => ['1' => 'name1', '2' => 'name2', ...], //Данные
 * ],
 *
 * Для каждого идентификатора выводится отдельная вкладка с подписью caption.
 * В каждой вкладке список элементов с CheckBox из поля data.
 * При выборе (CheckBox), элемент дублируется в корзине, если корзина присутствует.
 * Для виджета предусмотрен заголовок 'Товары и услуги'.
 * Виджет должен быть один на странице (id="ident-data").
 * Применяется вместе с корзиной (BasketWidget).
 * Для работы виджета необходим скрипт site.js.
 */
class IdentDataWidget extends \yii\base\Widget
{
    public $identData = null;


    public function init()
    {
        parent::init();

        if ($this->identData === null) {
            throw new InvalidConfigException('The "identData" property must be set.');
        }
    }

    public function run()
    {
        echo '<div id="ident-data">';
            echo '<h3>Товары и услуги</h3>';
            echo '<div>';
                echo '<ul class="nav nav-tabs" role="tablist">';
                    $active = 'active';

                    foreach ($this->identData as $identModelName => $identModelData) {
                        $this->showModelLink($identModelName, isset($identModelData['caption']) ? $identModelData['caption'] : $identModelName, $active);
                        $active = '';
                    }
                echo '</ul>';
            echo '</div>';
            echo '<br>';
            echo '<div class="tab-content">';
                $active = 'active';

                foreach ($this->identData as $identModelName => $identModelData) {
                    $this->showModel($identModelName,isset($identModelData['data']) ? $identModelData['data'] : [], $active);
                    $active = '';
                }
            echo '</div>';
        echo '</div>';
    }

    /**
     * Выводит заголовок вкладки
     * @param $identModelName. Идентификатор из массива $identData.
     * @param $caption. Подпись вкладки.
     * @param $active. Значение 'active', если вкладка активная, иначе пусто ('').
     */
    protected function showModelLink($identModelName, $caption, $active) {
        echo "<li role='presentation' class='$active'><a href='#$identModelName' aria-controls='$identModelName' role='tab' data-toggle='tab'>$caption</a></li>";
    }

    /**
     * Выводит данные вкладки
     * @param $identModelName. Идентификатор из массива $identData.
     * @param $data. Данные из массива $identData.
     * @param $active. Значение 'active', если вкладка активная, иначе пусто ('').
     */
    protected function showModel($identModelName, $data, $active) {
        echo "<div role='tabpanel' class='tab-pane $active' id='$identModelName'>";
            echo "<div class='panel panel-default' name='$identModelName'>";
                echo '<ul class="list-group">';
                    foreach ($data as $key => $name) {
                        echo "<li class='list-group-item' key='$key'><input type='checkbox'> $name ($key)</li>";
                    }
                echo '</ul>';
            echo '</div>';
        echo '</div>';
    }
}