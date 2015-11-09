<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '翻新问答';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qa-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p><?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id'
            [
                'label' => '用户',
                'filter' => Html::activeTextInput($searchModel, 'username', ['class' => 'form-control']),
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->user->username;
                },
            ],
            [
                'attribute' => 'question',
                'value'=> function($data){return StringHelper::truncate($data->question,8);},
            ],
            [
                'attribute' => 'answer',
                'value'=> function($data){return StringHelper::truncate($data->answer,8);},
            ],
            'views',
            // 'time',
            [
                'attribute' => 'status',
                'filter' =>$searchModel->status_list,
                'value'=> function($data){return $data->status_list[$data->status];},
            ],
            [
                'attribute' => 'rec',
                'filter' =>$searchModel->rec_list,
                'value'=> function($data){return $data->rec_list[$data->rec];},
            ],
            [
                'label' => '留言记录',
                'filter' => false,
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a('<span class="glyphicon glyphicon-transfer"></span>', ['qa/send','id'=>$data->id], ['title' => '回复']);
                },
            ],

            [ 'class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>

</div>
