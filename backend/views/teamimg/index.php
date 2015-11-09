<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '图片列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-img-index">

    <p>
        <?= Html::a('添加图片', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tid',
            'img',
            'desc',
            'url:url',
            ['attribute' => 'status',
                'value' =>function ($model) {
                    return $model->status_list[$model->status];
                },
                'filter' => $model->status_list
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
