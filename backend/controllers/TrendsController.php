<?php

namespace backend\controllers;

use Yii;
use common\models\Trends;
use backend\models\TrendsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TrendsController implements the CRUD actions for Trends model.
 */
class TrendsController extends Controller
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

    public function actions()
    {
        return [
            'Kupload' => [
                'class' => 'pjkui\kindeditor\KindEditorAction',
            ]
        ];
    }

    /**
     * Lists all Trends models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrendsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trends model.
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
     * Creates a new Trends model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trends();

        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'img');
            $short_img = UploadedFile::getInstance($model, 'short_img');
            $model->img = "/uploads/qa/qa_" . time() . '.' . $img->extension;
            $model->short_img = "/uploads/qa/qas_" . time() . '.' . $short_img->extension;
            if ($model->save()) {
                $img->saveAs(Yii::$app->params['uploadDir'].$model->img);
                $short_img->saveAs(Yii::$app->params['uploadDir'].$model->short_img);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trends model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->img = $model->oldAttributes['img'];
            $model->short_img = $model->oldAttributes['img'];
            $img = UploadedFile::getInstance($model, 'img');
            $short_img = UploadedFile::getInstance($model, 'short_img');
            if($img){
                $img->saveAs(Yii::$app->params['uploadDir'].$model->img);
            }
            if($short_img){
                $short_img->saveAs(Yii::$app->params['uploadDir'].$model->short_img);
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trends model.
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
     * Finds the Trends model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trends the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trends::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
