<?php

namespace frontend\controllers;

use common\models\Trends;
use common\con\FrontendController;
use yii\data\ActiveDataProvider;

class TrendsController extends FrontendController{

    public function actionIndex(){
        $data = $this->cache->get("trends");
        if(!$data) {
            $data = Trends::getData('6');
            $this->cache->set("trends", $data, $this->cache_time);
        }
        return $this->render('index',['data'=>$data]);
    }

    public function actionList($type){
        $dataProvider = new ActiveDataProvider([
            'query' => Trends::find()->where(['status'=>1,'type'=>$type])->orderBy('id desc'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        if($dataProvider->models){
            $title = $dataProvider->models[0]->type_list[$type];
        }


        return $this->render('list',['title'=>$title,'dataProvider'=>$dataProvider]);
    }

    public function actionDetail($id){
        $model = $this->findModel($id);
        return $this->render('detail',['model'=>$model]);
    }

    protected function findModel($id){
        if (($model = Trends::findOne(['id'=>$id,'status'=>1])) !== null) {
            $model->views += 1;
            $model->save();
            return $model;
        } else {
            throw new NotFoundHttpException('对不起，请求的页面不存在');
        }
    }
}
