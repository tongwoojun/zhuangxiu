<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>
<div class="p_w">
    <div class="place">
        <a href="<?=Url::to(['site/index']);?>">首页</a>
        <span>佳园动态</span>
    </div>

    <div class="new_main">
        <dl class="in_news_list border-all">
            <?php if(isset(Yii::$app->view->params['ads'][14])){ ?>
                <dt>
                    <a href="<?=Yii::$app->view->params['ads'][14][0]['url'];?>"  target="_blank">
                        <img src="<?=Yii::$app->request->baseUrl.Yii::$app->view->params['ads'][14][0]['img'];?>" width="420" height="300" />
                        <span><?=Yii::$app->view->params['ads'][14][0]['name'];?></span>
                    </a>
                </dt>
            <?php }?>
            <dd>
                <ul>
                    <?php if(isset($data['1'])){foreach($data['1'] as $key=>$value){ if($key>5){ continue;}?>
                    <li>
                        <div class="in_news_pic">
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><img src="<?=Url::to([$value['img']]);?>" width="140" /></a>
                        </div>
                        <div class="in_news_info">
                            <h3><a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=$value['title'];?></a></h3>
                            <p><?=StringHelper::truncate($value['desc'],35);?></p>
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
            <span><a href="<?=Url::to(['list','type'=>2]);?>">新闻报道</a></span>
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
                <h2 class="new_fxzs_title"><a href="<?=Url::to(['list','type'=>3]);?>">◆ 装修攻略</a></h2>
                <ul>
                    <?php if(isset($data['3'])){foreach($data['3'] as $key=>$value){ if($key>3){ continue;}?>
                        <li>
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=StringHelper::truncate($value['title'],30);?></a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
            <div class="new_fxzs_list border-all">
                <h2 class="new_fxzs_title"><a href="<?=Url::to(['list','type'=>4]);?>">◆ 材料选购</a></h2>
                <ul>
                    <?php if(isset($data['4'])){foreach($data['4'] as $key=>$value){ if($key>3){ continue;}?>
                        <li>
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=StringHelper::truncate($value['title'],30);?></a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
            <div class="new_fxzs_list border-all">
                <h2 class="new_fxzs_title"><a href="<?=Url::to(['list','type'=>5]);?>">◆ 家具布置</a></h2>
                <ul>
                    <?php if(isset($data['5'])){foreach($data['5'] as $key=>$value){ if($key>3){ continue;}?>
                        <li>
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=StringHelper::truncate($value['title'],30);?></a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
            <div class="new_fxzs_list border-all">
                <h2 class="new_fxzs_title"><a href="<?=Url::to(['list','type'=>6]);?>">◆ 家居风水</a></h2>
                <ul>
                    <?php if(isset($data['6'])){foreach($data['6'] as $key=>$value){ if($key>3){ continue;}?>
                        <li>
                            <a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=StringHelper::truncate($value['title'],30);?></a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>