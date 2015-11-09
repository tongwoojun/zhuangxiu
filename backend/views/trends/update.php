<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trends */

$this->title = '更新: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '翻新问答', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="trends-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
