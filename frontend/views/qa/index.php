<?php
use yii\helpers\Url;
use frontend\assets\Temp;
use yii\helpers\StringHelper;

$this->title = '翻新问答 - 翻新装潢网 - 佳园装潢官网';
?>
<div class="p_w">

    <div class="place">
        <a href="#">首页</a>
        <span>翻新问答</span>
    </div>

    <div class="new_main">
        <dl class="in_news_list" style="padding:0;">
            <dt style="width: 395px;">
            <div class="ask_side border-all mb20">
                <div class="tc ask_side_one mb20">
                    <p>专业团队</p>
                    <p class="mb10">为您解答每一个问题</p>
                    <p>已有<em class="f_e7340c"><?=$count;?></em>位业主得到了帮助</p>
                </div>
                <div class="tc">
                    <p class="f14 f_e7340c mb10">资深设计、行业专家为您解答装修的各种疑问。</p>
                    <a href="<?=Url::to(['qa/ask#ask']);?>" class="ask_side_btn">我要提问</a>
                </div>
            </div>
            </dt>

            <!--ads_10-->
            <?php if(isset(Yii::$app->view->params['ads'][10])){ ?>
            <dd class="border-all in_ques_box">
                <ul>
                    <?php echo Temp::adTemp(Yii::$app->view->params['ads'][10], 10);?>
                </ul>
            </dd>
            <?php }?>
            <div class="clearfix"></div>
        </dl>

    </div>

    <div class="border-all fl mb20" style="width:746px;padding: 10px 18px 2px 18px;">
        <div class="recom_tit pr"><a href="<?=Url::to(['qa/list']);?>" >大家都在问</a><a href="<?=Url::to(['qa/list']);?>" class="pa more"></a></div>
        <div class="ques_list">
            <ul>
                <?php if(isset($all) && !empty($all)){foreach($all as $value){?>
                    <li>
                        <div class="secc_lihd">
                            <a href="<?=Url::to(['qa/detail','id'=>$value->id]);?>" class="company_lnk ect">用户<?=$value->name;?></a>提问
                            <a href="<?=Url::to(['qa/detail','id'=>$value->id]);?>" class="question_lnk ect f_e7340c"><?=StringHelper::truncate($value->question,30);?></a>
                        </div>
                        <div class="secc_lians"><?=StringHelper::truncate($value->answer,55);?></div>
                    </li>
                <?php }}?>
            </ul>
        </div>
    </div>

    <!--ads_11-->
    <?php if(isset(Yii::$app->view->params['ads'][11])){ ?>
    <div class="ask_team border-all mb20 fr">
        <div class="recom_tit"><a href="<?=Url::to(['team/list','type'=>2]);?>" >专家团队</a></div>
        <?php echo Temp::adTemp(Yii::$app->view->params['ads'][11], 11);?>

    </div>
    <?php }?>
    <div class="clearfix"></div>

    <div class="border-all fl" style="width:552px;padding: 10px 18px 2px 18px;">
        <div class="recom_tit"><a href="<?=Url::to(['qa/list']);?>" >最新问答</a></div>
        <div class="ques_list">
            <ul>
                <?php if(isset($new) && !empty($new)){foreach($new as $value){?>
                    <li>
                        <div class="secc_lihd">
                            <a href="<?=Url::to(['qa/detail','id'=>$value->id]);?>" class="company_lnk ect">用户<?=$value->name;?></a>提问
                            <a href="<?=Url::to(['qa/detail','id'=>$value->id]);?>" class="question_lnk ect f_e7340c"><?=StringHelper::truncate($value->question,25);?></a>
                        </div>
                        <div class="secc_lians"><?=StringHelper::truncate($value->answer,39);?></div>
                    </li>
                <?php }}?>
            </ul>
        </div>
    </div>

    <div class="border-all fr" style="width:552px;padding: 10px 18px 2px 18px;">
        <div class="recom_tit"><a href="<?=Url::to(['qa/list']);?>" >热门问答</a></div>
        <div class="ques_list">
            <ul>
                <?php if(isset($hot) && !empty($hot)){foreach($hot as $value){?>
                <li>
                    <div class="secc_lihd">
                        <a href="<?=Url::to(['qa/detail','id'=>$value->id]);?>" class="company_lnk ect">用户<?=$value->name;?></a>提问
                        <a href="<?=Url::to(['qa/detail','id'=>$value->id]);?>" class="question_lnk ect f_e7340c"><?=StringHelper::truncate($value->question,25);?></a>
                    </div>
                    <div class="secc_lians"><?=StringHelper::truncate($value->answer,39);?></div>
                </li>
                <?php }}?>
            </ul>

        </div>
    </div>

    <div class="clearfix"></div>

</div>