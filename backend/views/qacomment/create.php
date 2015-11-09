<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Qacomment */

$this->title = 'Create Qacomment';
$this->params['breadcrumbs'][] = ['label' => 'Qacomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qacomment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
