<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/3/15
 * Time: 21:38
 */

use yii\helpers\url;
use yii\helpers\Html;
?>
<dl>
    <dt><img src="<?=Url::to([$model->img]);?>" width="220"></dt>
    <dd>
        <h2><?=Html::encode($model->title);?></h2>
        <p><?=Html::encode($model->desc);?>，…… <a href="<?=Url::to(['trends/detail','id'=>$model->id]);?>" class="f_e7340c">[详情]</a></p>
        <p><?=$model->time;?></p>
    </dd>
</dl>