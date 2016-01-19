<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '翻新套餐';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-index">

    <p>
        <?= Html::a('创建套餐', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'img',
            //'stitle',
            'sort',
            // 'atitle',
            // 'content',
            'views',
            'time',
            [
                'attribute' => 'is_rec',
                'filter' =>$searchModel->rec_list,
                'value'=> function($data){return @$data->rec_list[$data->is_rec];},
            ],
            [
                'attribute' => 'status',
                'filter' =>$searchModel->status_list,
                'value'=> function($data){return @$data->status_list[$data->status];},
            ],

            [   'class' => 'yii\grid\ActionColumn',
                'template' => '{file} {view} {update} {delete}',
                'buttons' => [
                    'file' => function ($url,$data) {
                        $options = [
                            'title' => '预览',
                            'target'=>"_blank"
                        ];
                        $url = Yii::$app->params['siteurl'].'retreads/detail/'.$data->id;
                        return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, $options);
                    },
                ]
            ],
        ],
    ]); ?>

</div>
