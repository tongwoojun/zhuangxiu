<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team_img".
 *
 * @property integer $id
 * @property integer $tid
 * @property string $img
 * @property string $desc
 * @property string $url
 * @property integer $status
 *
 * @property Team $t
 */
class TeamImg extends Models
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tid', 'img', 'desc', 'url'], 'required'],
            [['tid', 'status'], 'integer'],
            [['img'], 'file', 'extensions' => 'jpeg,gif,jpg,png' ,'mimeTypes' => 'image/jpeg,image/gif,image/jpg,image/png'],
            [['url'], 'url'],
            [['img', 'desc', 'url'], 'string', 'max' => 225],
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
            'img' => '图片',
            'desc' => '描述',
            'url' => '地址',
            'status' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getT()
    {
        return $this->hasOne(Team::className(), ['id' => 'tid']);
    }
}
