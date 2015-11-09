<?php

namespace frontend\controllers;

use Yii;

use yii\data\Pagination;

use common\models\Qa;
use common\models\Qacomment;
use common\con\FrontendController;

use yii\data\ActiveDataProvider;

class QaController extends FrontendController{

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => Qa::find()->where(['status'=>1])->orderBy('id desc'),
            'pagination' => [
                'pageSize' => 14,
            ],
        ]);
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

    public function actionDetail($id){
        $this->getList();
        $model = $this->findModel($id);

        $query = Qacomment::find()->where(['qid'=>$model->id,'status'=>'1']);
        $pagination = new Pagination(['defaultPageSize' => 8, 'totalCount' => $query->count()]);
        $comment = $query->orderBy('id desc')->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('detail',['model'=>$model,'comment'=>$comment,'page' => $pagination]);
    }

    protected function findModel($id){
        if (($model = Qa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('对不起，请求的页面不存在');
        }
    }

    public function actionAjaxsubmit(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->user->isGuest) {
            return ['status' => 0, 'info' => '请登录'];
        }

        if (!Yii::$app->request->isAjax) {
            return ['status' => 0, 'info' => '你提交数据有问题'];
        }

        $data = Yii::$app->request->post();
        $id = intval($data['id']);
        $comment = $data['comment'];
        $uid = Yii::$app->user->id;

        if ((Qa::findOne($id)) === null) {
            return ['status' => 0, 'info' => '你提交数据有问题'];
        }

        $model = new Qacomment();
        $iscan = $model->canComment($id,$uid);
        if (!$iscan) {
            return ['status' => 0, 'info' => '你回复的条数已达上限'];
        }

        $model->qid = $id;
        $model->ip = Yii::$app->request->userIP;
        $model->type = 1;
        $model->comment = $comment;

        if($model->save()){
            return ['status' => 1, 'info' => '回复成功'];
        }else{
            $errors = $model->getErrors();
            foreach($errors as $value){
                return ['status' => 0, 'info' =>$value[0] ];
            }
        }
    }
}
