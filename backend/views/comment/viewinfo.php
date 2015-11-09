<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h5>用户信息</h5>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            ['label'=>'照片','format'=>'raw','value'=>'<img src="'.Url::to([$model->img]).'" class="img-rounded" width="170" width="130">'],
            'age',
            'from',
            'stars1',
            'stars2',
            'stars3',
            'stars4',
        ],
    ]) ?>

    <h5>评论列表</h5>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            //id',
            //'tid',
            'ip',
            //'comment',
            'stars1',
            'stars2',
            'stars3',
            'stars4',
            'time:datetime',
            ['attribute' => 'status',
                'value' =>function ($model) {
                    return $model->comment_status_list[$model->status];
                },
                'filter' => $model->status_list
            ],

            [   'class' => 'yii\grid\ActionColumn',
                'template' => '{check-comment} {view} {update} {delete}',
                'buttons' => [
                    'check-comment' => function ($model,$data) {
                        $options = ['title' => '快速审核'];
                        if($data->status == 1){
                            $url = Url::to(['comment/qcheck','id'=>$data->id,'status'=>0]);
                            $img = '<span class="glyphicon glyphicon-remove"></span>';
                        }else{
                            $url = Url::to(['comment/qcheck','id'=>$data->id,'status'=>1]);
                            $img = '<span class="glyphicon glyphicon-ok"></span>';
                        }
                        return Html::a($img, $url, $options);
                    },
                ]
            ],
        ],
    ]); ?>

</div>
