<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Scene;

/**
 * SceneSearch represents the model behind the search form about `common\models\Scene`.
 */
class SceneSearch extends Scene
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'area', 'type', 'space', 'acreage', 'progress', 'status'], 'integer'],
            [['title', 'img', 'atitle', 'content', 'uname', 'uinfo', 'utime', 'udesigner', 'uwork', 'ustatus', 'time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Scene::find()->orderBy('id desc');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 16,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'area' => $this->area,
            'type' => $this->type,
            'space' => $this->space,
            'acreage' => $this->acreage,
            'progress' => $this->progress,
            'utime' => $this->utime,
            'ustatus' => $this->ustatus,
            'time' => $this->time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'atitle', $this->atitle])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'uname', $this->uname])
            ->andFilterWhere(['like', 'uinfo', $this->uinfo])
            ->andFilterWhere(['like', 'udesigner', $this->udesigner])
            ->andFilterWhere(['like', 'uwork', $this->uwork]);

        return $dataProvider;
    }
}
