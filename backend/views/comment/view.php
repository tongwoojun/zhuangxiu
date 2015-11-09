<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = '用户'.$model->id.'的评论';
$this->params['breadcrumbs'][] = ['label' => '评论', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

    <p>
        <?php if($model->status == 1) {
            echo Html::a('点击下线', ['check','id'=>$model->id,'status'=>0], ['class' => 'btn btn-danger']);
        }else{
            echo Html::a('点击上线', ['check','id'=>$model->id,'status'=>1], ['class' => 'btn btn-success']);
        } ?>
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
            //'id',
            //'tid',
            'ip',
            'comment',
            'stars1',
            'stars2',
            'stars3',
            'stars4',
            'time:datetime',
            ['label'=>'状态','value'=>$model->comment_status_list[$model->status]],
        ],
    ]) ?>

</div>
