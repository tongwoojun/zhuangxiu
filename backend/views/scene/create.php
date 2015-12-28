<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Scene */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '翻新现场', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scene-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
