<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/12/11
 * Time: 14:33
 */
use yii\widgets\ActiveForm;

$this->title = '发表问题 - 翻新装潢网 - 佳园装潢官网';
$this->metaTags[]='<meta name="keywords" content="发表问题 - 翻新装潢网 - 佳园装潢官网"/>';
$this->metaTags[]='<meta name="description" content="发表问题, 翻新装潢网 - 佳园装潢官网"/>';
?>

<div class="p_w">
    <a href="#ask" name="ask"></a>
    <div class="place">
        <a href="#">首页</a>
        <a href="#">翻新问答</a>
        <span>发表问题</span>
    </div>
    <div class="con_left fl">
        <div class="border-all ques_list ques_from">
            <h2 class="mb30"><span>发表问题：</span></h2>

            <?php if(Yii::$app->getSession()->getFlash('error')){?>
                <div class="help-block" style="text-align:center">
                    <strong>失败!</strong> <?=Yii::$app->getSession()->getFlash('error');?>
                </div>
            <?php }?>
            <?php if(Yii::$app->getSession()->getFlash('success')){?>
                <div class="help-block" style="text-align:center">
                    <strong>成功!</strong> <?=Yii::$app->getSession()->getFlash('success');?>
                </div>
            <?php }?>

            <?php $form = ActiveForm::begin(); ?>
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                    <tr>
                        <td width="105" align="right">您的姓名：</td>
                        <td>
                            <?= $form->field($model, 'name',['template'=>"{input}\n{error}"])->textInput(['class' => 'input']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">联系电话：</td>
                        <td>
                            <?= $form->field($model, 'tel',['template'=>"{input}\n{error}"])->textInput(['class' => 'input']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">问题标题：</td>
                        <td>
                            <?= $form->field($model, 'title',['template'=>"{input}\n{error}"])->textInput(['class' => 'input']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="right">问题描述：</td>
                        <td>
                            <?= $form->field($model, 'desc',['template'=>"{input}\n{error}"])->textarea(); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" class="sui_btn" value="提交建议">
                        </td>
                    </tr>
                    </tbody>
                </table>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="con_right fr">
        <?= $this->render('//layouts/left', ['left_list'=>[6]]); ?>
    </div>
    <div class="clearfix"></div>
</div>