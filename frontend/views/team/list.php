<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/8/31
 * Time: 00:10
 */

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="p_w">
    <div class="place">
        <a href="./">首页</a>
        <a href="<?=Url::to(['team/index']);?>">专业团队</a>
        <span>队长列表</span>
    </div>
    <div class="con_left fl">
        <div class="leader_list border-all">
            <ul>
                <?php if($data){foreach ($data as $model){?>
                    <li>
                        <img src="<?=Url::to([$model->img]);?>" width="120" height="120" />
                        <p><?=$model->username;?></p><a href="<?=Url::to(['team/detail','id'=>$model->id]);?>" class="leader_btn">去了解他</a>
                    </li>
                <?php }} ?>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="scott mt50">
            <?= LinkPager::widget(['pagination' => $page,'prevPageLabel'=>'上一页','nextPageLabel'=>'下一页','activePageCssClass'=>'current']) ?>
        </div>
    </div>
    <div class="con_right fr">
        <div class="reserve_box border-all mb20">
            <div class="reserve_tit tc">预约翻新</div>
            <p class="mb10"><label class="zt_widthlabel">姓名：</label><input name="" type="text" class="input inputFocus grays" value="填写真实姓名" ov="填写真实姓名" style="width: 244px;" /></p>
            <p class="mb10"><label class="zt_widthlabel">电话：</label><input name="" type="text" class="input inputFocus grays" value="填写手机号码" ov="填写手机号码" style="width: 244px;" /></p>
            <p class="mb10">
					<span class="mr10">
						<select name="">
                            <option>上海市</option>
                        </select>
					</span>
					<span class="reserve_county">
						<select name="">
                            <option>静安区</option>
                        </select>
					</span>
            </p>
            <p class="mb10 reserve_cate">
                <select name="">
                    <option>整体翻新</option>
                </select>
            </p>
            <p class="mb10"><input name="" type="text" class="input inputFocus grays" style="width: 294px;" value="您可以在这里留言写下您的其他装修要求" ov="您可以在这里留言写下您的其他装修要求" /></p>
            <p class="f_e7340c tc f14" style="line-height:38px;">立即预约，减免设计费用1000元</p>
            <a href="#" class="reserve_btn">立即报名</a>
        </div>
        <div class="recom_box border-all mb20">
            <div class="recom_tit">大家都在看的工地</div>
            <ul>
                <li><span class="fr">整体翻新</span><a href="#">闵行区 莘庄银都路3536弄</a></li>
                <li><span class="fr">局部翻新</span><a href="#">闵行区 闵行区红松路龙柏二村</a></li>
                <li><span class="fr">整体翻新</span><a href="#">浦东新区 巨峰路997弄</a></li>
                <li><span class="fr">整体翻新</span><a href="#">静安区 余姚路327号</a></li>
                <li><span class="fr">整体翻新</span><a href="#">闵行区 闵行区红松路龙柏二村</a></li>
            </ul>
        </div>
        <div class="ques_box border-all mb20">
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
    <div class="clearfix"></div>
</div>

<script type="text/javascript">
    $(function(){
        $(function(){
            $.each($(".inputFocus"),function(index,input){
                if($(input).val()==$(input).attr("ov")){
                    $(input).addClass("grays");
                }
            });
        });
        $(".inputFocus").on("focus",function(){
            var ov=$.trim($(this).attr("ov"));
            var val=$.trim($(this).val());
            $(this).removeClass("grays");
            if(val==ov){
                $(this).val("");
            }

        });
        $(".inputFocus").on("blur",function(){
            var ov=$.trim($(this).attr("ov"));
            var val=$.trim($(this).val());
            if(val==""){
                $(this).val(ov).addClass("grays");
            }
        });

        $('.J-search-box_tabs a').click(function(){
            $('.J-search-box_tabs').hide();
            $("#query_filde").attr('value',$(this).attr('value'));
            $("#query_filde").text($(this).text());
        });
    })

    function signTitles(bool) {
        if (bool) {
            $('.J-search-box_tabs').show();
        } else {
            $('.J-search-box_tabs').hide();
        }
    }
</script>