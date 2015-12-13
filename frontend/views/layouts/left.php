<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 10/15/15
 * Time: 16:36
 */
use \yii\helpers\Url;
$list = $this->params['list'];

?>
<div class="reserve_box border-all mb20">
    <div class="reserve_tit tc">预约翻新</div>
    <form id="form_1" action="<?=Url::to(['site/ajaxform']);?>" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">
        <input type="hidden" name="Form[type]" value="2">
        <p class="mb10"><label class="zt_widthlabel">姓名：</label><input name="name" type="text" class="input inputFocus grays" value="填写真实姓名" ov="填写真实姓名" style="width: 244px;" /></p>
        <p class="mb10"><label class="zt_widthlabel">电话：</label><input name="tel" type="text" class="input inputFocus grays" value="填写手机号码" ov="填写手机号码" style="width: 244px;" /></p>
        <p class="mb10"><label class="zt_widthlabel">地址：</label><input name="adress" type="text" class="input inputFocus grays" value="填写手机号码" ov="填写手机号码" style="width: 244px;" /></p>
        <p class="mb10"><label class="zt_widthlabel">类型：</label>
            <select name="">
                <?php if($list && isset($list['type'])){ foreach($list['type'] as $key=>$value){ ?>
                <option value="<?=$key;?>"><?=$value;?></option>
                <?php }}?>
            </select>
        </p>
        <p class="mb10"><input name="" type="text" class="input inputFocus grays" style="width: 294px;" value="您可以在这里留言写下您的其他装修要求" ov="您可以在这里留言写下您的其他装修要求" /></p>
        <p class="f_e7340c tc f14" style="line-height:38px;">立即预约，减免设计费用1000元</p>
        <a href="javascript:void(0);" class="reserve_btn" onclick="Submit('form_1');">立即报名</a>
    </form>
</div>
<div class="hot_vedio border-all mb20">
    <div class="recom_tit">热门套餐</div>
    <ul class="hot_packages_list">
        <li>
            <a href="#">
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img09.jpg" width="170" height="109" />
            </a>
            <a href="#">666元/㎡家装全包套餐</a>
        </li>
        <li>
            <a href="#">
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img09.jpg" width="170" height="109" />
            </a>
            <a href="#">666元/㎡家装全包套餐</a>
        </li>
        <li>
            <a href="#">
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img09.jpg" width="170" height="109" />
            </a>
            <a href="#">666元/㎡家装全包套餐</a>
        </li>
        <li>
            <a href="#">
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img09.jpg" width="170" height="109" />
            </a>
            <a href="#">666元/㎡家装全包套餐</a>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="con_right_bill mb20">
    <a href="#"><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img13.jpg" width="397" height="280" /></a>
</div>
<div class="recom_box border-all mb20">
    <div class="recom_tit">大家都在看的工地<a href="#" class="pa more" target="_blank"></a></div>
    <ul>
        <li><span class="fr">整体翻新</span><a href="#">闵行区 莘庄银都路3536弄</a></li>
        <li><span class="fr">局部翻新</span><a href="#">闵行区 闵行区红松路龙柏二村</a></li>
        <li><span class="fr">整体翻新</span><a href="#">浦东新区 巨峰路997弄</a></li>
        <li><span class="fr">整体翻新</span><a href="#">静安区 余姚路327号</a></li>
        <li><span class="fr">整体翻新</span><a href="#">闵行区 闵行区红松路龙柏二村</a></li>
    </ul>
</div>
<div class="hot_vedio border-all mb20">
    <div class="recom_tit">热门视频<a href="#" class="pa more" target="_blank"></a></div>
    <dl class="ask_team_list">
        <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img08_1.jpg" width="144" /></dt>
        <dd>
            <h3 class="f14">老娘舅主持人郭亮</h3>
            <p>老娘舅的主持人郭亮接受电视采访，对佳园装潢在行业中的翻新工作高度认可。郭亮在工作中遇到装潢...</p>
        </dd>
    </dl>
    <dl class="ask_team_list">
        <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img08_1.jpg" width="144" /></dt>
        <dd>
            <h3 class="f14">老娘舅主持人郭亮</h3>
            <p>老娘舅的主持人郭亮接受电视采访，对佳园装潢在行业中的翻新工作高度认可。郭亮在工作中遇到装潢...</p>
        </dd>
    </dl>
    <dl class="ask_team_list">
        <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img08_1.jpg" width="144" /></dt>
        <dd>
            <h3 class="f14">老娘舅主持人郭亮</h3>
            <p>老娘舅的主持人郭亮接受电视采访，对佳园装潢在行业中的翻新工作高度认可。郭亮在工作中遇到装潢...</p>
        </dd>
    </dl>
</div>
<div class="con_right fr">
    <div class="ques_box border-all">
        <div class="recom_tit">热门问答</div>
        <dl>
            <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img01.jpg" width="55" /></dt>
            <dd>
                <p><span class="f_e7340c">Q:</span>现有的浴缸想换成淋浴房，这个工程需要多少时间?</p>
                <p><span class="f_e7340c">A:</span>你好，需要九到十天。</p>
            </dd>
        </dl>
        <dl>
            <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img02.jpg" width="55" /></dt>
            <dd>
                <p><span class="f_e7340c">Q:</span>请问能使用公积金支付部分装修费用么？大概比例多少？</p>
                <p><span class="f_e7340c">A:</span>你好，装修费用不可以用公积金支付，这个政策已经于2012年就结束了。</p>
            </dd>
        </dl>
        <dl>
            <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img03.jpg" width="55" /></dt>
            <dd>
                <p><span class="f_e7340c">Q:</span>老房子住了差不多十年，想局部翻新，不知道怎么弄比较好，费用如何？</p>
                <p><span class="f_e7340c">A:</span>你好，建议让专业人士上门勘测，水电是否要重排，防水也很重要.费用是由设计师或专业人员评估后报价。</p>
            </dd>
        </dl>
    </div>
</div>