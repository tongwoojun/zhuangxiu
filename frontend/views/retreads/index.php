<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 10/15/15
 * Time: 10:16
 */
use yii\widgets\ListView;
use yii\widgets\LinkPager;
?>
<div class="p_w">
<div class="place"><a href="#">首页</a><span>翻新套餐</span></div>

<div class="con_left fl">
    <div class="fx_packages border-all">
        <ul class="fx_packages_list">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'layout'=> '{items}',
                'itemView' => '_item',//子视图
                'emptyText'=>'查询结果数据为空',
            ]);
            ?>
        </ul>
        <div class="clearfix"></div>
        <div class="scott">
            <?=LinkPager::widget(['pagination'=>$dataProvider->pagination,'nextPageLabel'=>Yii::t('app','下一页'),'prevPageLabel'=>Yii::t('app','上一页'),'activePageCssClass'=>'current']); ?>
        </div>
    </div>
</div>
<div class="con_right fr">
    <?= $this->render('//layouts/left', []); ?>
</div>
<div class="clearfix"></div>
</div>
