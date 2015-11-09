<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property integer $status
 */
class Ads extends Models
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'type','desc'], 'required'],
            [['status', 'type',], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'desc' => '描述',
            'type'=>'类型',
            'status' => '状态 ',
        ];
    }

    public function getTypeList($id =''){
        $data = [];
        $model = Key::find()->andWhere(['status' => 1,'info' => 'ads'])->all();
        if ($model) {
            foreach ($model as $value) {
                if($id && $value->id ==$id){
                    return $value->name;
                }
                $data[$value->id] = $value->name;
            }
        }
        return $data;
    }
}
