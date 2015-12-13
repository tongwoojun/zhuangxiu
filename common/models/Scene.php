<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "scene".
 *
 * @property integer $id
 * @property integer $area
 * @property integer $type
 * @property integer $space
 * @property integer $acreage
 * @property integer $progress
 * @property string $title
 * @property string $img
 * @property string $atitle
 * @property string $content
 * @property string $uname
 * @property string $uinfo
 * @property string $utime
 * @property string $udesigner
 * @property string $uwork
 * @property string $ustatus
 * @property string $time
 * @property integer $status
 */
class Scene extends Models
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_scene';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area', 'type', 'space', 'acreage', 'progress', 'views', 'status'], 'integer'],
            [['area', 'type', 'acreage', 'progress','title', 'atitle', 'content', 'uname', 'uinfo', 'udesigner', 'uwork', 'status','utime'  ], 'required'],
            [['content'], 'string'],
            [['utime', 'ustatus', 'time'], 'safe'],
            [['title', 'atitle', 'uname', 'udesigner', 'uwork'], 'string', 'max' => 50],
            [['img'], 'string', 'max' => 225],
            [['img'], 'file', 'extensions' => 'gif, jpg, png',],
            ['time', 'default', 'value' =>date('Y-m-d H:i:s')],
            [['uinfo'], 'string', 'max' => 100],

            ['space', 'required', 'when' => function ($model) {return $model->type == '19';},
                'whenClient' => "function (attribute, value) {return $('#scene-type').value == '19';}"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'area' => '区域',
            'type' => '类型',
            'space' => '空间',
            'acreage' => '面积',
            'progress' => '进度',
            'title' => '推荐标题',
            'img' => '图片',
            'atitle' => '文章标题',
            'content' => '内容',
            'uname' => '用户名',
            'uinfo' => '用户地址',
            'utime' => '开工日期',
            'udesigner' => '设计师',
            'uwork' => '施工队长',
            'ustatus' => '竣工日期',
            'time' => '创建日期',
            'views'=>'浏览数',
            'status' => '状态',
        ];
    }

    public function getAreas(){
        return $this->hasOne(Key::className(), ['id' => 'area']);
    }

    public function getTypes(){
        return $this->hasOne(Key::className(), ['id' => 'type']);
    }

    public function getSpaces(){
        return $this->hasOne(Key::className(), ['id' => 'space']);
    }

    public function getAcreages(){
        return $this->hasOne(Key::className(), ['id' => 'acreage']);
    }

    public function getProgresss(){
        return $this->hasOne(Key::className(), ['id' => 'progress']);
    }

    public static function searchData($keyword){
        $query = self::find()->orderBy('id desc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        $query->orFilterWhere(['like', 'title', $keyword])->orFilterWhere(['like', 'atitle', $keyword])->andWhere(['status'=>1]);
        return $dataProvider;
    }
}
