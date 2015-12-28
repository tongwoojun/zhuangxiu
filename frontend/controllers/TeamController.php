<?php

namespace frontend\controllers;

use common\models\Team;
use common\models\Comment;
use common\models\TeamImg;

use Yii;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;
use yii\web\NotFoundHttpException;

use common\con\FrontendController;

class TeamController extends FrontendController{

    public function actionIndex(){
        $data = Team::getData();
        return $this->render('index',['data'=>$data]);
    }

    //todo: ln -s ../../backend/web/uploads/ uploads
    #施工队长列表
    public function actionList($type){
        $query = Team::find()->where(['type'=>$type]);
        $pagination = new Pagination(['defaultPageSize' => 16, 'totalCount' => $query->count()]);
        $data = $query->orderBy('id')->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('list', ['data' => $data, 'page' => $pagination]);
    }

    #施工队长详细
    public function actionDetail($id,$type){
        $model = Team::findOne(['id'=>$id,'type'=>$type]);
        if(!$model){
            throw new NotFoundHttpException('请求的页面不存在');
        }
        $query = Comment::find()->andWhere(['tid'=>$id,'status'=>'1']);
        $pagination = new Pagination(['defaultPageSize' => 12, 'totalCount' => $query->count()]);
        $comment = $query->orderBy('id')->offset($pagination->offset)->limit($pagination->limit)->all();
        $img = TeamImg::find()->andWhere(['tid'=>$id])->all();

        return $this->render('detail', ['model' => $model, 'img' => $img, 'comment' => $comment, 'page' => $pagination,]);
    }

    #评论
    public function actionAjrelease(){
        $id  = Yii::$app->request->post('id',0);
        if(!$id){
            $this->toJson(['status'=>0,'msg'=>'无效数据']);
        }
        $model = Team::findOne($id);
        if(!$model){
            $this->toJson(['status'=>0,'msg'=>'无效数据']);
        }

        $ip =  Yii::$app->request->userIP;
        $lastdata = Comment::find()->andWhere(['tid'=>$id,'ip'=>$ip,'status'=>'1'])->orderBy('id desc')->one();

        #同一个IP 每个一天评论一次
        $time = time();
        if($lastdata && ($time - $lastdata->time) <86400){
            $this->toJson(['status' => 0, 'msg' => '你已经评论过了，请不要重复']);
        }

        $model = new Comment();
        $model->tid = intval($id);
        $model->ip = $ip;

        $comment = Yii::$app->request->post('comment','');
        $model->comment = HtmlPurifier::process($comment);
        $model->stars1 = intval(Yii::$app->request->post('stars1',0));
        $model->stars2 = intval(Yii::$app->request->post('stars2',0));
        $model->stars3 = intval(Yii::$app->request->post('stars3',0));
        $model->stars4 = intval(Yii::$app->request->post('stars4',0));
        $model->status = 0;
        $model->time = $time;
        if ($model->save()){
            $this->toJson(['status'=>1,'msg'=>'感谢你的评论！']);
        }
        $this->toJson(['status'=>0,'msg'=>'评论失败，请联系管理员']);
    }
}
