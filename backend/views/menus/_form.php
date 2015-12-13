<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$type = isset($_GET['type'])?intval($_GET['type']):0;

$type_list = ['1' => '前台', '2' => '后台'];
if(isset($type_list[$type])){
   $type_list = [$type=>$type_list[$type]];
}

/* @var $this yii\web\View */
/* @var $model common\models\Menus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList($type_list); ?>

    <!--<?= $form->field($model, 'fid')->textInput() ?>-->

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => '有效', '0' => '无效']); ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">


</script>
