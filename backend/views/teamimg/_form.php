<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TeamImg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-img-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div style="display: none">
    <?= $form->field($model, 'tid')->textInput()->hint('提示：创建的时候默认会自动加上') ?>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?php
            if(!$model->isNewRecord){
                if($model->img) {
                    echo Html::img(Yii::$app->params['imgurl'] . $model->img, ['height' => 120,'id'=>'img']);
                    echo "<br>";
                }
            }
            echo $form->field($model, 'img')->fileInput()->hint('提示：图片格式jpeg,gif,jpg,png');
            ?>
        </div>
    </div>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
