<?php

namespace lacepek\rating;

use Yii;
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;


class RatingWidget extends Widget
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        RatingWidgetAsset::register($view);

        echo $this->getRating();
    }

    public function getRating()
    {
        return '<p>foo</p>';
    }
}
