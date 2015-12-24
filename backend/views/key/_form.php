<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Key */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="key-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->dropDownList($model->info_list,['prompt' => '请选择']);?>

    <?= $form->field($model, 'status')->dropDownList([0=>'无效',1=>'有效'],['prompt' => '请选择']);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
