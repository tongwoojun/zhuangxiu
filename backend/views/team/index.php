<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '队长活动';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">
    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            ['attribute' => 'img',
                'format'=>'raw',
                'value'=>function ($model) {
                    return Html::a('查看图片',Url::to([$model->img]), ['target'=>'_blank',]);
                },
                'filter' => false
            ],
            'age',
            'from',
            // 'desc',
            'stars1',
            'stars2',
            'stars3',
            'stars4',
            ['attribute' => 'status',
                'value' =>function ($model) {
                    return $model->status_list[$model->status];
                },
                'filter' => [0=>'无效',1=>'有效',]
            ],

            [   'class' => 'yii\grid\ActionColumn',
                'template' => '{add-img} {view-comment} {view} {update} {delete}',
                'buttons' => [
                    'add-img' => function ($model,$data) {
                        $options = [
                            'title' => '查看评论',
                        ];
                        $url = Url::to(['teamimg/viewinfo','tid'=>$data->id]);
                        return Html::a('<span class="glyphicon glyphicon-picture"></span>', $url, $options);
                    },
                    'view-comment' => function ($model,$data) {
                        $options = [
                            'title' => '添加图片',
                        ];
                        $url = Url::to(['comment/viewinfo','tid'=>$data->id]);
                        return Html::a('<span class="glyphicon glyphicon-comment"></span>', $url, $options);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
