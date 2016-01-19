<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = '添加';
$this->params['breadcrumbs'][] = ['label' => '后台用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
