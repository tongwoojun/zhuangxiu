<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuggestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suggests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suggest-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Suggest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tel',
            'suggest',
            'ip',
            'time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
