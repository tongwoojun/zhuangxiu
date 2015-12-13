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
                'value'=> function($data){return $data->key->name;},
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
