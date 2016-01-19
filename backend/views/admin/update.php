<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = '更新: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '后台用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="admin-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
