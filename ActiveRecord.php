<?php

namespace denis909\yii2;

use Yii;

class ActiveRecord extends \yii\db\ActiveRecord implements ModelInterface
{

    use ModelTrait;

    public static function instantiate($row)
    {
        return Yii::createObject(['class' => static::class]);
    }

}