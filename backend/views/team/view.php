<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '队长活动', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-view">

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
            'username',
            ['label'=>'缩略图','format'=>'raw','value'=>Html::img(Yii::$app->params['imgurl'].$model->img,['alt' => '缩略图','width' => 80])],
            'age',
            'from',
            'desc',
            'stars1',
            'stars2',
            'stars3',
            'stars4',
            ['attribute' => 'status', 'value' =>$model->status_list[$model->status]],
            'rec',
            ['label'=>'推荐','format'=>'raw','value'=>$model->getRec($model->rec)],
        ],
    ]) ?>

    <div class="bs-example" data-example-id="simple-thumbnails">
        <div class="row">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'layout'=> '{items}',
                'itemView' => '_item',//子视图
                'emptyText'=>'查询结果数据为空',
            ]);
            ?>
        </div>
    </div>
    <?= Html::a('添加图片', ['teamimg/create', 'tid' => $model->id], ['class' => 'btn btn-success']) ?>

</div>
