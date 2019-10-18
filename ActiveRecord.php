<?php

namespace denis909\yii2;

use ReflectionClass;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;

abstract class ActiveRecord extends \yii\db\ActiveRecord
{

    const EVENT_RULES = 'rules';

    const EVENT_BEHAVIORS = 'behaviors';

    const EVENT_ATTRIBUTE_LABELS = 'attributeLabels';

    public function rules()
    {
        return Yii::$app->params[static::class . 'Rules']
    }

    public function behaviors()
    {
        return Yii::$app->params[static::class . 'Behaviors']
    }

    public function attributeLabels()
    {
        return Yii::$app->params[static::class . 'AttributeLabels']
    }

}