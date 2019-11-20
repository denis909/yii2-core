<?php

namespace denis909\yii2;

trait ModelTrait
{

    public function attributes()
    {
        $event = new AttributesEvent;

        $event->attributes = parent::attributes();

        $this->trigger(self::EVENT_ATTRIBUTES, $event);

        return $event->attributes;
    }

    public function attributeHints()
    {
        $event = new AttributeHintsEvent;

        $event->attributeHints = parent::attributeHints();

        $this->trigger(self::EVENT_ATTRIBUTE_HINTS, $event);

        return $event->attributeHints;
    }

    public function rules()
    {
        $event = new RulesEvent;

        $event->rules = parent::rules();

        $this->trigger(self::EVENT_RULES, $event);

        return $event->rules;
    }

    public function attributeLabels()
    {
        $event = new AttributeLabelsEvent;

        $event->attributeLabels = parent::attributeLabels();

        $this->trigger(self::EVENT_ATTRIBUTE_LABELS, $event);

        return $event->attributeLabels;
    }    

}