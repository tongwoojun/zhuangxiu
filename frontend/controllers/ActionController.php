<?php

namespace frontend\controllers;

use common\con\FrontendController;

class ActionController extends FrontendController{

    public function actionIndex(){
        return $this->render('index');
    }

}
