<?php

use yii\helpers\Html;
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

            'id',
            'title',
            //'img',
            //'stitle',
            'sort',
            // 'atitle',
            // 'content',
            'views',
            'time',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
