<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/3/15
 * Time: 20:14
 */
use yii\helpers\Url;
?>
<div class="p_w">
    <div class="place">
        <a href="<?=Url::to(['site/index']);?>">首页</a>
        <a href="<?=Url::to(['trends/index']);?>">佳园动态</a>
        <span>详情</span>
    </div>
    <div class="con_left fl">
        <div class="border-all case_main">
            <h1><?=$model->title;?></h1>
            <div class="case_time">
                <span class="fr">浏览数：<?=$model->views;?></span><?=substr($model->time,0,10);?>
            </div>
            <div class="fx_packages_sub">
                <?=$model->content;?>
            </div>
        </div>
    </div>
    <div class="con_right fr">
        <?= $this->render('//layouts/left', ['left_list'=>[1,2,4,5,6]]); ?>
    </div>
    <div class="clearfix"></div>
</div>