<?php

namespace denis909\yii;

use yii\base\Model;

class ModelException extends \yii\base\Exception
{

    public function __construct(Model $model)
    {
        $errors = $model->getFirstErrors();

        $error = array_shift($errors);
        
        parent::__construct($error);
    }

}