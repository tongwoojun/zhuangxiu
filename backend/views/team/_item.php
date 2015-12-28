<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 11/22/15
 * Time: 18:23
 */
use yii\helpers\Html;
?>

<div class="col-xs-6 col-md-4">
    <div class="thumbnail">
        <?php if(!empty($model->img)){?>
            <a href="<?=$model->url;?>" class="thumbnail">
                <img data-src="holder.js/100%x200" src="<?=Yii::$app->params['imgurl'];?><?=$model->img;?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
            </a>
        <?php }?>
        <div class="caption">
            <p>描述：<?=$model->desc;?></p>
            <p>跳转：<?=$model->url;?></p>
            <p>
                <?= Html::a('更新', ['teamimg/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('删除', ['teamimg/delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>
</div>
