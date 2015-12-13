<?php

namespace common\models;

use Yii;
use yii\data\SqlDataProvider;

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

    #全部搜索
    public static function searchData($keyword){
    	$sql = "select id,title,atitle as stitle,views,`time`,'scene' tab from zx_scene where (title like '%".$keyword."%') or (atitle like '%".$keyword."%')
    			union
				select id,question as title,answer as stitle,views,`time`,'qa' tab from zx_qa where question like '%".$keyword."%'
				union
				select id,title,short_title as stitle,views,`time`,'trends' tab from zx_trends where title like '%".$keyword."%' or short_title like '%".$keyword."%'";
        $countsql = "select count(*) from ( ".$sql.") t ";
	    $totalCount = Yii::$app->db->createCommand($countsql)->queryScalar();
		$dataProvider = new SqlDataProvider([ 
		    'sql' => $sql, 
		    'totalCount' => $totalCount,
		    'pagination' => [ 
		        'pageSize' => 10, 
		    ], 
		]);
		return $dataProvider; 
    }
}
