<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "trends".
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $short_title
 * @property string $img
 * @property string $short_img
 * @property string $desc
 * @property string $content
 * @property integer $views
 * @property string $time
 * @property integer $status
 */
class Trends extends Models
{
    public $type_list = [1=>'推荐新闻',2=>'新闻报道',3=>'装修攻略',4=>'材料选购',5=>'家具布置',6=>'家居风水',];

    //public $type_list = [1=>'新闻&视频',2=>'翻新知识'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_trends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'short_title', 'desc', 'content','status'], 'required'],
            [['type', 'views', 'status'], 'integer'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['img'], 'file', 'extensions' => 'gif, jpg, png',],
            ['time', 'default', 'value' =>date('Y-m-d H:i:s')],
            [['title'], 'string', 'max' => 50],
            [['short_title'], 'string', 'max' => 20],
            [['img', 'short_img', 'desc'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类型',
            'title' => '标题',
            'short_title'=>'短标题',
            'img' => '图片',
            'short_img'=>'缩略图',
            'desc' => '描述',
            'content' => '内容',
            'views'=>'浏览数',
            'time' => '时间',
            'status' => '状态',
        ];
    }

    #获取最新数据
    public static function getData($limit = '4',$type=''){
        $data = [];
        if($type){
            $model = self::find()->andWhere(['status' => 1,'type'=>$type])->orderBy('id desc')->all();
        }else {
            $model = self::find()->andWhere(['status' => 1])->orderBy('id desc')->all();
        }
        if($model){
            foreach($model as $value){
                if(count(@$data[$value->type]) >= $limit){
                    continue;
                }
                $data[$value->type][] = $value->attributes;
            }
        }
        return $data;
    }

    #搜索信息
    public static function searchData($keyword){
        $query = self::find()->orderBy('id desc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        $query->orFilterWhere(['like', 'title', $keyword])->orFilterWhere(['like', 'short_title', $keyword])->andWhere(['status'=>1]);
        return $dataProvider;
    }
}
