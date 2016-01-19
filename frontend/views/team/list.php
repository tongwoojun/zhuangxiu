<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/8/31
 * Time: 00:10
 */

use yii\helpers\Url;
use yii\widgets\LinkPager;
if($_GET['type']==1){
    $title = '队长列表';
}else{
    $title = '设计师列表';
}

$this->title = $title.' - 翻新装潢网 - 佳园装潢官网';
$this->metaTags[]='<meta name="keywords" content="'.$title.' - 翻新装潢网 - 佳园装潢官网"/>';
$this->metaTags[]='<meta name="description" content="'.$title.', 翻新装潢网 - 佳园装潢官网"/>';
?>
<div class="p_w">
    <div class="place">
        <a href="./">首页</a>
        <a href="<?=Url::to(['team/index']);?>">专业团队</a>
        <span><?=$title;?></span>
    </div>
    <div class="con_left fl">
        <div class="leader_list border-all">
            <ul>
                <?php if($data){foreach ($data as $model){?>
                    <li>
                        <img src="<?=Url::to([$model->img]);?>" width="170" height="260" />
                        <p><?=$model->username;?></p><a href="<?=Url::to(['team/detail','id'=>$model->id,'type'=>$model->type]);?>" class="leader_btn">去了解他</a>
                    </li>
                <?php }} ?>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="scott mt50">
            <?= LinkPager::widget(['pagination' => $page,'prevPageLabel'=>'上一页','nextPageLabel'=>'下一页','activePageCssClass'=>'current']) ?>
        </div>
    </div>
    <div class="con_right fr">
        <?= $this->render('//layouts/left', ['left_list'=>[1,2,6]]); ?>
    </div>
    <div class="clearfix"></div>
</div>