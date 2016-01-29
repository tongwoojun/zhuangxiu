<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property integer $status
 */
class Key extends Models
{
    public $info_list = ['area'=>'地区','type'=>'类型','space'=>'空间','acreage'=>'面积','progress'=>'进度','ads'=>'广告','action'=>'活动'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_key';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'info'], 'required'],
            [['status'], 'integer'],
            [['name', 'info'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '值',
            'info' => '属性',
            'status' => '状态',
        ];
    }

    public static function getList($html=false){
        $data = [];
        $model = self::find()->andWhere(['status' => 1])->all();
        if ($model) {
            foreach ($model as $value) {
                if($html == true){
                    $data[$value->info][0] = '全部';
                }
                $data[$value->info][$value->id] = $value->name;
            }
        }
        return $data;
    }

    public static function getData($info){
        $data = [];
        $model = self::find()->andWhere(['status' => 1,'info'=>$info])->all();
        if ($model) {
            foreach ($model as $value) {
                $data[$value->info][$value->id] = $value->name;
            }
        }
        return $data;
    }
}
