<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 16/1/5
 * Time: 16:34
 */
use \yii\helpers\Url;
$this->title = '联系我们';
?>

<div class="p_w">
    <div class="place">
        <a href="#">首页</a>
        <span>关于我们</span>
    </div>
    <div class="about_nav fl">
        <ul>
            <li><a href="<?=Url::to(['site/aboutus']);?>">关于我们</a></li>
            <li><a href="<?=Url::to(['site/contactus']);?>" class="active">联系我们</a></li>
            <li><a href="<?=Url::to(['site/honor']);?>">荣誉资质</a></li>
            <li><a href="<?=Url::to(['site/suggest']);?>">投诉建议</a></li>
        </ul>
    </div>
    <div class="about_left border-all fr">
        <div class="about_tit">
            <span class="f20 mr10">联系我们</span>CONTACT US
        </div>
        <div class="about_box">
            <div class="contact_box">
                <h2>佳园总部</h2>
                <p><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img16.jpg" width="595"></p>
                <p>地址：浦东新区永泰路 1588号（近杨高南路)</p>
                <p>电话: 4008-203-213  021-61300112</p>
            </div>
            <div class="contact_box">
                <h2>旗舰店</h2>
                <p><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img16.jpg" width="595"></p>
                <p>地址：华阳路20号（近万航渡路口）</p>
                <p>电话：800-988-1937  4008-203-213</p>
                <p>电话：62522840   62118850</p>
            </div>
            <div class="contact_box">
                <h2>浦东店</h2>
                <p><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img16.jpg" width="595"></p>
                <p>地址：永泰路1588号</p>
                <p>电话：33772856</p>
            </div>
            <div class="contact_box">
                <h2>杨浦店</h2>
                <p><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img16.jpg" width="595"></p>
                <p>地址：锦西路92-94号</p>
                <p>电话：56522311</p>
            </div>
            <div class="contact_box">
                <h2>闵行店</h2>
                <p><img src="images/150921_img16.jpg" width="595"></p>
                <p>地址：吴中路2366-2368号</p>
                <p>电话：34208168、34208019</p>
            </div>
            <div class="contact_box">
                <h2>宝山店</h2>
                <p><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img16.jpg" width="595"></p>
                <p>地址：沪太路1315号</p>
                <p>电话：56321658、56983938</p>
            </div>
        </div>

    </div>

    <div class="clearfix"></div>
</div>