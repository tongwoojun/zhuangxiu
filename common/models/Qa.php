<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "qa".
 *
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property integer $views
 * @property integer $uid
 * @property string $time
 * @property integer $status
 * @property integer $rec
 */
class Qa extends Models
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'uid'], 'required'],
            [['views', 'uid', 'status', 'rec'], 'integer'],
            [['time'], 'safe'],
            ['time', 'default', 'value' =>date('Y-m-d H:i:s')],
            ['status', 'default', 'value' =>1],
            [['question'], 'string', 'max' => 150],
            [['answer'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => '问',
            'answer' => '答',
            'views' => '浏览数',
            'uid' => '用户 ',
            'time' => '时间',
            'status' => '状态',
            'rec' => '是否推荐',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }
}
