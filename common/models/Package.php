<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "package".
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
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'img', 'stitle', 'atitle', 'content'], 'required'],
            [['sort', 'views', 'status'], 'integer'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['title'], 'string', 'max' => 10],
            [['img'], 'string', 'max' => 225],
            [['stitle', 'atitle'], 'string', 'max' => 100],
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
            'status' => '状态',
        ];
    }
}
