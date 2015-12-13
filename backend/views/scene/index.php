<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\models\Key;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SceneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '翻新现场';
$this->params['breadcrumbs'][] = $this->title;

$list = Key::getList();
?>
<div class="scene-index">
    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'area',
                'filter' => $list['area'],
                'value'=> function($data){return $data->areas->name;},
            ],
            [
                'attribute' => 'type',
                'filter' => $list['type'],
                'value'=> function($data){return $data->types->name;},
            ],
            [
                'attribute' => 'space',
                'filter' => $list['space'],
                'value'=> function($data){return $data->spaces->name;},
            ],
            [
                'attribute' => 'acreage',
                'filter' => $list['acreage'],
                'value'=> function($data){return $data->acreages->name;},
            ],
            //'type',
            //'space',
            //'acreage',
            // 'progress',
            // 'title',
            // 'img',
            // 'atitle',
            // 'content:ntext',
            // 'uname',
            // 'uinfo',
            // 'utime',
            // 'udesigner',
            // 'uwork',
            // 'ustatus',
            'time',
            [
                'attribute' => 'status',
                'filter' =>[0=>'无效',1=>'有效'],
                'value'=> function($data){return $data->status==0?'无效':'有效';},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
