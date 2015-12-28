<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Key */

$this->title = '数据配置: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '数据配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="key-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
