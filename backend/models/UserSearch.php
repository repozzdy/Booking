<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'type', 'status'], 'integer'],
            [[ 'created_at', 'updated_at'], 'string'],
            [['username', 'realname', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        //验证参数格式是否合法
        if (!$this->validate()) {
            return $dataProvider;
        }

        //验证时间
        if ($this->created_at && $time = strtotime($this->created_at)) {
            $date = date('Y-m-d', $time);
            $endTime = strtotime($date) + 24 * 3600;
            $query->andWhere('created_at >= ' . $time . ' and created_at <= ' . $endTime);
        }
        if ($this->updated_at && $time = strtotime($this->updated_at)) {
            $date = date('Y-m-d', $time);
            $endTime = strtotime($date) + 24 * 3600;
            $query->andWhere('updated_at >= ' . $time . ' and updated_at <= ' . $endTime);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);

        //只查管理员，type为
        if ($this->type <= 0) {
            $query->andFilterWhere(['!=', 'type', 0]);
        } else {
            $query->andFilterWhere(['type' => $this->type]);
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
