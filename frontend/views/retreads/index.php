<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/12/11
 * Time: 19:01
 */

use \yii\helpers\Url;
use \yii\helpers\Html;
use yii\helpers\StringHelper;
$this->title = '翻新套餐';
?>
<div class="p_w">
    <div class="in_module_header">
        <span>推荐套餐</span>
    </div>
    <?php if(isset(Yii::$app->view->params['ads'][12])){ ?>
    <div class="in_bill"><a href="<?=Yii::$app->view->params['ads'][12][0]['url'];?>" target="_blank"><img src="<?=Yii::$app->request->baseUrl.Yii::$app->view->params['ads'][12][0][img];?>" width="1198" height="394"></a></div>
    <?php }?>

    <?php if(isset($package)){ ?>
        <div class="in_fxtc">
            <div class="in_module_header">
                <a href="<?=Url::to(['retreads/list']);?>"><span>翻新套餐</span></a>
            </div>
            <ul>
                <?php foreach($package as $key=>$value){$num=$key+1;?>
                    <li>
                        <a href="<?=Url::to(['retreads/detail','id'=>$value->id]);?>" class="in_fxtc_menu<?=$num;?>" target="_blank" >
                            <div class="in_fxtc_box">
                                <p><?=Html::encode($value->title);?></p>
                                <span class="in_fxtc_more">查看详情</span>
                            </div>
                        </a>
                    </li>
                <?php }?>
            </ul>
            <div class="clearfix"></div>
        </div>
    <?php }?>

    <?php if(isset(Yii::$app->view->params['ads'][3])){ ?>
        <div class="in_fxlc">
            <div class="in_module_header">
                <span>翻新流程</span>
            </div>
            <ul class="in_fxlc_list">
                <?php foreach(Yii::$app->view->params['ads'][3] as $value){?>
                    <li>
                        <a href="<?=$value['url'];?>">
                            <?=$value['desc'];?>
                        </a>
                    </li>
                <?php }?>
            </ul>
            <div class="clearfix"></div>
        </div>
    <?php }?>

    <div class="about_jiayuan border-all mb30">
        <div class="tc">
            <h2>了解佳园</h2>
        </div>
        <div class="about_jy_main">
            <div class="about_jy_left">
                <div class="mb30">
                    <div class="tc">
                        <h3><i class="about_jy_icon1"></i><span>公司简介</span></h3>
                    </div>
                    <p>　　进念设计∙佳园装潢始创于1994年，专注于翻新装潢核心业务二十年的民营企业，服务足迹已遍布上海千家万户，在上海各区开设九个分支机构。为客户翻新装潢需求而不断转型，为客户满意而不断创新。进念设计的核心业务为住宅的翻新装潢、局部的翻新装潢、别墅翻新装潢等。进念设计∙佳园装潢创立了"翻新装潢网"，为老百姓服务。</p>
                </div>
                <div>
                    <div class="tc">
                        <h3><i class="about_jy_icon3"></i><span>企业优势</span></h3>
                    </div>
                    <p>●　花上两三万， 旧貌换新颜</p>
                    <p>　　为满足市民住宅翻新的需求，进念设计·佳园装潢为广大市民提供以翻新"短、平、快"为特色的多项服务，推出的特色服务有"全屋刷新服务"环保水漆套餐，不仅仅是墙面翻新，家具地板房门木饰面，面面刷新，即刷即住，拒绝甲醛倡导环保家居，更有"厨房翻新，完美10天"套餐：承诺厨房的翻新时间从以往常规的20天缩短到10天内完成以及"卫生间翻新，只需九天"的特快服务，还有针对二手房装修整体翻新套餐：以980元"经济适用"型装修套餐供广大市民选择。</p>
                    <p>●　全屋刷新服务， 佳园"仓"来帮忙</p>
                    <p>　　进念设计·佳园装潢为了满足更多市民的翻新需求，联合环保水漆中国知名水漆品牌晨阳水漆共同推出"全屋刷新"服务。不仅仅是墙面翻新，墙面、家具、地板、房门、木饰面等面面俱到，即刷即住。即满足了更多市民想要全面刷新的需求，又真正做到了即刷即住的零甲醛环保绿化居住环境。</p>
                    <p>　　如果消费者家里要翻新，家具电器家居用品没地方放，佳园仓可以提供地方存放。帮助现场搬移、临时寄放、无需自己动手！如果消费者翻新需求无需寄放家具或者打算一边居住一边装修，佳园的家具搬移和现场专业保护一样可以实现翻新的美好愿望。</p>
                </div>
            </div>
            <div class="about_jy_left">
                <div class="tc mb30">
                    <h3><i class="about_jy_icon2"></i><span>企业荣誉</span></h3>
                    <p>上海名牌</p>
                    <p>上海市著名商标证书</p>
                    <p>百姓最喜爱的装饰品牌</p>
                    <p>合同信用AAA级企业</p>
                    <p>2014年度上海市住宅装饰装修行业标杆企业</p>
                    <p>建筑装修装饰工程专业承包贰级资质证书</p>
                    <p>建筑装饰工程设计专项乙级资质证书</p>
                    <p>全国住宅装饰装修行业百强企业</p>
                    <p>上海市室内装饰行业五星级装饰企业</p>
                    <p>进念设计·佳园装潢赢得了众多荣誉与消费者的口碑：</p>
                    <p>引进第三方权威检测机构对家装工程进行全数质量检验并出具检验报告；</p>
                    <p>在家装行业专设饰后服务部门，实行以"八专"为标志的饰后服务；</p>
                    <p>在家装行业承诺水电隐蔽工程免费保修5年，其它工程免费保修2年；</p>
                    <p>推行节约环保型、经济适用型装潢套餐；</p>
                    <p>推出翻新装潢服务，让老百姓实现了"花上二三万，让您家旧貌换新颜"</p>
                    <p>的美好夙愿；</p>
                </div>
                <div class="企业理念">
                    <div class="tc">
                        <h3><i class="about_jy_icon4"></i><span>公司简介</span></h3>
                    </div>
                    <p>　　为客户需求而转型，为客户满意而不断创新。作为上海名牌、上海市著名商标，进念设计·佳园装潢一直努力成为老百姓的"住宅管家"，并创立"翻新装潢网"，为广大业主提供线上线下的全面服务。</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="about_jiayuan border-all mb30">
        <img src="<?=Yii::$app->request->baseUrl;?>/images/150921_img20.jpg" width="1198" style="display:block;">
    </div>
</div>