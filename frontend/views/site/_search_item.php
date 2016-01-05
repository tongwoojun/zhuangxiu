<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/12/2
 * Time: 10:31
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;

$tag_list = ['scene'=>'翻新现场','qa'=>'翻新问答','trends'=>'佳园动态'];
$table = is_object($model)?$model->tableName():'';
?>

<?php if($table == 'zx_scene'){?>
<li>
    <div class="secc_lihd secc_add_result">
        <a href="<?=Url::to(['scene/detail','id'=>$model->id]);?>" class="company_lnk ect">翻新现场</a>
        <a href="<?=Url::to(['scene/detail','id'=>$model->id]);?>" class="question_lnk ect f_e7340c"><?=$model->title;?></a>
    </div>
    <div class="f_9f9f9f mb10">浏览数：<?=$model->views;?></div>
    <div class="secc_lians"><?=StringHelper::truncate($model->content,55);?></div>
</li>
<?php }elseif($table == 'zx_qa'){?>
<li>
    <div class="secc_lihd secc_add_result">
        <a href="<?=Url::to(['qa/detail','id'=>$model->id]);?>" class="company_lnk ect">翻新问答</a>
        <a href="<?=Url::to(['qa/detail','id'=>$model->id]);?>" class="question_lnk ect f_e7340c"><?=StringHelper::truncate($model->question,50);?></a>
    </div>
    <div class="f_9f9f9f mb10">浏览数：<?=$model->views;?></div>
    <div class="secc_lians"><?=StringHelper::truncate($model->answer,55);?></div>
</li>
<?php }elseif($table == 'zx_trends'){?>
<li>
    <div class="secc_lihd secc_add_result">
        <a href="<?=Url::to(['trends/detail','id'=>$model->id]);?>" class="company_lnk ect">佳园动态</a>
        <a href="<?=Url::to(['trends/detail','id'=>$model->id]);?>" class="question_lnk ect f_e7340c"><?=$model->title;?></a>
    </div>
    <div class="f_9f9f9f mb10">浏览数：<?=$model->views;?></div>
    <div class="secc_lians"><?=StringHelper::truncate($model->desc,55);?></div>
</li>
<?php }else{?>
<li>
    <div class="secc_lihd secc_add_result">
        <a href="<?=Url::to([$model[tab].'/detail','id'=>$model[id]]);?>" class="company_lnk ect"><?=$tag_list[$model[tab]];?></a>
        <a href="<?=Url::to([$model[tab].'/detail','id'=>$model[id]]);?>" class="question_lnk ect f_e7340c"><?=$model[title];?></a>
    </div>
    <div class="f_9f9f9f mb10">浏览数：<?=$model[views];?></div>
    <div class="secc_lians"><?=StringHelper::truncate($model[stitle],55);?></div>
</li>
<?php }?>