<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 16/1/5
 * Time: 16:34
 */
use \yii\helpers\Url;
$this->title = '关于我们';
?>

<div class="p_w">
    <div class="place">
        <a href="./">首页</a>
        <span>关于我们</span>
    </div>
    <div class="about_nav fl">
        <ul>
            <li><a href="<?=Url::to(['site/aboutus']);?>" class="active">关于我们</a></li>
            <li><a href="<?=Url::to(['site/contactus']);?>">联系我们</a></li>
            <li><a href="<?=Url::to(['site/honor']);?>">荣誉资质</a></li>
            <li><a href="<?=Url::to(['site/suggest']);?>">投诉建议</a></li>
        </ul>
    </div>
    <div class="about_left border-all fr">
        <div class="about_tit">
            <span class="f20 mr10">关于我们</span>ABOUT US
        </div>
        <div class="about_box">
            <p><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img15.jpg" width="600" height="376"></p>
            <br>
            <br>
            <p>家里要翻新，您有诸多顾虑：</p>
            <p>施工质量放心吗？</p>
            <p>今后维修方便吗？</p>
            <p>装修进度及时吗？</p>
            <p>……</p>
            <p>在翻新装潢网，您能找到答案： </p>
            <p>网站为您严把四道关：</p>
            <p>专业——网站是上海市家装委住宅翻新装潢分委会指定官方网站，对各支施工队伍进行末尾淘汰的动态管理，对业主投诉 启用由网站与市装饰装修行业协会、市消费者权益保护委员会共建的绿色直通道。 </p>
            <br>
            <br>
            <p>质量——网站曾是《上海市住宅装饰装修质量验收标准》（3·15标准）、《上海市住宅装饰装修服务质量标准》、《上海 市住宅装饰装修示范合同》、《上海市住宅翻新装潢示范合同》、《上海市住宅装饰装修人工费指导价》等重要标准、文 本的制订者。</p>
            <br>
            <br>
            <p>服务——网站"两师"服务，即现场勘察师与软装设计师为您改造"硬件"、搭配"软件"，确保翻新效果；网站完善的现场保护 措施，让您的家具、家电及饰品等得到最妥帖的"照料"，让您省心省力。</p>
        </div>

    </div>

    <div class="clearfix"></div>
</div>