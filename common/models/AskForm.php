<?php
/**
 * Created by PhpStorm.
 * User: a7
 * Date: 15/12/11
 * Time: 15:11
 */
namespace common\models;

use Yii;

/**
 * This is the model class for table "zx_form".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $tel
 * @property string $email
 * @property string $adress
 * @property string $desc
 * @property string $ip
 * @property string $time
 * @property string $other
 * @property integer $status
 */
class AskForm extends \yii\db\ActiveRecord
{
    public $type_lit = [1=>'展会报名',2=>'预约翻新',3=>'翻新问答'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'tel', 'title', 'desc'], 'required'],
            [['type', 'status'], 'integer'],
            [['time'], 'safe'],

            ['type', 'default', 'value' =>3],
            ['status', 'default', 'value' =>0],
            ['ip', 'default', 'value' =>Yii::$app->request->userIP],
            ['time', 'default', 'value' =>date('Y-m-d H:i:s')],

            [['name'], 'string', 'max' => 5,'min'=>2],
            ['tel', 'match','pattern' => '/^1[34578]{1}\d{9}$/','message' => '请输入正确的手机号码.'],
            [['title'], 'string', 'max' => 50,'min'=>3],
            [['adress'], 'string', 'max' => 50,'min'=>5],

            [['tel'], 'string', 'max' => 12],
            [['ip'], 'string', 'max' => 16],
            [['email', 'desc', 'other'], 'string', 'max' => 225],
            ['status', 'default', 'value' =>0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类型',
            'name' => '姓名',
            'tel' => '电话',
            'email' => '邮件',
            'adress' => '地址',
            'title'=>'问题标题',
            'desc' => '问题描述',
            'ip' => 'Ip',
            'time' => '时间',
            'other' => '备案',
            'status' => '状态',
        ];
    }

    #三天内不准重复提交
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            $time = date("Y-m-d H:i:s",strtotime("-1 day"));
            $count = self::find()->where(['ip'=>$this->ip])->andWhere(['>','time',$time])->count();
            if($count >1){
                $this->addError('time', '您已经提交过了，不要重复提交');
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);

        if ($insert && !\Yii::$app->user->isGuest) {
            $model = User::findOne(Yii::$app->user->id);
            $model->truename = $this->name;
            $model->tel = $this->tel;
            $model->adress = $this->adress;
            $model->save();
        }
    }
}
