<?php
use \yii\helpers\Url;
use \yii\helpers\Html;
use frontend\assets\Temp;
use yii\helpers\StringHelper;

$this->title = '翻新装潢网 - 佳园装潢网首页';
?>
<?= $this->registerJsFile('@web/js/swiper.min.js',['position' => \yii\web\View::POS_HEAD])?>
<?= $this->registerCssFile('@web/css/swiper.min.css')?>
<div class="in_zhbm fl">
	<h2 class="tc">最新展会报名</h2>
    <div class="errors tc" id="errors_msg"></div>
    <form id="form_1" action="<?=Url::to(['site/ajaxform']);?>" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">
        <input type="hidden" name="Form[type]" value="48">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td width="93" align="right">姓名：</td>
                <td><input id="form_1_name" name="Form[name]" type="text" class="input" maxlength="5" value="<?=Yii::$app->user->identity->username;?>"/></td>
            </tr>
            <tr>
                <td align="right">手机：</td>
                <td><input id="form_1_tel" name="Form[tel]" type="text" class="input" maxlength="20" value="<?=Yii::$app->user->identity->tel;?>"/></td>
            </tr>
            <tr>
                <td align="right">地址：</td>
                <td><input id="form_1_adress" name="Form[adress]" type="text" class="input" maxlength="50" value="<?=Yii::$app->user->identity->adress;?>" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="tc pt10">
                        <p class="f_e7340c mb10">立即报名，减免设计费用1000元</p>
                        <a href="javascript:void(0);" class="in_zhbm_btn mb10" onclick="Submit('form_1');">立即报名</a>
                        <p class="f_9f9f9f">1458 户翻新业主已经报名</p>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="in_show fr">
	<div class="swiper-container" id="playBox">

        <!--ads_2-->
        <?php if(isset(Yii::$app->view->params['ads'][2])){ ?>
        <div class="smalltitle">
            <ul>
                <?php foreach(Yii::$app->view->params['ads'][2] as $key=> $value){?>
                <li <?=$key==0?'class="thistitle"':'';?>></li>
                <?php }?>
            </ul>
        </div>
        <ul class="oUlplay">
            <?php echo Temp::adTemp(Yii::$app->view->params['ads'][2], 2);?>
        </ul>
        <?php }?>

	</div>
    <script src="<?=Yii::$app->request->baseUrl;?>/js/lunbo.js" type="text/javascript"></script>
</div>
<div class="clearfix"></div>

<!--ads_3-->
<?php if(isset(Yii::$app->view->params['ads'][3])){ ?>
<div class="in_fxlc">
	<div class="in_module_header">
        <a href="<?=Url::to(['retreads/list']);?>" target="_blank"><span>翻新流程</span></a>
		<a href="<?=Url::to(['retreads/list']);?>" class="pa more" target="_blank"></a>
    </div>
	<ul class="in_fxlc_list">
        <?php echo Temp::adTemp(Yii::$app->view->params['ads'][3], 3);?>
	</ul>
	<div class="clearfix"></div>
</div>
<?php }?>

<!--ads_4-->
<?php if(isset(Yii::$app->view->params['ads'][4])) {
    echo Temp::adTemp(Yii::$app->view->params['ads'][4], 4);
}?>

<?php if(isset($package)){ ?>
<div class="in_fxtc">
	<div class="in_module_header">
        <a href="<?=Url::to(['retreads/list']);?>" target="_blank"><span>翻新套餐</span></a>
		<a href="<?=Url::to(['retreads/list']);?>" class="pa more" target="_blank"></a>
    </div>
	<ul>
        <?php foreach($package as $key=>$value){$num=$key+1;?>
            <li>
                <a href="<?=Url::to(['retreads/detail','id'=>$value->id]);?>" class="in_fxtc_menu<?=$num;?>" target="_blank" >
                    <div class="in_fxtc_box">
                        <p><?=Html::encode($value->title);?></p>
                        <span class="in_fxtc_more">查看详情</span>
                    </div>
                </a>
            </li>
        <?php }?>
	</ul>
	<div class="clearfix"></div>
</div>
<?php }?>

<!--ads_17-->
<?php if(isset(Yii::$app->view->params['ads'][17])) {
    echo Temp::adTemp(Yii::$app->view->params['ads'][17], 4);
}?>

<div class="in_fxxc">
    <!--ads_6-->
    <?php if(isset(Yii::$app->view->params['ads'][6])){ ?>
	<div class="in_module_header">
        <a href="<?=Url::to(['scene/index']);?>" target="_blank"><span>翻新现场</span></a>
        <em><b>597</b>个工地正在翻新</em>
		<a href="<?=Url::to(['scene/index']);?>" class="pa more" target="_blank"></a>
    </div>
	<div class="index_xgt">
        <?php
        $list = ['index_xgt_one', 'index_xgt_two', 'index_xgt_three', 'index_xgt_four', 'index_xgt_five'];
        echo Temp::adTemp(Yii::$app->view->params['ads'][6], 6, $list);
        ?>
    </div>
    <?php }?>

    <!--ads_7-->
    <?php if(isset(Yii::$app->view->params['ads'][7])){ ?>
	<div class="in_fxxc_gzxgt">
		<ul>
            <?php echo Temp::adTemp(Yii::$app->view->params['ads'][7], 7);?>
		</ul>
		<div class="clearfix"></div>
	</div>
    <?php }?>

</div>

<!--ads_8-->
<?php if(isset(Yii::$app->view->params['ads'][8])) {
    echo Temp::adTemp(Yii::$app->view->params['ads'][8], 8);
}?>

<div >
	<div class="in_news fl">
		<div class="in_module_header">
            <a href="<?=Url::to(['trends/index']);?>" target="_blank"><span>佳园动态</span></a>
			<a href="<?=Url::to(['trends/index']);?>" class="pa more" target="_blank"></a>
		</div>
		<dl class="in_news_list border-all">

            <!--ads_14-->
            <?php if(isset(Yii::$app->view->params['ads'][14])) {
                echo Temp::adTemp(Yii::$app->view->params['ads'][14], 14);
            }?>

			<dd>
				<ul>
                    <?php if($trends_data[3]){foreach($trends_data[3] as $key=>$value){ ?>
					<li>
						<div class="in_news_pic">
							<a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><img src="<?=Url::to([$value['img']]);?>" width="144"  height="93" /></a>
						</div>
						<div class="in_news_info">
							<h3><a href="<?=Url::to(['trends/detail','id'=>$value['id']]);?>"><?=StringHelper::truncate($value['title'],15);?></a></h3>
							<p><?=StringHelper::truncate($value['desc'],35);?></p>
						</div>
					</li>
                    <?php }}?>
				</ul>
			</dd>
			<div class="clearfix"></div>
		</dl>
	</div>
	<div class="in_ques fr">
		<div class="in_module_header">
            <a href="<?=Url::to(['qa/index']);?>" target="_blank"><span>翻新问答</span></a>
			<a href="<?=Url::to(['qa/index']);?>" class="pa more"  target="_blank"></a>
		</div>
		<div class="ques_box border-all">
        <?php if($qa_data){foreach($qa_data as $key=>$value){ $num = $key+1; ?>
            <dl>
                <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img0<?=$num;?>.jpg" width="55" /></dt>
                <dd>
                    <p><span class="f_e7340c">Q:</span><?=StringHelper::truncate($value->question,15);?></p>
                    <p><span class="f_e7340c">A:</span><?=StringHelper::truncate($value->answer,35);?></p>
                </dd>
            </dl>
        <?php }}?>
		</div>
	</div>
	<div class="clearfix"></div>
</div>