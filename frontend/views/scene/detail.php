<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/3/15
 * Time: 18:28
 */
use yii\helpers\Url;

$this->title = $model->atitle.' - 翻新现场 - 翻新装潢网 - 佳园装潢官网';
$this->metaTags[]='<meta name="keywords" content="'.$model->atitle.'"/>';
$this->metaTags[]='<meta name="description" content="'.$model->atitle.',翻新装潢网 - 佳园装潢官网"/>';

$list = $this->params['list'];
$type_list = isset($list['type'])?$list['type']:'';
$acreage_list = isset($list['acreage'])?$list['acreage']:'';
?>
<div class="p_w">
    <div class="place">
        <a href="<?=Url::to(['site/index']);?>">首页</a>
        <a href="<?=Url::to(['scene/index']);?>">翻新现场</a>
        <span>翻新文章</span>
    </div>
    <div class="con_left fl">
        <div class="border-all fxxc_box_m">
            <div class="fxxc_box_t">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="140">
                            <span class="f_e7340c f24"><?=$model->uname;?></span>
                        </td>
                        <td>
                            <p><?=$model->uinfo;?>／<?=$type_list[$model->type];?>／<?=$acreage_list[$model->acreage];?>／开工日期：<?=$model->utime;?></p>
                            <p>设计师：<?=$model->udesigner;?>／施工队长：<?=$model->uwork;?>／竣工日期：<?=empty($model->ustatus)?"未竣工":$model->ustatus;?></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="fxxc_box_b">
                <h2><?=$model->atitle;?></h2>
                <?=$model->content;?>
            </div>

        </div>
    </div>
    <div class="con_right fr">
        <?= $this->render('//layouts/left', ['left_list'=>[1,2,3,4,5,6]]); ?>
    </div>
    <div class="clearfix"></div>
</div>