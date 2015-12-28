<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ads */

$this->title = '创建广告';
$this->params['breadcrumbs'][] = ['label' => '广告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
