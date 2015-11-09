<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\LinkPager;
?>
<div class="p_w">
    <div class="place">
        <a href="<?=Url::to(['site/index']);?>">首页</a>
        <span>翻新问答</span>
    </div>
    <div class="con_left fl">
        <div class="ques_list border-all">
            <ul>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'layout'=> '{items}',
                    'itemView' => '_item',//子视图
                    'itemOptions'=>['tag' => false],
                    'emptyText'=>'查询结果数据为空',
                ]);
                ?>
            </ul>
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