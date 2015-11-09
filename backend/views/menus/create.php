<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Menus */

$this->title = '导航创建';
$this->params['breadcrumbs'][] = ['label' => '导航管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menus-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
