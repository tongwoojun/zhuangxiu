<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Package */

$this->title = '创建套餐';
$this->params['breadcrumbs'][] = ['label' => '翻新套餐', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
