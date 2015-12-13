<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

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
    public $rec_list = ['1'=>'首图下方','2'=>'大家都在问','3'=>'热门问答'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zx_qa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'name'], 'required'],
            [['views', 'status'], 'integer'],
            [['time'], 'safe'],
            ['time', 'default', 'value' =>date('Y-m-d H:i:s')],
            ['status', 'default', 'value' =>1],
            [['name'], 'string', 'max' => 50],
            [['rec'], 'string', 'max' => 10],
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
            'name' => '用户 ',
            'time' => '时间',
            'status' => '状态',
            'rec' => '推荐',
        ];
    }

    public static function searchData($keyword){
        $query = self::find()->andWhere(['status'=>1])->orderBy('id desc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        $query->andFilterWhere(['like', 'question', $keyword]);
        return $dataProvider;
    }

    #大家都在问,最新问答,热门问答
    public static function getData(){
        $model = self::find()->andWhere(['status'=>1])->orderBy('id desc')->all();
        if(!$model){
            return;
        }
        foreach($model as $key=>$value){
            #最新问答
            if($key < 3){
                $data['new'][] = $value;
            }

            if(empty($value->rec)){
                continue;
            }
            $rec = @explode(',',$value->rec);
            if(empty($rec)){
                continue;
            }
            #首图下方
            if(in_array(1,$rec)){
                $data['top'][] = $value;
                if(count($data['top']) >4){
                    continue;
                }
            }
            #大家都在问
            if(in_array(2,$rec)){
                $data['all'][] = $value;
                if(count($data['all']) >6){
                    continue;
                }
            }
            #热门问答
            if(in_array(3,$rec)){
                $data['hot'][] = $value;
                if(count($data['top']) >3){
                    continue;
                }
            }
        }
        return $data;
    }

    #浏览数 多的
    public static function getRec($limit=4){
        return self::find()->andWhere(['status'=>1])->orderBy('views desc')->limit($limit)->all();
    }

}
