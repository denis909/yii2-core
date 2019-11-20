<?php

namespace denis909\yii2;

abstract class ActiveRecord extends \yii\db\ActiveRecord
{

    const EVENT_RULES = 'rules';

    const EVENT_BEHAVIORS = 'behaviors';

    const EVENT_ATTRIBUTE_LABELS = 'attributeLabels';

    public function rules()
    {
        $event = new RulesEvent;

        $event->sender = $this;

        $event->rules = parent::rules();

        $this->trigger(static::EVENT_RULES, $event);

        return $event->rules;
    }

    public function behaviors()
    {
        $event = new BehaviorsEvent;

        $event->sender = $this;

        $event->behaviors = parent::behaviors();

        $this->trigger(static::EVENT_BEHAVIORS, $event);

        return $event->behaviors;
    }

    public function attributeLabels()
    {
        $event = new AttributeLabelsEvent;

        $event->sender = $this;

        $event->attributeLabels = parent::attributeLabels();

        $this->trigger(static::EVENT_ATTRIBUTE_LABELS, $event);

        return $event->attributeLabels;
    }

}