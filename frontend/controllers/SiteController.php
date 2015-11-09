<?php
namespace frontend\controllers;

use Yii;
use common\con\FrontendController;

/**
 * Site controller
 */
class SiteController extends FrontendController{

    public function actionIndex(){
        return $this->render('index');
    }
}
