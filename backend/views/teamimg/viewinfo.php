<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '图片列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-img-index">
    <p>
        <?= Html::a('添加图片', ['create','tid'=>$model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <h5>用户信息</h5>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
        ],
    ]) ?>

    <h5>图片列表</h5>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'tid',
            'img',
            'desc',
            'url:url',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
