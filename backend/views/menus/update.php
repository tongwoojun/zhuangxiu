<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Menus */

$this->title = '更新导航: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '导航设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="menus-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
