<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Trends */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trends-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'short_title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'type')->dropDownList($model->type_list,['prompt' => '请选择']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?php
            if(!$model->isNewRecord){
                echo Html::img(Yii::$app->params['imgurl']  .$model->img, ['width' => 120,'height' => 120]);
                echo "<br>";
            }
            echo $form->field($model, 'img')->fileInput();
            ?>
        </div>

        <div class="col-lg-6">
            <?php
            if(!$model->isNewRecord){
                echo Html::img(Yii::$app->params['imgurl'] .$model->short_img, ['width' => 120,'height' => 120]);
                echo "<br>";
            }
            echo $form->field($model, 'short_img')->fileInput();
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <?= $form->field($model, 'content')->widget("pjkui\kindeditor\KindEditor",['clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true']]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'status')->dropDownList($model->status_list,['prompt' => '请选择']); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
