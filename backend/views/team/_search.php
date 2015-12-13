<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'img') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'from') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'stars1') ?>

    <?php // echo $form->field($model, 'stars2') ?>

    <?php // echo $form->field($model, 'stars3') ?>

    <?php // echo $form->field($model, 'stars4') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
