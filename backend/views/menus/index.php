<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '导航管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menus-index">
    <p>
        <?= Html::a('创建导航', ['create','type'=>isset($_GET['type'])?intval($_GET['type']):1], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'type',
            //'fid',
            'name',
            'sort',
            'url:url',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
