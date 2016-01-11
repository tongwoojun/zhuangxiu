<?php

namespace frontend\controllers;

use common\con\FrontendController;

use Yii;
use common\models\Form;

class ActionController extends FrontendController{

    public function actionIndex(){
        return $this->render('index');
    }


    public function actionGetform(){
        $model = new Form();
        if ($model->load(Yii::$app->request->get())) {
            $model->ip = Yii::$app->request->userIP;
            if ($model->save()) {
                return $this->toJson(['status' => 1, 'info' => '提交成功']);
            }else{
                $error = $model->getErrors();
                if(!$error){
                    return $this->toJson(['status' => -1, 'info' => '未知错误']);
                }
                foreach($error as $value){
                    return $this->toJson(['status' => 0, 'info' => $value[0]]);
                }
            }
        }
    }

}
