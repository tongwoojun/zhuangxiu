<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $tid
 * @property string $ip
 * @property string $comment
 * @property integer $stars1
 * @property integer $stars2
 * @property integer $stars3
 * @property integer $stars4
 * @property integer $time
 */
class Comment extends Models
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tid', 'ip', 'comment', 'time'], 'required'],
            [['tid', 'stars1', 'stars2', 'stars3', 'stars4', 'time','status'], 'integer'],
            [['ip'], 'string', 'max' => 16],
            [['comment'], 'string', 'max' => 225],
            [['tid'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['tid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tid' => 'Tid',
            'ip' => 'IP地址',
            'comment' => '评论',
            'stars1' => '服务态度',
            'stars2' => '预算精准',
            'stars3' => '施工效率',
            'stars4' => '施工质量',
            'time' => '时间戳',
            'status' => '状态',
        ];
    }

    public function getT()
    {
        return $this->hasOne(Team::className(), ['id' => 'tid']);
    }
}
