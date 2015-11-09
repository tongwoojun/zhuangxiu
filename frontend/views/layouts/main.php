<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
    <div class="p_w">
        <a href="#"><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img01.jpg" width="1200" style="display:block;" /></a>
    </div>
    <div class="top_nav f14">
        <div class="p_w">
            <span class="fr tn-person-r"><a href="#">登录</a> <a href="#">注册</a><a href="javascript:void(0);" onclick="Addme()">收藏本站</a>
                <font class="f_e7340c pl40">翻新热线：400-820-3213</font>  （09:30-18:00）</span>
            <span>
                <a href="#"><img src="<?=Yii::$app->request->baseUrl;?>/images/wx.png" width="16" /></a>
                <a href="#"><img src="<?=Yii::$app->request->baseUrl;?>/images/sina.png" width="16" /></a>
            </span>
        </div>
    </div>
    <div class="p_w">
        <div class="top_sub pr">
            <a href="#" class="logo pa"></a>
            <div class="search_combobox pa">
                <div class="search_box_tabs" onmouseover="signTitles(true)" onmouseout="signTitles(false)">
                    <span class="search_box_tips" id="query_filde" value="1">装修新闻</span>
                    <ul class="J-search-box_tabs" style="display: none;">
                        <li>
                            <a href="javascript:void(0);" value="1">装修新闻</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" value="2">装修套餐</a>
                        </li>
                    </ul>
                </div>
                <input type="text" name="" class="J-search-box_input pa inputFocus grays" value="请输入搜索关键字" ov="请输入搜索关键字">
                <a href="#" class="btn-search pa"></a>
            </div>
            <a href="#" class="ta-extra pa"></a>
        </div>
    </div>
    <div class="nav">
        <div class="p_w">
            <ul>
                <?php if($this->params['memus']){foreach ($this->params['memus'] as $key => $value) { ?>
                <li><a href="<?=Url::to([$value['url']]);?>" class="<?=(@$value['active']==true)?'active':'';?>"><span><?=$value['name'];?></span></a></li>
                <?php }} ?>　　　　　　　　　　
            </ul>
            
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="in_main p_w">
    <?= $content ?>
</div>

<div class="footer_friend">
    <div class="p_w">
        <div class="firend_link fl">
            <div class="link_tit">友情链接</div>
            <div class="link_list">
                <a href="#">上海室内装饰行业协会</a>
                <a href="#">安居客</a>
                <a href="#">新浪家居</a>
                <a href="#">上海建材信息网</a>
                <a href="#">上海315网</a>
                <a href="#">卡铂电器</a>
                <a href="#">能率中国</a>
                <a href="#">申同吊顶</a>
                <a href="#">晨阳水漆</a>
                <a href="#">上海房产网</a>
                <a href="#">上海二手房</a>
                <a href="#">上海装修公司</a>
                <a href="#">上海房产网</a>
                <a href="#">上海家政</a>
            </div>
        </div>
        
        <div class="firend_nav fl">
            <p><a href="#">关于我们</a></p>
            <p><a href="#">诚聘英才</a></p>
            <p><a href="#">网站合作</a></p>
        </div>
        <div class="firend_code fl tc">
            <p><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img04.jpg" width="105" height="105" /></p>
            <p>官方微信 <strong>@陈军谈装修</strong></p>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>
<div class="footer">
    <div class="p_w">
        <div class="footer-nav tc">
            <a href="#">合作媒体</a>|
            <a href="#">关于我们</a>|
            <a href="#">联系我们</a>|
            <a href="#">法律声明</a>|
            <a href="#">行业合作</a>            
        </div>
        <div class="tc f_9f9f9f mb30">上海家翻新信息技术服务有限公司  版权所有    Copyright ©2000- 2015   homerenew.com.cn Inc. All Rights Reserved.  </div>
        <div class="tc">
            <img src="<?=Yii::$app->request->baseUrl;?>/images/150826_footimg01.png" width="110" />
            <img src="<?=Yii::$app->request->baseUrl;?>/images/150826_footimg02.png" width="88" />
            <img src="<?=Yii::$app->request->baseUrl;?>/images/150826_footimg03.png" width="100" />
            <img src="<?=Yii::$app->request->baseUrl;?>/images/150826_footimg04.png" width="72" />
            <img src="<?=Yii::$app->request->baseUrl;?>/images/150826_footimg05.png" width="111" />
            <img src="<?=Yii::$app->request->baseUrl;?>/images/150826_footimg06.png" width="88" />
            <img src="<?=Yii::$app->request->baseUrl;?>/images/150826_footimg07.png" width="99" />
        </div>　　　　　　　
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
