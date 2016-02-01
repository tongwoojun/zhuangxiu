<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 16/2/1
 * Time: 11:40
 */
namespace frontend\assets;

use Yii;
use yii\helpers\Url;
use yii\helpers\StringHelper;

class Temp{
    //[1=>'图片',2=>'文字',3=>'FLASH'];
    public static function adTemp($data,$type,$params=''){
        $result = '';
        foreach($data as $key=>$value) {
            if(empty($value['img_width'])){
                $value['img_width'] = "auto";
            }
            if(empty($value['img_height'])){
                $value['img_height'] = "auto";
            }

            if ($type == 1) {
                $result .= '<a href="' . $value['url'] . '" target="_blank"><img src="' . Yii::$app->request->baseUrl . $value['img'] . '" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '" /></a>';
            } elseif ($type == 2) {
                $result .= '<li><a href="' . $value['url'] . '" target="_blank"><img src="' . Yii::$app->request->baseUrl . $value['img'] . '" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '" /></a></li>';
            }elseif ($type == 3) {
                $result .= '<li><a href="' . $value['url'] . '" target="_blank">'.$value['desc'].'</a></li>';
            }elseif ($type == 4) {
                if($value['type'] == 1){
                    $result .= '<div class="in_bill"><a href="' . $value['url'] . '" target="_blank"><img src="' . Yii::$app->request->baseUrl . $value['img'] . '" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '" /></a></div>';
                }elseif($value['type'] == 3){
                    $result .= '<div class="in_bill"><a href="' . $value['url'] . '" target="_blank"><embed src="' . $value->flash . '" type="application/x-shockwave-flash" width="' . $value->img_width . '" height="' . $value->img_height . '" quality="high" /></a></div>';
                }
            }elseif ($type == 6) {
                $result .= '<a href="' . $value['url'] . '" target="_blank" class="'.$params[$key].'"><img src="' . Yii::$app->request->baseUrl . $value['img'] . '" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '" class="lazy" /></a>';
            }elseif ($type == 7) {
                $result .= '<li><a href="' . $value['url'] . '" target="_blank" class="'.$params[$key].'"><img src="' . Yii::$app->request->baseUrl . $value['img'] . '" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '" />'.$value['name'].'</a></li>';
            }elseif ($type == 8) {
                if($value['type'] == 1){
                    $result .= '<div class="in_fxtc"><a href="' . $value['url'] . '" target="_blank"><img src="' . Yii::$app->request->baseUrl . $value['img'] . '" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '" /></a></div>';
                }elseif($value['type'] == 3){
                    $result .= '<div class="in_fxtc"><a href="' . $value['url'] . '" target="_blank"><embed src="' . $value->flash . '" type="application/x-shockwave-flash" width="' . $value->img_width . '" height="' . $value->img_height . '" quality="high" /></a></div>';
                }
            }elseif ($type == 9) {
                $result .= $value['desc'];
            }elseif ($type == 10) {
                $result .= '<li>
                                <div class="in_ques_pic">
                                    <a href="'.$value['url'].'" target="_blank"><img src="'.Yii::$app->request->baseUrl.$value['img'].'" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '" /></a>
                                </div>
                                <div class="in_ques_info">
                                    <h3><a href="'.$value['url'].'" target="_blank">'.StringHelper::truncate($value['name'],12,'',null,true).'</a></h3>
                                    <p>'.StringHelper::truncate($value['desc'],55,'...',null,true).'</p>
                                </div>
                            </li>';
            }elseif ($type == 11) {
                $result .= '<dl class="ask_team_list">
                                <dt><img src="'.$value['img'].'" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '"></dt>
                                <dd>
                                    <h3 class="f14">'.$value['name'].'</h3>
                                    '.$value['desc'].'
                                    <a href="'.Url::to(['qa/ask#ask']).'" class="ask_side_btn">我要提问</a>
                                </dd>
                            </dl>';
            }elseif ($type == 14) {
                $result .= '<dt><a href="' . $value['url'] . '" target="_blank"><img src="' . Yii::$app->request->baseUrl . $value['img'] . '" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '" /><span>'.$value['name'].'</span></a></dt>';
            }elseif ($type == 16) {
                $result .= '<div class="con_right_bill mb20">
                                <a href="'.$value['url'].'" target="_blank">
                                    <img src="'.Yii::$app->request->baseUrl.$value['img'].'" width="' . $value['img_width'] . '" height="' . $value['img_height'] . '" alt ="' . $value['name'] . '"/>
                                </a>
                            </div>';
            }

            /*elseif ($type == 2) {
                if ($value['url']) {
                    $result = '<a href="' . $value['url'] . '" class="ads_a_' . $value['id'] . '" target="_blank">' . $value['desc'] . '</a>';
                } else {
                    $result = $value['desc'];
                }
            } elseif ($type == 3) {
                $result = '<a href="' . $value['url'] . '" class="ads_a_' . $value->id . '" target="_blank"><embed class="ads_flash_' . $value->id . '" src="' . $value->flash . '" type="application/x-shockwave-flash" width="' . $value->img_width . '" height="' . $value->img_height . '" quality="high" /></a>';
            } elseif ($type == 4) {
                $result = '<a href="' . $value['url'] . '" target="_blank" class="ads_a_' . $value->id . '"><img src="' . Yii::$app->request->baseUrl . $value->img . '" width="' . $value->img_width . '" height="' . $value->img_height . '" alt ="' . $value->name . '" class="ads_img_' . $value->id . '"/>' . $value->name . '</a>';
            }*/
        }
        return $result;
    }
}