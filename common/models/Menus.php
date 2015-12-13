<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menus".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $fid
 * @property string $name
 * @property string $url
 * @property integer $sort 
 * @property integer $status
 * @property string $keywords
 * @property string $description
 */
class Menus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_menus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'fid', 'sort', 'status'], 'integer'],
            [['name'], 'required'],
            [['name', 'url'], 'string', 'max' => 50],
            [['keywords'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类别',
            'fid' => '父id',
            'name' => '标题',
            'url' => '地址',
            'sort' => '排序',
            'status' => '状态',
            'keywords' => 'Keywords',
            'description' => 'Description',
        ];
    }
}
