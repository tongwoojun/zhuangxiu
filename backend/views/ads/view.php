<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\Ads */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '广告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-view">

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
            ['label'=>'类型','value'=>$model->key->name],
            'title',
            'desc',
            ['label'=>'状态','value'=>$model->status_list[$model->status]],
        ],
    ]) ?>


    <div class="bs-example" data-example-id="simple-thumbnails">
        <div class="row">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'layout'=> '{items}',
                'itemView' => '_item',//子视图
                'emptyText'=>'<div class="col-xs-6 col-md-4">查询结果数据为空</div>',
            ]);
            ?>
        </div>
    </div>
    <?= Html::a('添加广告', ['adslist/create', 'aid' => $model->id], ['class' => 'btn btn-success']) ?>

</div>
