<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/3/15
 * Time: 21:38
 */

use yii\helpers\url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
?>
<dl>
    <dt><a href="<?=Url::to(['trends/detail','id'=>$model->id]);?>" ><img src="<?=Url::to([$model->img]);?>" width="220"></a></dt>
    <dd>
        <h2><a href="<?=Url::to(['trends/detail','id'=>$model->id]);?>" ><?=Html::encode($model->title);?></a></h2>
        <p><?=StringHelper::truncate($model->desc,35);?> <a href="<?=Url::to(['trends/detail','id'=>$model->id]);?>" class="f_e7340c">[详情]</a></p>
        <p><?=$model->time;?></p>
    </dd>
</dl>