<?php

namespace lacepek\rating;

use yii\web\AssetBundle;

class RatingWidgetAsset extends AssetBundle
{
    public $sourcePath = '@vendor/lacepek/rating-plugin';

    public $js = ['js/rating.js'];
}
