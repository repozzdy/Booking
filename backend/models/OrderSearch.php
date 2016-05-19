<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'hotel_id', 'room_id', 'payed_at', 'pay_state', 'created_at', 'updated_at', 'status'], 'integer'],
            [['pay_price'], 'number'],
            [['remark'], 'safe'],
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
        $query = Order::find();

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
            'uid' => $this->uid,
            'hotel_id' => $this->hotel_id,
            'room_id' => $this->room_id,
            'payed_at' => $this->payed_at,
            'pay_price' => $this->pay_price,
            'pay_state' => $this->pay_state,
            'status' => $this->status,
        ]);

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

        $query->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
