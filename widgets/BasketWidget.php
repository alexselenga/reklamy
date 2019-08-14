<?php


namespace app\widgets;

use yii\base\InvalidConfigException;

/**
 * Выводит изначально скрытую (hidden) корзину по структуре, указанной в $identData, например:
 * 'billboard' => [ //Идентификатор. Используется в разметке html и в js.
 *   'caption' => 'BillBoards', //Подпись
 * ],
 *
 * Для каждого идентификатора выводится отдельная панель с подписью caption.
 * Впоследствии рядом с подписью будет указано количество элементов на панели. Подписи нет, если значений на панели нет.
 * В каждой вкладке список значений с CheckBox, отмеченных в виджете IdentDataWidget.
 * При отмене (CheckBox), элемент пропадает в корзине. Это также влияет на флажок такого же элемента в IdentDataWidget.
 * Для виджета предусмотрен заголовок 'Корзина'.
 * Виджет должен быть один на странице (id="basket").
 * Применяется вместе с исходными данными (IdentDataWidget).
 * Для работы виджета необходим скрипт site.js.
 */
class BasketWidget extends \yii\base\Widget
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
        echo '<div role="tabpanel" class="tab-pane hidden" id="basket">';
            echo '<h3>Корзина</h3>';

            foreach ($this->identData as $identModelName => $identModelData) {
                $this->showModel($identModelName,isset($identModelData['caption']) ? $identModelData['caption'] : $identModelName);
            }
        echo '</div>';
    }

    /**
     * Выводит панель для отдельного идентификатора из массива $identData.
     * @param $identModelName. Иденификатор.
     * @param $caption. Подпись панели.
     */
    protected function showModel($identModelName, $caption) {
        echo "<div class='panel panel-default hidden' name='$identModelName'>";
            echo '<div class="panel-heading">';
                echo "<h3 class='panel-title'>$caption</h3>";
            echo '</div>';
            echo '<ul class="list-group"></ul>';
        echo '</div>';
    }
}