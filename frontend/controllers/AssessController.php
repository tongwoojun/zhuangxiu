<?php

namespace frontend\controllers;

use common\con\FrontendController;

class AssessController extends FrontendController{

    public function actionIndex()
    {
        return $this->render('index');
    }

}
