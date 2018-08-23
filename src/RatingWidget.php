<?php

namespace lacepek\rating;

use Yii;
use yii\bootstrap\InputWidget;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class RatingWidget extends InputWidget
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();

        RatingWidgetAsset::register($this->getView());

        $id = $this->options['id'];
        $parentId = "field-$id";

        $this->clientOptions['inputSelector'] = "#$id";
        $this->clientOptions['parentSelector'] = ".$parentId";

        $value = BaseHtml::getAttributeValue($this->model, $this->attribute);

        if ($value) {
            $this->clientOptions['value'] = $value;
        }

        $lines = [];
        if ($this->hasModel()) {
            $lines[] = Html::activeHiddenInput($this->model, $this->attribute, ['id' => $id]);
        }

        $configJson = json_encode($this->clientOptions);

        $js = <<<JS
RatingPluginApi.create($configJson);
JS;

        $this->getView()->registerJs($js);

        return implode("\n", $lines);
    }
}
