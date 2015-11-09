<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Qa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qa-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'uid')->textInput(['readonly'=>true]) ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'answer')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'status')->dropDownList($model->status_list,['prompt' => '请选择']); ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'rec')->dropDownList($model->rec_list,['prompt' => '请选择']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'views')->textInput()->hint('每访问一次，自动加1，如果作弊，可以直接修改') ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
