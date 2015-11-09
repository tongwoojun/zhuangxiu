<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $username
 * @property string $img
 * @property integer $age
 * @property string $from
 * @property string $desc
 * @property integer $stars1
 * @property integer $stars2
 * @property integer $stars3
 * @property integer $stars4
 * @property integer $status
 */
class Team extends Models
{
    public $type_list = [1=>'队长',2=>'设计师'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'type', 'age','img', 'from', 'desc'], 'required'],
            [['age', 'stars1', 'stars2', 'stars3', 'stars4', 'status'], 'integer'],
            [['img'], 'file', 'extensions' => 'jpeg,gif,jpg,png' ,'mimeTypes' => 'image/jpeg,image/gif,image/jpg,image/png'],
            [['username'], 'string', 'max' => 5],
            [['from'], 'string', 'max' => 10],
            [['img', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '姓名',
            'type'=>'类型',
            'img' => '图片',
            'age' => '年纪',
            'from' => '籍贯',
            'desc' => '简介',
            'stars1' => '服务态度',
            'stars2' => '预算精准',
            'stars3' => '施工效率',
            'stars4' => '施工质量',
            'status' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['tid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamImgs()
    {
        return $this->hasMany(TeamImg::className(), ['tid' => 'id']);
    }

    public static function getData($limit = '6'){
        $data = [];
        $model = self::find()->andWhere(['status'=>1])->orderBy('id desc')->all();
        if($model) {
            foreach ($model as $value) {
                if(count($data[$value->type]) >= $limit){
                    continue;
                }
                $data[$value->type][] = $value->attributes;
            }
        }
        return $data;
    }
}
