<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '后台用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

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
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            ['label'=>'状态','value'=>$model->status ==1?'有效':'无效' ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
