<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

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
            ['label'=>'状态','value'=>$model->new_status_list[$model->status] ],
        ],
    ]) ?>

</div>


<div class="form-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::a('确认', ['updatestatus', 'id' => $model->id, 'status' =>-1], ['class' => 'btn btn-success']) ?>

    <?= Html::a('取消', ['updatestatus', 'id' => $model->id, 'status' =>-1], ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
