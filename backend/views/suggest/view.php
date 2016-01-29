<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Suggest */

$this->title = '投诉&建议:'.$model->id;
$this->params['breadcrumbs'][] = ['label' => '投诉&建议', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suggest-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tel',
            'suggest',
            'ip',
            'time',
        ],
    ]) ?>

</div>
