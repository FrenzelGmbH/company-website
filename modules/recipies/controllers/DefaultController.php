<?php

namespace app\modules\recipies\controllers;

use app\modules\app\controllers\AppController;

class DefaultController extends AppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
