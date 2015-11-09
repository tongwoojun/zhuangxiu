<?php

namespace frontend\controllers;

use Yii;
use common\models\Scene;
use common\con\FrontendController;

use yii\web\NotFoundHttpException;
use backend\models\SceneSearch;

class SceneController extends FrontendController{

    public function actionIndex(){
        $this->getList();
        $searchModel = new SceneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $where = $dataProvider->query->where;
        return $this->render('index',['dataProvider' => $dataProvider,'where'=>$where]);
    }

    public function actionDetail($id){
        $this->getList();
        $model = $this->findModel($id);
        return $this->render('detail',['model'=>$model]);
    }

    protected function findModel($id){
        if (($model = Scene::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('对不起，请求的页面不存在');
        }
    }
}
