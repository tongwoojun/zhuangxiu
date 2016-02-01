<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\Temp;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $url = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
    $this->metaTags[]='<meta name="keywords" content="'.$this->params['memus'][$url]['keywords'].'"/>';
    $this->metaTags[]='<meta name="description" content="'.$this->params['memus'][$url]['description'].'"/>';
    ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
    <!--->
    <?php if(isset(Yii::$app->view->params['ads'][1])){?>
    <div class="p_w">
        <?php echo Temp::adTemp(Yii::$app->view->params['ads'][1], 1);?>
    </div>
    <?php } ?>

    <div class="top_nav f14">
        <div class="p_w">
            <span class="fr tn-person-r">
                <?php if(Yii::$app->user->isGuest){?>
                <!--<a href="<?=Url::to(['site/login']);?>">登录</a>
                <a href="<?=Url::to(['site/signup']);?>">注册</a>-->
                <?php }else{?>
                <!--欢迎，<?=Yii::$app->user->identity->username;?>
                    <a href="<?=Url::to(['site/logout']);?>">退出</a>-->
                <?php }?>
                <a href="javascript:void(0);" onclick="Addme()">收藏本站</a>
                <font class="f_e7340c pl40">翻新热线：400-820-3213</font>  （09:30-18:00）</span>
            <span>
                <a href="#" class="weixin">
					<img src="<?=Yii::$app->request->baseUrl;?>/images/wx.png" width="16" />
					<span><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img04.jpg" width="94"></span>
				</a>
                <a href="#"><img src="<?=Yii::$app->request->baseUrl;?>/images/sina.png" width="16" /></a>
            </span>
        </div>
    </div>
    <div class="p_w">
        <div class="top_sub pr">
            <a href="#" class="logo pa"></a>
            <form action="<?=Url::to(['site/search'])?>" method="get" id="search" <?php if(Yii::$app->requestedRoute != 'site/search'){?>target="_blank" <?php }?>>
                <div class="search_combobox pa">
                    <div class="search_box_tabs" onmouseover="signTitles(true)" onmouseout="signTitles(false)">
                        <input type="hidden" name="type" value="<?=Yii::$app->params['search']['type'];?>" id="type">
                        <span class="search_box_tips" id="query_filde"><?=Yii::$app->params['search']['title'];?></span>
                        <ul class="J-search-box_tabs" style="display: none;" id="query_list">
                            <li><a href="javascript:void(0);" value="0">全部</a></li>
                            <li><a href="javascript:void(0);" value="1">翻新现场</a></li>
                            <li><a href="javascript:void(0);" value="2">翻新问答</a></li>
                            <li><a href="javascript:void(0);" value="3">佳园动态</a></li>
                        </ul>
                    </div>
                    <input type="text" id="keyword" name="keyword" class="J-search-box_input pa inputFocus grays" value="<?=Yii::$app->params['search']['keyword'];?>" placeholder="请输入搜索关键字" ov="请输入搜索关键字">
                    <a href="javascript:void(0);" class="btn-search pa" onclick="check_search()"></a>
                </div>
            </form>
            <a href="<?=Url::to(['qa/ask#ask']);?>" class="ta-extra pa"></a>
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
            <!--ads_9-->
            <?php if(isset(Yii::$app->view->params['ads'][9])) {
                echo Temp::adTemp(Yii::$app->view->params['ads'][9], 9);
            }?>
        </div>
        
        <div class="firend_nav fl">
            <p><a href="site/aboutus">关于我们</a></p>
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
            <a href="<?=Url::to(['site/aboutus']);?>">关于我们</a>|
            <a href="<?=Url::to(['site/contactus']);?>">联系我们</a>|
            <a href="<?=Url::to(['site/aboutus']);?>">法律声明</a>|
            <a href="<?=Url::to(['site/aboutus']);?>">行业合作</a>
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
<script type="text/javascript"> var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://"); document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc33937da47c503b90f6708bcab69793b' type='text/javascript'%3E%3C/script%3E")) </script>
</html>
<?php $this->endPage() ?>
