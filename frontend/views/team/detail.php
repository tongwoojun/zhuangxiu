<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/8/31
 * Time: 00:50
 */
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<script type="text/javascript" src="<?=Yii::$app->request->baseUrl;?>/js/jquery.raty.min.js"></script>
<div class="p_w">
    <div class="place">
        <a href="./">首页</a>
        <a href="<?=Url::to(['team/index']);?>">专业团队</a>
        <a href="<?=Url::to(['team/list','type'=>$model->type]);?>"><?=$model->type==1?'队长列表':'设计师列表';?></a>
        <span><?=$model->username;?></span>
    </div>
    <div class="con_left fl">
        <div class="leader_info border-all mb20 pr">
            <dl>
                <dt><img src="<?=Url::to([$model->img]);?>" width="255" height="380"></dt>
                <dd>
                <?php if($model->type==1){?>
                    <div class="leader_de">
                        <p>姓名：<?=$model->username;?></p>
                        <p><span>年龄：<?=$model->age;?>岁</span>籍贯：<?=$model->from;?></p>
                        <p>简介：<?=$model->desc;?></p>
                    </div>
                <?php }else{?>
                    <div class="leader_de">
                        <p>姓名：<?=$model->username;?></p>
                        <div class="Designers_info">
                            <p>从业经验：<?=$model->age;?>年</p>
                            <p>擅长风格：<?=$model->scfg;?></p>
                            <p>就职单位：<?=$model->jzdw;?></p>
                            <p>毕业学校：<?=$model->byxx;?></p>
                            <p>职　　称：<?=$model->zc;?></p>
                        </div>
                    </div>
                <?php }?>
                    <div class="brief_info">
                        <ul>
                            <li>服务态度：<span title="零星" class="mid-rank-stars mid-str<?=$model->stars1?$model->stars1.'0':'0';?>"></span><span><?=$model->stars1;?>分</span></li>
                            <li>预算精准：<span title="一星" class="mid-rank-stars mid-str<?=$model->stars2?$model->stars2.'0':'0';?>"></span><span><?=$model->stars2;?>分</span></li>
                            <li>施工效率：<span title="三星" class="mid-rank-stars mid-str<?=$model->stars3?$model->stars3.'0':'0';?>"></span><span><?=$model->stars3;?>分</span></li>
                            <li>施工质量：<span title="五星" class="mid-rank-stars mid-str<?=$model->stars4?$model->stars4.'0':'0';?>"></span><span><?=$model->stars4;?>分</span></li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <a href="javascript:void(0)" class="leader_btn02 pa" onclick="FromShow('layer_from')">给他打分</a>
            <div class="clearfix"></div>
        </div>

        <?php if($comment){ ?>
            <div class="review_box border-all mb20">
                <div class="review_tit">客户评论：</div>

                <?php foreach($comment as $k=>$c){ $num=$k+1;?>
                    <div class="review_row">
                        <dl class="user_info mb10">
                            <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img0<?=$num;?>.jpg" width="55" height="54"></dt>
                            <dd>
                                <p class="f14">用户<?=$c->id;?></p>
                                <p class="f_9f9f9f"><?=date('Y-m-d',$c->time);?></p>
                            </dd>
                        </dl>
                        <div class="review_text"><?=$c->comment;?></div>
                    </div>
                <?php }?>

                <div class="scott mt50">
                    <?= LinkPager::widget(['pagination' => $page,'prevPageLabel'=>'上一页','nextPageLabel'=>'下一页','activePageCssClass'=>'current']) ?>
                </div>
            </div>
        <?php }?>
        <?php if($img){ ?>
            <div class="related_list border-all">
                <div class="related_tit">相关工地</div>
                <ul>
                    <?php foreach($img as $i){ ?>
                        <li><a href="<?=$i->url;?>"><img src="<?=Url::to([$i->img]);?>" width="238" /></a><a href="<?=$i->url;?>"><?=$i->desc;?></a></li>
                    <?php }?>
                </ul>
                <div class="clearfix"></div>
            </div>
        <?php }?>
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
            <a href="javascript:void(0)" class="reserve_btn">立即报名</a>
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
                <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img01.jpg" width="55"></dt>
                <dd>
                    <p><span class="f_e7340c">Q:</span>现有的浴缸想换成淋浴房，这个工程需要多少时间?</p>
                    <p><span class="f_e7340c">A:</span>你好，需要九到十天。</p>
                </dd>
            </dl>
            <dl>
                <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img02.jpg" width="55"></dt>
                <dd>
                    <p><span class="f_e7340c">Q:</span>请问能使用公积金支付部分装修费用么？大概比例多少？</p>
                    <p><span class="f_e7340c">A:</span>你好，装修费用不可以用公积金支付，这个政策已经于2012年就结束了。</p>
                </dd>
            </dl>
            <dl>
                <dt><img src="<?=Yii::$app->request->baseUrl;?>/images/150826_img03.jpg" width="55"></dt>
                <dd>
                    <p><span class="f_e7340c">Q:</span>老房子住了差不多十年，想局部翻新，不知道怎么弄比较好，费用如何？</p>
                    <p><span class="f_e7340c">A:</span>你好，建议让专业人士上门勘测，水电是否要重排，防水也很重要.费用是由设计师或专业人员评估后报价。</p>
                </dd>
            </dl>
        </div>
    </div>

    <div class="clearfix"></div>
</div>

<div id="layer_from" class="layer_from" style="display:none">
    <div class="input_box">
        <div class="closer" onclick="FromShow('layer_from')"></div>
        <h2 class="tc">给施工队长打分</h2>
        <div class="input_info">
            <label class="input_text"><span class="f_e7340c">*</span>我的评论:</label>
            <textarea class="addressItem" value="comment" id ="comment_txt"></textarea>
        </div>
        <div class="rating_box">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>服务态度：</td>
                    <td>
                        <input type="hidden" name="stars1" id ="stars1_input" value="0">
                        <div class="target-demo" id="stars1"></div>
                    </td>
                </tr>
                <tr>
                    <td>预算精准：</td>
                    <td>
                        <input type="hidden" name="stars2" id ="stars2_input" value="0">
                        <div class="target-demo" id="stars2"></div>
                    </td>
                </tr>
                <tr>
                    <td>施工效率：</td>
                    <td>
                        <input type="hidden" name="stars3" id ="stars3_input" value="0">
                        <div class="target-demo" id="stars3"></div>
                    </td>
                </tr>
                <tr>
                    <td>施工质量：</td>
                    <td>
                        <input type="hidden" name="stars4" id ="stars4_input" value="0">
                        <div class="target-demo" id="stars4"></div>
                    </td>
                </tr>
            </table>

        </div>
        <div class="remove_btn"><input type="button" value="确认提交" class="btn" onclick="submit();"></div>
    </div>
</div>
<div id="fade" class="black_overlay"></div>

<script type="text/javascript">
    function submit(){
        var id = <?=$model->id;?>;
        var stars1 = $("#stars1_input").val();
        var stars2 = $("#stars2_input").val();
        var stars3 = $("#stars3_input").val();
        var stars4 = $("#stars4_input").val();
        var comment = $("#comment_txt").val();
        if(comment == ''){
            alert('评论不能为空');
            return;
        }

        var _csrf='<?= Yii::$app->request->getCsrfToken()?>';
        $.ajax({
            url: '<?=Url::to(['team/ajrelease']);?>',
            data: {'id':id,'stars1':stars1,'stars2':stars2,'stars3':stars3,'stars4':stars4,'comment':comment,'_csrf':_csrf},
            dataType: "json",
            type: "POST",
            success: function (data) {
                if(data.status == 1){
                    alert('感谢您的评论！')
                    location.reload();
                } else {
                    alert(data.msg);
                    //$('#error_msg').html(data.msg);
                }
            }
        });
    }
    function FromShow(i){
        if($("#"+i).is(":hidden"))
        {
            $("#"+i).show();
            $("#fade").show();
        }
        else
        {
            $("#"+i).hide();
            $("#fade").hide();
        }
    }
    $(function(){
        $('.target-demo').raty({
            number: 5,//多少个星星设置
            path      : '',
            size      : 24,
            starOff   : '<?=Yii::$app->request->baseUrl;?>/images/star-off-big.png',
            starOn    : '<?=Yii::$app->request->baseUrl;?>/images/star-on-big.png',
            cancel    : false,
            targetKeep: true,
            targetText: '请选择评分',
            click: function(score, evt) {
                var id = this.id+'_input';
                $("#"+id).attr('value',score);
            }
        });
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

