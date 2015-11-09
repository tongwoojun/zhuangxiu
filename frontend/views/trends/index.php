<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>
<div class="p_w">
    <div class="place">
        <a href="<?=Url::to(['site/index']);?>">首页</a>
        <span>佳园动态</span>
    </div>

    <div class="new_main">
        <dl class="in_news_list border-all">
            <dt>
                <a href="#">
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img07.jpg" width="420" height="300" />
                    <span>20年路程，20年传承</span>
                </a>
            </dt>
            <dd>
                <ul>
                    <?php if(isset($data['1'])){foreach($data['1'] as $key=>$value){ if($key>5){ continue;}?>
                    <li>
                        <div class="in_news_pic">
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><img src="<?=Url::to([$value['img']]);?>" width="140" /></a>
                        </div>
                        <div class="in_news_info">
                            <h3><a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=$value['title'];?></a></h3>
                            <p><?=$value['desc'];?></p>
                        </div>
                    </li>
                    <?php }}?>
                </ul>
            </dd>
            <div class="clearfix"></div>
        </dl>
    </div>

    <div class="new_channel fl">
        <div class="in_module_title">
            <span>新闻报道</span>
        </div>
        <ul>
            <?php if(isset($data['2'])){foreach($data['2'] as $key=>$value){ if($key>3){ continue;}?>
                <li>
                    <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><img src="<?=Url::to([$value['img']]);?>" width="270" /></a>
                    <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=$value['title'];?></a>
                </li>
            <?php }}?>
        </ul>
    </div>
    <div class="new_fxzs fl">
        <div class="in_module_title">
            <span>翻新知识</span>
        </div>
        <div class="new_fxzs_box">
            <div class="new_fxzs_list border-all">
                <h2 class="new_fxzs_title">◆ 装修攻略</h2>
                <ul>
                    <?php if(isset($data['3'])){foreach($data['3'] as $key=>$value){ if($key>3){ continue;}?>
                        <li>
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=$value['title'];?></a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
            <div class="new_fxzs_list border-all">
                <h2 class="new_fxzs_title">◆ 材料选购</h2>
                <ul>
                    <?php if(isset($data['4'])){foreach($data['4'] as $key=>$value){ if($key>3){ continue;}?>
                        <li>
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=$value['title'];?></a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
            <div class="new_fxzs_list border-all">
                <h2 class="new_fxzs_title">◆ 家具布置</h2>
                <ul>
                    <?php if(isset($data['5'])){foreach($data['5'] as $key=>$value){ if($key>3){ continue;}?>
                        <li>
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=$value['title'];?></a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
            <div class="new_fxzs_list border-all">
                <h2 class="new_fxzs_title">◆ 家居风水</h2>
                <ul>
                    <?php if(isset($data['6'])){foreach($data['6'] as $key=>$value){ if($key>3){ continue;}?>
                        <li>
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=$value['title'];?></a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>