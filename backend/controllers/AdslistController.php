<?php

namespace backend\controllers;

use Yii;
use common\models\Adslist;
use backend\models\AdslistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdslistController implements the CRUD actions for Adslist model.
 */
class AdslistController extends Controller
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
     * Lists all Adslist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdslistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adslist model.
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
     * Creates a new Adslist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($aid)
    {
        $model = new Adslist();
        $model->aid = $aid;
        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'img');
            if($img) {
                $model->img = "/uploads/ads/ads_" . time() . '.' . $img->extension;
            }
            if ($model->save()) {
                if($img){
                    $img->saveAs(Yii::$app->params['uploadDir'].$model->img);
                }
                return $this->redirect(['ads/view', 'id' => $model->aid]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Adslist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldimg = $model->oldAttributes['img'];

        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'img');
            $model->img = $oldimg;
            if($img){
                if(!$model->oldAttributes['img']){
                    $model->img = "/uploads/ads/ads_" . time() . '.' . $img->extension;
                }
            }

            if ($model->save()) {
                if($img){
                    $img->saveAs(Yii::$app->params['uploadDir'].$model->img);
                }
                return $this->redirect(['ads/view', 'id' => $model->aid]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Adslist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $aid = $model->aid;
        $model->delete();
        return $this->redirect(['ads/view', 'id' => $aid]);
    }

    /**
     * Finds the Adslist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adslist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Adslist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
