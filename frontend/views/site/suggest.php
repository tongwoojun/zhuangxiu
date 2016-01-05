<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 16/1/5
 * Time: 16:34
 */
use \yii\helpers\Url;
$this->title = '投诉建议';
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
            <li><a href="<?=Url::to(['site/honor']);?>">荣誉资质</a></li>
            <li><a href="<?=Url::to(['site/suggest']);?>" class="active">投诉建议</a></li>
        </ul>
    </div>
    <div class="about_left border-all fr">
        <div class="about_tit">
            <span class="f20 mr10">投诉建议</span>COMPLAINT AND SUGGESTION
        </div>
        <div class="complaints_box">
            <div class="complaints_img"><img src="images/150921_img18.jpg" width="772"></div>
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tbody><tr>
                    <td width="80">联系电话：</td>
                    <td><input name="" type="text" class="input" style="width:200px;"></td>
                </tr>
                <tr>
                    <td valign="top">你的意见：</td>
                    <td><textarea name=""></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <a href="#" class="sui_btn">提交建议</a>
                    </td>
                </tr>
                </tbody></table>

        </div>

    </div>

    <div class="clearfix"></div>
</div>