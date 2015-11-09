<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\LinkPager;

$list = $this->params['list'];
$this->registerJsFile("@web/js/jquery.min.js",['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile("@web/js/masonry-docs.min.js",['position' => \yii\web\View::POS_HEAD]);
?>

<div class="p_w">
    <div class="border-all mt20 mb10">
        <div class="camZpBox">
            <dl>
                <dt>区域：</dt>
                <dd>
                    <?php if($list && isset($list['area'])){ foreach($list['area'] as $key=>$value){?>
                        <?php
                        $is = isset($where['area'])?$where['area']:0;
                        $class= ($is == $key)?"selected":"";
                        ?>
                        <a href="javascript:void" onclick="setVal(this,'<?=$key;?>')" class="<?=$class;?>"><?=$value;?></a>
                    <?php }} ?>
                    <input type="hidden" class="form-data" name="SceneSearch[area]" value="<?=$is;?>">
                </dd>
            </dl>
            <dl>
                <dt>类型：</dt>
                <dd>
                    <?php if($list && isset($list['type'])){ foreach($list['type'] as $key=>$value){ ?>
                        <?php
                        $is = isset($where['type'])?$where['type']:0;
                        $class= ($is == $key)?"selected":"";
                        ?>
                        <a href="javascript:void" onclick="setVal(this,'<?=$key;?>')" class="<?=$class;?>"><?=$value;?></a>
                    <?php }} ?>
                    <input type="hidden" class="form-data" name="SceneSearch[type]" value="<?=$is;?>">
                </dd>
            </dl>
            <dl>
                <dt>空间：</dt>
                <dd>
                    <?php if($list && isset($list['space'])){ foreach($list['space'] as $key=>$value){ ?>
                        <?php
                        $is = isset($where['space'])?$where['space']:0;
                        $class= ($is == $key)?"selected":"";
                        ?>
                        <a href="javascript:void" onclick="setVal(this,'<?=$key;?>')" class="<?=$class;?>"><?=$value;?></a>
                    <?php }} ?>
                    <input type="hidden" class="form-data" name="SceneSearch[space]" value="<?=$is;?>">
                </dd>
            </dl>
            <dl>
                <dt>面积：</dt>
                <dd>
                    <?php if($list && isset($list['acreage'])){ foreach($list['acreage'] as $key=>$value){ ?>
                        <?php
                        $is = isset($where['acreage'])?$where['acreage']:0;
                        $class= ($is == $key)?"selected":"";
                        ?>
                        <a href="javascript:void" onclick="setVal(this,'<?=$key;?>')" class="<?=$class;?>"><?=$value;?></a>
                    <?php }} ?>
                    <input type="hidden" class="form-data" name="SceneSearch[acreage]" value="<?=$is;?>">
                </dd>
            </dl>
            <dl>
                <dt>进度：</dt>
                <dd>
                    <?php if($list && isset($list['progress'])){ foreach($list['progress'] as $key=>$value){ ?>
                        <?php
                        $is = isset($where['progress'])?$where['progress']:0;
                        $class= ($is == $key)?"selected":"";
                        ?>
                        <a href="javascript:void" onclick="setVal(this,'<?=$key;?>')" class="<?=$class;?>"><?=$value;?></a>
                    <?php }} ?>
                    <input type="hidden" class="form-data" name="SceneSearch[progress]" value="<?=$is;?>">
                </dd>
            </dl>
        </div>
    </div>

    <div id="masonry" class="container-fluid">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout'=> '{items}',
            'itemView' => '_item',//子视图
            'emptyText'=>'查询结果数据为空',
        ]);
        ?>
    </div>

    <div class="scott mt50">
        <?=LinkPager::widget(['pagination'=>$dataProvider->pagination,'nextPageLabel'=>Yii::t('app','下一页'),'prevPageLabel'=>Yii::t('app','上一页'),'activePageCssClass'=>'current']); ?>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var $container = $('#masonry');
        $container.imagesLoaded(function() {
            $container.masonry({
                itemSelector: '.item_box',
                gutter: 13,
                isAnimated: true
            });
        });
    });

    function setVal(obj,val){
        $(obj).siblings("input").eq(0).val(val);
        var url = "<?=Url::to(['scene/index']);?>?";
        $(".form-data").each(function(){
            var name = $(this).attr('name');
            var value = $(this).val();
            if(value ==0){
                value = '';
            }
            url += name+"="+value+"&";
        });
        location.href = url;
    }
</script>