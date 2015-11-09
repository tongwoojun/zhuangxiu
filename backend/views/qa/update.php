<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Qa */

$this->title = '更新: ' . ' ' . $model->question;
$this->params['breadcrumbs'][] = ['label' => '翻新问答', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="qa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
