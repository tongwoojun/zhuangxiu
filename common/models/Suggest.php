<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zx_suggest".
 *
 * @property integer $id
 * @property string $tel
 * @property string $suggest
 * @property string $ip
 * @property string $time
 */
class Suggest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_suggest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tel', 'suggest'], 'required'],
            [['time'], 'safe'],
            [['tel'], 'string', 'max' => 12],
            [['suggest'], 'string', 'max' => 500],
            ['ip', 'default', 'value' =>Yii::$app->request->userIP],
            [['ip'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => '联系电话',
            'suggest' => '你的意见',
            'ip' => 'Ip',
            'time' => '时间',
        ];
    }
}
