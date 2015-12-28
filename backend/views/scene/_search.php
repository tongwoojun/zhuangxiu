<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SceneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scene-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'area') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'space') ?>

    <?= $form->field($model, 'acreage') ?>

    <?php // echo $form->field($model, 'progress') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'atitle') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'uname') ?>

    <?php // echo $form->field($model, 'uinfo') ?>

    <?php // echo $form->field($model, 'utime') ?>

    <?php // echo $form->field($model, 'udesigner') ?>

    <?php // echo $form->field($model, 'uwork') ?>

    <?php // echo $form->field($model, 'ustatus') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
