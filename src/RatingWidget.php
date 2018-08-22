<?php

namespace lacepek\rating;

use Yii;
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class RatingWidget extends Widget
{
    public $config = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        RatingWidgetAsset::register($this->getView());

        $configJson = json_encode($this->config);

        $js = <<<JS
RatingPluginApi.create($configJson);
JS;

        $this->getView()->registerJs($js);
    }
}
