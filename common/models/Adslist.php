<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "ads_list".
 *
 * @property integer $id
 * @property integer $aid
 * @property string $name
 * @property string $desc
 * @property string $url
 * @property string $img
 * @property integer $sort
 * @property string $stime
 * @property string $etime
 * @property integer $status
 */
class Adslist extends Models
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'name'], 'required'],
            [['aid', 'sort', 'status'], 'integer'],
            [['desc'], 'string'],
            [['stime', 'etime'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['url', 'img'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aid' => 'Aid',
            'name' => '名称',
            'desc' => '描述',
            'url' => '链接',
            'img' => '图片',
            'sort' => '排序',
            'stime' => '开始时间',
            'etime' => '结束时间',
            'status' => '状态',
        ];
    }

    public static function getData(){
        $data = [];
        $time = date('Y-m-d');
        $sql = "select * from ads_list where status =1 and (stime is null or stime < '".$time."') and (etime is null or etime > '".$time."')";
        $model = self::findBySql($sql)->all();
        if($model){
            foreach($model as $value){
                $data[$value->aid][] = $value->attributes;
            }
        }
        return $data;
    }
}
