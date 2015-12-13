<?php

use yii\helpers\Url;
?>

<div class="p_w">
    <div class="border-all mt50">
        <img src="<?=Yii::$app->request->baseUrl;?>/images/151105_img01.jpg" width="1198" style="display:block;" />
    </div>
    <div class="in_module_header">
        <span>荣誉资质</span>
    </div>
    <div class="honor_box border-t" style="padding-top:30px; padding-left:11px;">
        <ul style="width:1196px;">
            <li>
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_7.jpg" />
                <span>全国住宅装饰装修行业百强企业</span>
            </li>
            <li>
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_1.jpg" />
                <span>上海市室内装饰行业五星级装饰企业</span>
            </li>
            <li>
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_2.jpg" />
                <span>建筑业企业资质证书</span>
            </li>
            <li>
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_3.jpg" />
                <span>工程设计资质证书</span>
            </li>
            <li>
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_8.jpg" />
                <span>全国守合同重信用企业</span>
            </li>
            <li>
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_4.jpg" />
                <span>合同信用等级认证证书</span>
            </li>
            <li>
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_5.jpg" />
                <span>全国室内装饰优质工程</span>
            </li>
            <li>
                <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img17_6.jpg" />
                <span>上海市著名商标证书</span>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="in_module_header" style="margin-top:21px;">
        <a href="<?=Url::to(['team/list','type'=>2]);?>"><span>设计师团队</span></a>
    </div>
    <div class="leader_list border-t" style="padding-left:30px;">
        <ul>
            <?php if($data && isset($data[2])){ foreach($data[2] as $value){?>
            <li>
                <a href="<?=Url::to(['team/detail','id'=>$value['id'],'type'=>2]);?>">
                <img src="<?=Url::to([$value['img']]);?>" width="170">
                <p><?=$value['username']?></p>
                <div class="syn_info">
                    <?=$value['desc'];?>
                </div>
                </a>
            </li>
            <?php }}?>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="in_module_header">
        <a href="<?=Url::to(['team/list','type'=>1]);?>"><span>施工队长团队</span></a>
    </div>
    <div class="leader_list border-t" style="padding-left:30px;">
        <ul>
            <?php if($data && isset($data[1])){ foreach($data[1] as $value){?>
                <li>
                    <a href="<?=Url::to(['team/detail','id'=>$value['id'],'type'=>1]);?>">
                    <img src="<?=Url::to([$value['img']]);?>" width="170" height="206">
                    <p><?=$value['username'];?></p>
                    <div class="syn_info">
                        <?=$value['desc'];?>
                    </div>
                    </a>
                </li>
            <?php }}?>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>