<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 10/15/15
 * Time: 16:36
 */
use \yii\helpers\Url;
use \yii\helpers\Html;
use common\models\Package;
use common\models\Scene;
use common\models\Qa;
use yii\helpers\StringHelper;

$list = $this->params['list'];
if(in_array(1,$left_list)){
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
<?php }?>

<?php

if(in_array(2,$left_list)){
    $models = Package::getHost(4);
?>
<div class="hot_vedio border-all mb20">
    <div class="recom_tit">热门套餐<a href="<?=Url::to(['retreads/list']);?>" class="pa more" target="_blank"></a></div>
    <ul class="hot_packages_list">
        <?php if($models){ foreach($models as $model){ ?>
            <li>
                <a href="<?=Url::to(['retreads/detail','id'=>$model->id]);?>">
                    <img src="<?=Url::to([$model->img]);?>" width="170" height="109" />
                </a>
                <a href="<?=Url::to(['retreads/detail','id'=>$model->id]);?>"><?=Html::encode($model->title);?></a>
            </li>
        <?php }} ?>
    </ul>
    <div class="clearfix"></div>
</div>
<?php }?>

<?php if(in_array(3,$left_list)){?>
<div class="con_right_bill mb20">
    <a href="#"><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img13.jpg" width="397" height="280" /></a>
</div>
<?php }?>

<?php if(in_array(4,$left_list)){
    $models = Scene::getHost(5);
?>
<div class="recom_box border-all mb20">
    <div class="recom_tit">大家都在看的工地<a href="<?=Url::to(['scene/index']);?>" class="pa more" target="_blank"></a></div>
    <ul>
    <?php if($models){ foreach($models as $model){ ?>
        <li><span class="fr"><?=$model->types->name;?></span><a href="<?=Url::to(['scene/detail','id'=>$model->id]);?>"><?=$model->title;?></a></li>
    <?php }}?>
    </ul>
</div>
<?php }?>

<?php if(in_array(5,$left_list)){?>
<div class="hot_vedio border-all mb20">
    <div class="recom_tit">佳园动态<a href="#" class="pa more" target="_blank"></a></div>
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
<?php }?>

<?php if(in_array(7,$left_list)){?>
<div class="ask_side border-all mb20">
    <div class="tc ask_side_one mb20">
        <p>专业团队</p>
        <p class="mb10">为您解答每一个问题</p>
        <p>已有<em class="f_e7340c">25849</em>位业主得到了帮助</p>
    </div>
    <div class="tc">
        <p class="f14 f_e7340c mb10">资深设计、行业专家为您解答装修的各种疑问。</p>
        <a href="<?=Url::to(['qa/ask#ask']);?>" class="ask_side_btn">我要提问</a>
    </div>
</div>
<?php }?>

<?php if(in_array(8,$left_list)){?>
    <?php if(isset(Yii::$app->view->params['ads'][11])){ ?>
        <div class="ask_team border-all mb20">
            <div class="recom_tit">专家团队</div>
            <?php foreach(Yii::$app->view->params['ads'][11] as $key=>$value){?>
                <dl class="ask_team_list">
                    <dt><img src="<?=Yii::$app->request->baseUrl.$value['img'];?>" width="120"></dt>
                    <dd>
                        <h3 class="f14"><?=$value['name'];?></h3>
                        <?=$value['desc'];?>
                        <a href="<?=Url::to(['qa/ask#ask']);?>" class="ask_side_btn">我要提问</a>
                    </dd>
                </dl>
            <?php }?>
        </div>
    <?php }?>
<?php }?>

<?php if(in_array(6,$left_list)){
    $models = Qa::getRec(3);
?>
    <div class="con_right fr">
        <div class="ques_box border-all">
            <div class="recom_tit">热门问答 <a href="<?=Url::to(['qa/index']);?>" class="pa more" target="_blank"></a></div>
            <?php if($models){ foreach($models as $key=>$model){ $num = $key+1; ?>
            <dl>
                <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img0<?=$num;?>.jpg" width="55" /></dt>
                <dd>
                    <p><span class="f_e7340c">Q:</span><?=StringHelper::truncate($model->question,15);?></p>
                    <p><span class="f_e7340c">A:</span><?=StringHelper::truncate($model->answer,35);?></p>
                </dd>
            </dl>
            <?php }}?>
        </div>
    </div>
<?php }?>