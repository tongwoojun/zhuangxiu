<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Scene */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '翻新现场', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scene-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('确认', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'area',
            'type',
            'space',
            'acreage',
            'progress',
            'title',
            'img',
            'atitle',
            'content:ntext',
            'uname',
            'uinfo',
            'utime',
            'udesigner',
            'uwork',
            'ustatus',
            'time',
            'status',
        ],
    ]) ?>

</div>
