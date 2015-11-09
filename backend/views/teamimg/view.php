<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TeamImg */

$this->title = "图片查看:".$model->id;
$this->params['breadcrumbs'][] = ['label' => '图片列表', 'url' => ['viewinfo','tid'=>$model->tid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-img-view">
    <p>
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
            'tid',
            'img',
            'desc',
            'url:url',
            ['label'=>'状态','value'=>$model->status_list[$model->status]],
        ],
    ]) ?>

</div>
