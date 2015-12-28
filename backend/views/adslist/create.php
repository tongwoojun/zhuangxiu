<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Adslist */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '广告列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adslist-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
