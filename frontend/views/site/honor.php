<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 16/1/5
 * Time: 16:34
 */
use \yii\helpers\Url;
$this->title = '荣誉资质 - 翻新装潢网 - 佳园装潢官网';
?>

<div class="p_w">
    <div class="place">
        <a href="#">首页</a>
        <span>关于我们</span>
    </div>
    <div class="about_nav fl">
        <ul>
            <li><a href="<?=Url::to(['site/aboutus']);?>">关于我们</a></li>
            <li><a href="<?=Url::to(['site/contactus']);?>">联系我们</a></li>
            <li><a href="<?=Url::to(['site/honor']);?>"  class="active">荣誉资质</a></li>
            <li><a href="<?=Url::to(['site/suggest']);?>">投诉建议</a></li>
        </ul>
    </div>
    <div class="about_left border-all fr">
        <div class="about_tit">
            <span class="f20 mr10">资质荣誉</span>HONOR
        </div>
        <div class="honor_box">
            <ul>
                <li>
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_1.jpg">
                    <span>上海市室内装饰行业五星级装饰企业</span>
                </li>
                <li>
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_2.jpg">
                    <span>建筑业企业资质证书</span>
                </li>
                <li>
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_3.jpg">
                    <span>工程设计资质证书</span>
                </li>
                <li>
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_4.jpg">
                    <span>合同信用等级认证证书</span>
                </li>
                <li>
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_5.jpg">
                    <span>全国室内装饰优质工程</span>
                </li>
                <li>
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_6.jpg">
                    <span>上海市著名商标证书</span>
                </li>
                <li>
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_7.jpg">
                    <span>全国住宅装饰装修行业百强企业</span>
                </li>
                <li>
                    <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_8.jpg">
                    <span>全国守合同重信用企业</span>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>

    <div class="clearfix"></div>
</div>