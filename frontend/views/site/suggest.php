<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 16/1/5
 * Time: 16:34
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = '投诉建议 - 翻新装潢网 - 佳园装潢官网';
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
            <div class="complaints_img"><img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img18.jpg" width="772"></div>
            <?php $form = ActiveForm::begin(); ?>

            <?php if(Yii::$app->getSession()->getFlash('error')){?>
                <div class="help-block" style="text-align:center">
                    <strong></strong><?=Yii::$app->getSession()->getFlash('error');?></strong>
                </div>
            <?php }?>
            <?php if(Yii::$app->getSession()->getFlash('success')){?>
                <div class="help-block" style="text-align:center">
                    <strong><?=Yii::$app->getSession()->getFlash('success');?></strong>
                </div>
            <?php }?>

            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tbody>
                <tr>
                    <td width="80">联系电话：</td>
                    <td>
                        <?= $form->field($model, 'tel', ['template' => "{input}\n{hint}\n{error}"])->textInput(['class'=>"input"]) ?>
                    </td>
                </tr>
                <tr>
                    <td valign="top">你的意见：</td>
                    <td>
                        <?= $form->field($model, 'suggest',['template' => "{input}\n{hint}\n{error}"])->textarea() ?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <?= Html::submitButton('提交建议', ['class' => 'sui_btn']) ?>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="clearfix"></div>
</div>