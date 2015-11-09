<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告管理';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="ads-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建广告', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'type',
                'filter' =>$searchModel->getTypeList(),
                'value'=> function($data){return $data->getTypeList($data->type);},
            ],
            'title',
            [
                'attribute' => 'desc',
                'value'=> function($data){return StringHelper::truncate($data->desc,10);},
            ],
            [
                'attribute' => 'status',
                'filter' =>$searchModel->status_list,
                'value'=> function($data){return $data->status_list[$data->status];},
            ],
            [
                'label' => '查看广告列表',
                'filter' => false,
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a('<span class="glyphicon glyphicon-list"></span>查看广告', ['adslist/index','AdslistSearch[aid]'=>$data->id], ['title' => '广告列表']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
