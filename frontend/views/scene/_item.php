<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/3/15
 * Time: 12:06
 */
use yii\helpers\url;
$url= Url::to(['scene/detail','id'=>$model->id]);
?>
<div class="item_box">
    <span class="item_box_top">
        <a href="<?=$url;?>"><img src="<?=Url::to([$model->img]);?>" /></a>
        <a href="<?=$url;?>" class="meitu_collection">预约翻新</a>
    </span>
    <div class="item_box_tit">
        <a href="<?=$url;?>"><?=$model->title;?></a>
    </div>
</div>