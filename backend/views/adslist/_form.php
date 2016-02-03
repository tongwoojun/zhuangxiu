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

    <!-- 图片 -->
    <div class="row type_list" id ='img' style="<?=in_array($model->type,[1,4])?'display: none':'';?>">
        <div class="col-lg-10">
            <?php
            echo $form->field($model, 'img')->fileInput();
            if(!$model->isNewRecord){
                if($model->img) {
                    echo '<label class="control-label" for="adslist-img">（图片显示）</label>';
                    echo '<div class="form-group">';
                    echo Html::img(Yii::$app->params['imgurl'] . $model->img, ['width' => $model->img_width,'height' => $model->img_height]);
                    echo "</div>";
                }
            }?>
        </div>
    </div>

    <!-- 文字 -->
    <div class="row type_list" id ='txt' style="<?=in_array($model->type,[2,4])?'display: none':'';?>">
        <div class="col-lg-10">
            <?= $form->field($model, 'desc')->widget("pjkui\kindeditor\KindEditor",['clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true']]) ?>
        </div>
    </div>

    <!-- FLASH -->
    <div class="row type_list" id ='flash' style="<?=($model->type)!=3?'display: none':'';?>">
        <div class="col-lg-10">
            <?php
            echo $form->field($model, 'flash')->fileInput();
            if(!$model->isNewRecord){
                if($model->flash) {
                    echo '<label class="control-label" for="adslist-img">（flash显示）</label>';
                    echo '<div class="form-group">';
                    echo '<embed src="'.Yii::$app->params['imgurl'] . $model->flash.'" type="application/x-shockwave-flash" width="'.$model->img_width.'" height="'.$model->img_height.'" quality="high" />';
                    echo "</div>";
                }
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
<script>
$(function(){
    $("#adslist-type").change(function(){
        var selt = $(this).children('option:selected').val();
        $('.type_list').hide();
        if(selt == 1){
            $('#img').show();
        }else if(selt == 2){
            $('#txt').show();
        }else if(selt == 3){
            $('#flash').show();
        }else if(selt == 4){
            $('#img').show();
            $('#txt').show();
        }
    })
});
</script>