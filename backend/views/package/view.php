<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Package */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '翻新套餐', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-view">
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
            //'id',
            'title',
            ['label'=>'图片','format'=>'raw','value'=>Html::img(Yii::$app->params['imgurl'].$model->img,['alt' => '缩略图','width' => 80])],
            'stitle',
            'sort',
            'atitle',
            'content:ntext',
            'views',
            'time',
            ['label'=>'是否推荐','value'=>$model->rec_list[$model->is_rec]],
            ['label'=>'状态','value'=>$model->status_list[$model->status]],
        ],
    ]) ?>

</div>
