<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeamImg */

$this->title = '更新图片: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '图片列表', 'url' => ['viewinfo','tid'=>$model->tid]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="team-img-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
