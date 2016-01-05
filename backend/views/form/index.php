<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '报名活动';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-index">




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'type',
                'filter' => $searchModel->type_list,
                'value'=> function($data){
                    return $data->type_list[$data->type];
                },
            ],
            'name',
            'tel',
            //'email:email',
            // 'adress',
            // 'desc',
            'ip',
            'time',
            // 'other',
            [
                'attribute' => 'status',
                'filter' =>[0=>'未确认',1=>'确认'],
                'value'=> function($data){return $data->status ==1?'确认':'未确认';},
            ],

            [   'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

</div>
