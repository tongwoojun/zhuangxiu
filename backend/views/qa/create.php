<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Qa */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '翻新问答', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
