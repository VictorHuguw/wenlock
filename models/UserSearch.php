<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipo'], 'integer'], 
            [['nome', 'email', 'matricula'], 'safe'], 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10, 
            ],
            'sort' => [
                'defaultOrder' => [ 
                    'nome' => SORT_ASC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

       $query->andFilterWhere([
            'id' => $this->id,
            'tipo' => $this->tipo, 
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
              ->orFilterWhere(['like', 'email', $this->nome])
              ->orFilterWhere(['like', 'matricula', $this->nome]);

        return $dataProvider;
    }
}