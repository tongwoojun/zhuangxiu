    <?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 10/15/15
 * Time: 15:19
 */
use yii\helpers\Url;
use yii\helpers\Html;

?>
<li>
    <a href="<?=Url::to(['retreads/detail','id'=>$model->id]);?>" class="fx_packages_info">
        <img src="<?=Url::to([$model->img]);?>" width="362" height="227" />
        <div class="fx_packages_bg"></div>
        <div class="fx_packages_de fx_packages_de1">
            <h2><?=Html::encode($model->title);?></h2>
            <p><span>查看详情</span></p>
        </div>
        <div class="fx_packages_sum">
            <?=$model->stitle;?>
        </div>
    </a>
</li>