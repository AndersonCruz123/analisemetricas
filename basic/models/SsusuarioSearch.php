<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ssusuario;

/**
 * SsusuarioSearch represents the model behind the search form about `app\models\Ssusuario`.
 */
class SsusuarioSearch extends Ssusuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'professor', 'idSala', 'idPerfil', 'paginaAtual', 'sessaoAtiva', 'accessTimestamp', 'idUsuarioTipo'], 'integer'],
            [['email', 'senha', 'nome', 'urlFotoPerfil', 'urlScreenshot', 'deviceId', 'accessToken', 'genero'], 'safe'],
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
        $query = Ssusuario::find();

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
            'idUsuario' => $this->idUsuario,
            'professor' => $this->professor,
            'idSala' => $this->idSala,
            'idPerfil' => $this->idPerfil,
            'paginaAtual' => $this->paginaAtual,
            'sessaoAtiva' => $this->sessaoAtiva,
            'accessTimestamp' => $this->accessTimestamp,
            'idUsuarioTipo' => $this->idUsuarioTipo,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'senha', $this->senha])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'urlFotoPerfil', $this->urlFotoPerfil])
            ->andFilterWhere(['like', 'urlScreenshot', $this->urlScreenshot])
            ->andFilterWhere(['like', 'deviceId', $this->deviceId])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'genero', $this->genero]);

        return $dataProvider;
    }
}
