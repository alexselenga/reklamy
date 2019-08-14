<?php

/* @var $this yii\web\View */
/* @var $identData array */

use app\widgets\IdentDataWidget;
use app\widgets\BasketWidget;

$this->title = 'Basket Test';

echo IdentDataWidget::widget(['identData' => $identData]);

echo BasketWidget::widget(['identData' => $identData]);

