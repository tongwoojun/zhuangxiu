<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Form */

$this->title = @$model->type_list[$model->type];
$this->params['breadcrumbs'][] = ['label' => '报名活动', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['label'=>'类型','value'=>@$model->type_list[$model->type] ],
            'name',
            'tel',
            'email:email',
            'adress',
            'desc',
            'ip',
            'time',
            'other',
            ['label'=>'状态','value'=>$model->status ==1?'确认':'未确认' ],
        ],
    ]) ?>

</div>
