<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

use common\models\Key;
/* @var $this yii\web\View */
/* @var $model common\models\Scene */
/* @var $form yii\widgets\ActiveForm */

$list = Key::getList();
?>

<div class="scene-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-2">
        <?= $form->field($model, 'area')->dropDownList($list['area'],['prompt' => '请选择']); ?>
        </div>

        <div class="col-lg-2">
        <?= $form->field($model, 'type')->dropDownList($list['type'],['prompt' => '请选择']); ?>
        </div>

        <div class="col-lg-2">
        <?= $form->field($model, 'space')->dropDownList($list['space'],['prompt' => '请选择']); ?>
        </div>

        <div class="col-lg-2">
        <?= $form->field($model, 'acreage')->dropDownList($list['acreage'],['prompt' => '请选择']); ?>
        </div>

        <div class="col-lg-2">
        <?= $form->field($model, 'progress')->dropDownList($list['progress'],['prompt' => '请选择']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-5">
            <?= $form->field($model, 'atitle')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
        <?php
        if(!$model->isNewRecord){
            echo Html::img(Yii::$app->params['imgurl'].$model->img, ['width' => 120,'height' => 120]);
            echo "<br>";
            echo $form->field($model, 'img')->fileInput();
        }else {
            echo $form->field($model, 'img')->fileInput();
        }?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <?= $form->field($model, 'content')->widget("pjkui\kindeditor\KindEditor",['clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true']]) ?>
            <?php //echo $form->field($model, 'content')->widget('pjkui\kindeditor\KindEditor',['clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true']]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'uname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'uinfo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'udesigner')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'uwork')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'utime')->widget(DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options'=>['class'=>"form-control"]
            ]) ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'ustatus')->widget(DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options'=>['class'=>"form-control"]
            ])->hint("不填写，表示未竣工");?>
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
