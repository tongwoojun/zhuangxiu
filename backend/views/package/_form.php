<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Package */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-5">
            <?= $form->field($model, 'stitle')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?php
            if(!$model->isNewRecord){
                echo Html::img("./../../frontend/web".$model->img, ['width' => 120,'height' => 120]);
                echo "<br>";
                echo $form->field($model, 'img')->fileInput();
            }else {
                echo $form->field($model, 'img')->fileInput();
            }?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'atitle')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <?= $form->field($model, 'content')->textarea(['rows' => '6']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>

        <div class="col-lg-5">
            <?= $form->field($model, 'views')->textInput() ?>
        </div>

        <div class="col-lg-5">
            <?= $form->field($model, 'status')->dropDownList($model->status_list,['prompt' => '请选择']); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
