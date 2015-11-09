<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Trends */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '翻新问答', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trends-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
