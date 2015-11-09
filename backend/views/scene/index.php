<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SceneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '翻新现场';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scene-index">
    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'area',
            'type',
            'space',
            'acreage',
            // 'progress',
            // 'title',
            // 'img',
            // 'atitle',
            // 'content:ntext',
            // 'uname',
            // 'uinfo',
            // 'utime',
            // 'udesigner',
            // 'uwork',
            // 'ustatus',
            'time',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
