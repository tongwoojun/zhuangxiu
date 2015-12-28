<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdslistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adslist-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加', ['create','aid'=>$searchModel->aid], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => "aid",
                //'filter'=>common\models\Ads::getData(),
                'value'=>function($model){
                    return $model->ad->title;
                },
            ],
            'name',
            //'desc:ntext',
            'url:url',
            // 'img',
            'stime',
            'etime',
            'sort',
            [
                'attribute' => "status",
                'filter'=>$searchModel->status_list,
                'value'=>function($model){
                    return $model->status_list[$model->status];
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
