<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeamImg */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '图片列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-img-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
