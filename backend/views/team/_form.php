<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'style'=>'width:250px'])->hint('提示：长度不超过5位'); ?>

    <?= $form->field($model, 'img')->fileInput()->hint('提示：图片格式jpeg,gif,jpg,png') ?>

    <?= $form->field($model, 'age')->dropDownList(range(0,100),['prompt' => '选择年龄','style'=>'width:250px;']); ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true,'style'=>'width:250px'])->hint('提示：长度不超过10位'); ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true])->hint('提示：长度不超过225位'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
