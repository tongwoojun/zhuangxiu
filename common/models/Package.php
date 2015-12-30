<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zx_package".
 *
 * @property integer $id
 * @property string $title
 * @property string $img
 * @property string $stitle
 * @property integer $sort
 * @property string $atitle
 * @property string $content
 * @property integer $views
 * @property string $time
 * @property integer $status
 */
class Package extends Models
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'stitle', 'atitle', 'content'], 'required'],
            [['sort', 'views', 'is_rec', 'status'], 'integer'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['title'], 'string', 'max' => 10],
            [['img'], 'string', 'max' => 225],
            [['stitle', 'atitle'], 'string', 'max' => 100],
            [['status'], 'default', 'value' => 1],
            [['views'], 'default', 'value' => 0],
            [['sort'], 'default', 'value' => 1],
            [['is_rec'], 'default', 'value' => 0],

            [['img'], 'image', 'extensions' => 'jpg, png, gif', 'maxSize' => 1024 * 1024 * 1,'minWidth' => 362, 'maxWidth' => 362,     'minHeight' => 227, 'maxHeight' => 227,],

            ['img', 'required', 'when' => function ($model) {return $model->isNewRecord;},
                'whenClient' => "function (attribute, value) {
                                    obj = document.getElementById('img');
                                    if(obj){
                                        return false ;
                                    }else{
                                        return true;
                                    }
                                 }"],
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
            'img' => '图片',
            'stitle' => '短标题',
            'sort' => '排序',
            'atitle' => '文章标题',
            'content' => '内容',
            'views' => '浏览数',
            'time' => '创建时间',
            'is_rec' => '是否推荐',
            'status' => '状态',
        ];
    }

    #推荐数据
    public static function getRec($limit){
        return self::find()->where(['status'=>1,'is_rec'=>1])->orderBy('sort,id')->limit($limit)->all();
    }

    #热门数据
    public static function getHot($limit){
        return self::find()->where(['status'=>1])->orderBy('views desc')->limit($limit)->all();
    }
}
