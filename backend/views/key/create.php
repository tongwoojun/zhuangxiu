<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Key */

$this->title = '数据配置';
$this->params['breadcrumbs'][] = ['label' => 'Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
