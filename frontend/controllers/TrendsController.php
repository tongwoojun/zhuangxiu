<?php

namespace frontend\controllers;

use common\models\Trends;
use common\con\FrontendController;

class TrendsController extends FrontendController{

    public function actionIndex(){
        $data = $this->cache->get("trends");
        if(!$data) {
            $data = Trends::getData('6');
            $this->cache->set("trends", $data, $this->cache_time);
        }
        return $this->render('index',['data'=>$data]);
    }

    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => Trends::find()->where(['status'=>1])->orderBy('id desc'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('list',['dataProvider'=>$dataProvider]);
    }

    public function actionDetail($id){
        $model = $this->findModel($id);
        return $this->render('detail',['model'=>$model]);
    }

    protected function findModel($id){
        if (($model = Trends::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('对不起，请求的页面不存在');
        }
    }
}
