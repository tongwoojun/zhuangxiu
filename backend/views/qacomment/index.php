<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QacommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '翻新问答聊天记录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qacomment-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'qid',
            'ip',
            [
                'attribute' => 'type',
                'filter' =>$searchModel->type_list,
                'value'=> function($data){return $data->type_list[$data->type];},
            ],
            'comment',
            'time',
            [
                'attribute' => 'status',
                'filter' =>$searchModel->status_list,
                'value'=> function($data){return $data->status_list[$data->status];},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
