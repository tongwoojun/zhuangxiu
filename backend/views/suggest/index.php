<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuggestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '投诉&建议';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suggest-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tel',
            'suggest',
            'ip',
            'time',

            [   'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

</div>
