<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ads-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'type')->dropDownList($model->getTypeList(),['prompt' => '请选择']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php if(!$model->isNewRecord){?>
        <div class="row">
            <div class="col-lg-2">
            <?= $form->field($model, 'status')->textInput() ?>
            </div>
        </div>
    <?php }?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
