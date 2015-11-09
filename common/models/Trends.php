<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trends".
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $img
 * @property string $desc
 * @property string $content
 * @property integer $views
 * @property string $time
 * @property integer $status
 */
class Trends extends Models
{
    public $type_list = [1=>'推荐新闻',2=>'新闻报道',3=>'装修攻略',4=>'材料选购',5=>'家具布置',6=>'家居风水',];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'desc', 'content'], 'required'],
            [['type', 'views', 'status'], 'integer'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['img'], 'file', 'extensions' => 'gif, jpg, png',],
            ['time', 'default', 'value' =>date('Y-m-d H:i:s')],
            [['title'], 'string', 'max' => 50],
            [['img', 'desc'], 'string', 'max' => 225],
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
            'img' => '图片',
            'desc' => '描述',
            'content' => '内容',
            'views'=>'浏览数',
            'time' => '时间',
            'status' => '状态',
        ];
    }

    public static function getData($limit = '4'){
        $data = [];
        $model = self::find()->andWhere(['status'=>1])->orderBy('id desc')->all();
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
}
