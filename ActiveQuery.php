<?php

namespace denis909\yii2;

abstract class ActiveQuery extends \yii\db\ActiveQuery
{
    
    public function behaviors()
    {
        $event = new BehaviorsEvent;

        $event->sender = $this;

        $event->behaviors = parent::behaviors();

        $this->trigger(static::EVENT_BEHAVIORS, $event);

        return $event->behaviors;
    }

}