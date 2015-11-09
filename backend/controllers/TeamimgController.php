<?php

namespace backend\controllers;

use Yii;
use common\models\Team;
use common\models\TeamImg;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TeamimgController implements the CRUD actions for TeamImg model.
 */
class TeamimgController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TeamImg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TeamImg::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TeamImg model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TeamImg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeamImg();

        if ($model->load(Yii::$app->request->post())) {
            $is_upload = true;
            $img = UploadedFile::getInstance($model, 'img');
            $model->img = 'uploads/img_list/' . time() . '.' . $img->extension;
            if ($img && $model->validate()) {
                $is_upload = $img->saveAs($model->img);
            }

            if($is_upload && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id,'tid' => $model->tid]);
            }
        }

        $tid = Yii::$app->request->get('tid',0);
        if($tid){
            $model->tid =$tid;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TeamImg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $is_upload = true;
            $img = UploadedFile::getInstance($model, 'img');
            $model->img = $model->oldAttributes['img'];
            if ($img && $model->validate()) {
                $model->img = 'uploads/img/' . time() . '.' . $img->extension;
                $is_upload = $img->saveAs($model->img);
            }

            if($is_upload && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TeamImg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TeamImg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TeamImg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TeamImg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionViewinfo($tid){
        $model = Team::findOne($tid);

        $dataProvider = new ActiveDataProvider([
            'query' => TeamImg::find()->andWhere(['tid'=>$tid]),
        ]);
        return $this->render('viewinfo', [
            'model' => $model, 'dataProvider'=>$dataProvider
        ]);
    }
}
