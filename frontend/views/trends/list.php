<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/3/15
 * Time: 20:14
 */
use yii\widgets\ListView;
use yii\widgets\LinkPager;
?>
<?php
/* @var $this yii\web\View */
?>
<div class="p_w">
    <div class="place">
        <a href="<?=Url::to(['site/index']);?>">首页</a>
        <a href="<?=Url::to(['trends/index']);?>">佳园动态</a>
        <span>列表</span>
    </div>
    <div class="con_left fl">
        <div class="knowledge_info border-all">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'layout'=> '{items}',
                'itemView' => '_item',//子视图
                'emptyText'=>'查询结果数据为空',
            ]);
            ?>
        </div>
        <div class="scott mt50">
            <?=LinkPager::widget(['pagination'=>$dataProvider->pagination,'nextPageLabel'=>Yii::t('app','下一页'),'prevPageLabel'=>Yii::t('app','上一页'),'activePageCssClass'=>'current']); ?>
        </div>
    </div>
    <div class="con_right fr">
        <?= $this->render('//layouts/left', []); ?>
    </div>
    <div class="clearfix"></div>
</div>