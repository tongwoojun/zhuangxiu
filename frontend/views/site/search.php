<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/12/2
 * Time: 10:18
 */
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\LinkPager;
$this->title = '搜索'.Yii::$app->params['search']['keyword'].' - 翻新装潢网 - 佳园装潢官网';
$this->metaTags[]='<meta name="keywords" content="搜索'.Yii::$app->params['search']['keyword'].' - '.Yii::$app->params['search']['title'].' – 翻新装潢网 - 佳园装潢官网"/>';
$this->metaTags[]='<meta name="description" content="搜索'.Yii::$app->params['search']['keyword'].' - '.Yii::$app->params['search']['title'].' – 翻新装潢网 - 佳园装潢官网"/>';
?>
<div class="p_w">
    <div class="place">
        <a href="<?=Url::to(['site/index']);?>">首页</a>
        <a>搜索</a>
        <span><?=$title;?></span>
    </div>
    <div class="ques_list border-all">
        <ul>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'layout'=> '{items}',
                'itemView' => '_search_item',//子视图
                'itemOptions'=>['tag' => false],
                'emptyText'=>'查询结果数据为空',
            ]);
            ?>
        </ul>
    </div>
    <div class="scott mt50">
        <?=LinkPager::widget(['pagination'=>$dataProvider->pagination,'nextPageLabel'=>Yii::t('app','下一页'),'prevPageLabel'=>Yii::t('app','上一页'),'activePageCssClass'=>'current']); ?>
    </div>
    <div class="clearfix"></div>
</div>