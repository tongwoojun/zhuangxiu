<?php
namespace common\con;
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/8/31
 * Time: 11:13
 */
use Yii;
use yii\web\Controller;

use common\models\Key;
use common\models\Menus;
use common\models\Adslist;

class FrontendController extends Controller
{
    public $cache;
    public $cache_time = 180;
    public $menus = [];

    public function init()
    {
        parent::init();
        $this->cache = Yii::$app->cache;
        $this->getAD();
    }

    public function beforeaction($action){
        //$pathInfo = Yii::$app->controller->id.'/'.$action->id;
        $pathInfo = Yii::$app->controller->id.'/index';
        $this->getMenus($pathInfo);
        return true;
    }

    #获取菜单
    public function getMenus($url){
        $data = $this->cache->get("memus");
        if(!$data){
            $model = Menus::find()->where(['status' => 1,'type' => 1])->orderBy('sort')->all();
            if($model){
                foreach ($model as $key => $value) {
                    $data[$value->url] = $value->attributes;
                }
            }
            $this->cache->set("memus",$data,$this->cache_time);
        }

        if(isset($data[$url])){
            $data[$url]['active'] = true;
        }
        Yii::$app->view->params['memus'] = $data;
    }

    #获取LIST数据
    public function getList(){
        $data = $this->cache->get("list");
        if(!$data) {
            $data = Key::getList(true);
            $this->cache->set("list",$data,$this->cache_time);
        }
        Yii::$app->view->params['list'] = $data;
    }

    #获取广告信息
    public function getAD(){
        //TODO ads
        $data = $this->cache->get("ads");
        if(!$data){
            $data = Adslist::getData();
            $this->cache->set("ads",$data,$this->cache_time);
        }
        Yii::$app->view->params['ads'] = $data;
    }

    #转化json
    public function toJson($data,$end=true){
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = $data;
        if ($end)
            Yii::$app->end();
    }
}