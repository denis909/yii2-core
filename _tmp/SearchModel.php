<?php

namespace denis909\yii;

use yii\db\Query;
use yii\data\ActiveDataProvider;

abstract class SearchModel extends \yii\base\Model
{

    const DATA_PROVIDER = ActiveDataProvider::class;

    const EVENT_APPLY_TO_QUERY = 'applyToQuery';

    const EVENT_CREATE_DATA_PROVIDER = 'createDataProvider';

    const EVENT_RULES = 'rules';

    const EVENT_BEHAVIORS = 'behaviors';

    const EVENT_ATTRIBUTE_LABELS = 'attributeLabels';

    public function applyToQuery(Query $query)
    {
        $event = new QueryEvent;

        $event->sender = $this;

        $event->query = $query;

        $this->trigger(static::EVENT_APPLY_TO_QUERY, $event);
    }

    public function createDataProvider(array $options = [])
    {
        $event = new OptionsEvent;

        $event->sender = $this;

        $event->options = $options;

        $this->trigger(static::EVENT_CREATE_DATA_PROVIDER, $event);

        $class = static::DATA_PROVIDER;

        return new $class($options);
    }

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