<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Liga;

/**
 * LigaSearch represents the model behind the search form of `app\models\Liga`.
 */
class LigaSearch extends Liga
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'qtde_participantes', 'rodada_inicio'], 'integer'],
            [['nome', 'descricao', 'participantes'], 'safe'],
            [['mata_mata', 'ativa'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Liga::find();

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
            'qtde_participantes' => $this->qtde_participantes,
            'mata_mata' => $this->mata_mata,
            'rodada_inicio' => $this->rodada_inicio,
            'ativa' => $this->ativa,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'participantes', $this->participantes]);

        return $dataProvider;
    }
}
