<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Scene */

$this->title = '更新: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '翻新现场', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="scene-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
