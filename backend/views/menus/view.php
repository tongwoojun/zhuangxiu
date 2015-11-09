<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Menus */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '导航管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$type_list = ['1' => '前台', '2' => '后台'];
$status_list = ['1' => '有效', '0' => '无效'];
?>
<div class="menus-view">

    <p>
        <?= Html::a('确认', ['index','type'=> $model->type], ['class' => 'btn btn-success']) ?>
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
            //'type',
            ['label'=>'类别','value'=>$type_list[$model->type]],
            //'fid',
            'name',
            'url:url',
            //'status',
            ['label'=>'状态','value'=>$status_list[$model->status]],
        ],
    ]) ?>

</div>
