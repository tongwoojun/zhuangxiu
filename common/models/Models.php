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
class Models extends \yii\db\ActiveRecord{
    public $rec_list = [0=>'不推荐',1=>'推荐'];
    public $status_list = [0=>'无效',1=>'有效'];
    public $comment_status_list = [0=>'下线',1=>'上线'];

}
