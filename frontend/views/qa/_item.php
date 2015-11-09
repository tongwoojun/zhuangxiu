<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/4/15
 * Time: 15:16
 */
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>
<li>
    <div class="secc_lihd">
        <a href="<?=Url::to(['qa/detail','id'=>$model->id]);?>" class="company_lnk ect">用户<?=$model->user->username;?></a>提问
        <a href="<?=Url::to(['qa/detail','id'=>$model->id]);?>" class="question_lnk ect f_e7340c"><?=StringHelper::truncate($model->question,30);?></a>
    </div>
    <div class="secc_lians"><?=StringHelper::truncate($model->answer,55);?></div>
</li>