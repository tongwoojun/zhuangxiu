<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Qacomment;

/**
 * QacommentSearch represents the model behind the search form about `common\models\Qacomment`.
 */
class QacommentSearch extends Qacomment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qid', 'type', 'status'], 'integer'],
            [['ip', 'comment', 'time'], 'safe'],
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
        $query = Qacomment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'qid' => $this->qid,
            'type' => $this->type,
            'time' => $this->time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
