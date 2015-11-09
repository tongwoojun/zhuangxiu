<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "qa_comment".
 *
 * @property integer $id
 * @property integer $qid
 * @property string $ip
 * @property integer $type
 * @property string $comment
 * @property string $time
 * @property integer $status
 */
class Qacomment extends \yii\db\ActiveRecord
{
    public $type_list = [1=>'提问',2=>'回答'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qa_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qid', 'ip', 'type', 'comment'], 'required'],
            [['uid', 'qid', 'type', 'status'], 'integer'],
            [['time'], 'safe'],
            [['ip'], 'string', 'max' => 16],
            [['comment'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qid' => '问题 ',
            'uid' => '用户',
            'ip' => 'Ip',
            'type' => '类型',
            'comment' => '评论',
            'time' => 'Time',
            'status' => '状态',
        ];
    }

    public function canComment($qid,$uid){
        $count = self::find()->where(['qid'=>$qid,'type'=>1,'uid'=>$uid,'status'=>1])->count();
        if($count>2){
            return false;
        }
        return true;
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }
}
