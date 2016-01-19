<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adslist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adslist-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php //echo $form->field($model, 'aid')->textInput() ?>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'type')->dropDownList($model->type_list,['prompt' => '请选择']); ?>
        </div>
    </div>

    <div class="row" id="url">
        <div class="col-lg-6">
            <?= $form->field($model, 'url')->textInput(['maxlength' => true])->hint("http:// 开头"); ?>
        </div>
    </div>

    <div id ='img' style="display: none">
        <div class="row">
            <div class="col-lg-6">
                <?php
                if(!$model->isNewRecord){
                    if($model->img) {
                        echo Html::img(Yii::$app->params['imgurl'] . $model->img, ['height' => 120]);
                        echo "<br>";
                    }
                    echo $form->field($model, 'img')->fileInput();
                }else {
                    echo $form->field($model, 'img')->fileInput();
                }?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2">
                <?= $form->field($model, 'img_width')->textInput()->hint("px结尾"); ?>
            </div>

            <div class="col-lg-2">
                <?= $form->field($model, 'img_height')->textInput()->hint("px结尾"); ?>
            </div>
        </div>
    </div>

    <div class="row" id ='txt' style="display: none">
        <div class="col-lg-11">
            <?= $form->field($model, 'desc')->widget("pjkui\kindeditor\KindEditor",['clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true']]) ?>
        </div>
    </div>

    <div class="row">
        <?php if(!$model->isNewRecord){?>
            <div class="col-lg-2">
                <?= $form->field($model, 'status')->dropDownList($model->status_list,['prompt' => '请选择']); ?>
            </div>
        <?php }?>

        <div class="col-lg-3">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'stime')->widget(DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options'=>['class'=>"form-control"]
            ]) ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'etime')->widget(DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                'options'=>['class'=>"form-control"]
            ]);?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
