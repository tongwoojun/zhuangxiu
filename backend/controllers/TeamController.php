<?php

namespace backend\controllers;

use Yii;
use common\models\Team;
use common\models\TeamImg;
use backend\models\TeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\data\ActiveDataProvider;

use yii\web\UploadedFile;

/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
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
     * Lists all Team models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Team model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => TeamImg::find()->andWhere(['tid'=>$model->id,'status'=>1])->orderBy('id desc'),
        ]);

        return $this->render('view', [
            'model' => $model,
            'dataProvider'=>$dataProvider
        ]);
    }

    /**
     * Creates a new Team model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Team();

        if ($model->load(Yii::$app->request->post())) {
            if($model->rec){
                $model->rec = implode(',',$model->rec);
            }
            $is_upload = true;
            $img = UploadedFile::getInstance($model, 'img');
            $model->img = 'uploads/img/' . time() . '.' . $img->extension;
            if ($img && $model->validate()) {
                $is_upload = $img->saveAs($model->img);
            }

            if($is_upload && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
                'model' => $model,
            ]);
    }

    /**
     * Updates an existing Team model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->rec){
                $model->rec = implode(',',$model->rec);
            }
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

        if($model->rec){
            $model->rec = explode(',',$model->rec);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Team model.
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
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Team::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
