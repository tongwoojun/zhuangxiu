<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/4/15
 * Time: 16:00
 */
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="p_w">
    <div class="place">
        <a href="<?=Url::to(['site/index']);?>">首页</a>
        <a href="<?=Url::to(['qa/index']);?>">翻新问答</a>
        <span>问答详情</span>
    </div>
    <div class="con_left fl">
        <div class="ques_list border-all">
            <ul>
                <li>
                    <div class="secc_lihd mb20"><?=$model->question;?></div>
                    <div class="ask_sub_info">
                        <span>提问用户：<?=$model->user->username;?></span>
                        <span>浏览次数：<?=intval($model->views);?></span>
                        <span>提问时间：<?=$model->time;?></span>
                    </div>
                </li>
                <li>
                    <div class="f_e7340c f14 mb10" style="line-height: 30px;">翻新装潢网：</div>
                    <div class="ask_de">
                        <?=$model->answer;?>
                    </div>
                </li>
                <?php if($comment){foreach($comment as $value){?>
                <li>
                    <div class="f_e7340c f14 mb10" style="line-height: 30px;"><?=$value->user->username;?>(<?=$value->time;?>)：</div>
                    <div class="ask_de">
                        <?=$value->comment;?>
                    </div>
                </li>
                <?php }}?>

                <li>
                    <form id="qa_comment" action="<?=Url::to(['qa/ajaxsubmit']);?>" method="post">
                        <input type="hidden" name='_csrf' value='<?= Yii::$app->request->getCsrfToken()?>'>
                        <input type="hidden" name="id" value="<?=$model->id?>"/>
                        <div class="comment_box">
                            <div class="comment_b_tit f14">发表回复:</div>
                            <div class="comment_b_input"><textarea name="comment"></textarea></div>
                            <div class="comment_b_btn"><a href="javascript:void(0)" class="sui_btn">发表回复</a></div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <div class="scott mt50">
            <?=LinkPager::widget(['pagination'=>$page,'nextPageLabel'=>Yii::t('app','下一页'),'prevPageLabel'=>Yii::t('app','上一页'),'activePageCssClass'=>'current']); ?>
        </div>

    </div>
    <div class="con_right fr">
        <?= $this->render('//layouts/left', []); ?>
    </div>
    <div class="clearfix"></div>
</div>

<script>
    $(function () {
        $('.sui_btn').click(function(){
            var $form = $('form#qa_comment');
            var data = $form.find('textarea[name="comment"]').val();
            if(data == ''){
                alert('评论不能为空');
                return;
            }

            $.ajax({
                url: $form.attr('action'),
                type: 'post',
                data: $form.serialize(),
                success: function (data) {
                    alert(data.info);
                    if(data.status==1){
                        location.reload()
                    }
                }
            });
        });
    });

</script>
