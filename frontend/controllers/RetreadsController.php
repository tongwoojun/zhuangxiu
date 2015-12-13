<?php
namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

use common\con\FrontendController;
use common\models\Package;

class RetreadsController extends FrontendController{

    public function actionIndex(){
        $package = Package::getRec(5);
        return $this->render('index',['package'=>$package]);
    }

    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => Package::find()->where(['status'=>1])->orderBy('sort'),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        return $this->render('list',['dataProvider' => $dataProvider]);
    }

    public function actionDetail($id){
        $model = Package::findOne(['id'=>$id,'status'=>1]);
        if(!$model){
            throw new NotFoundHttpException('对不起,该翻新套餐不存在.');
        }
        return $this->render('detail',['model' => $model]);
    }
}
