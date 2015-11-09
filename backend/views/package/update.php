<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Package */

$this->title = '更新套餐: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '翻新套餐', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="package-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
