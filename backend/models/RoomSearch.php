<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Room;

/**
 * RoomSearch represents the model behind the search form about `app\models\Room`.
 */
class RoomSearch extends Room
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hotel_id', 'room_number', 'type', 'status'], 'integer'],
            [['price'], 'number'],
            [['reserved_at'], 'string'],
            [['introduction'], 'safe'],
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
        $query = Room::find();

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
            'hotel_id' => $this->hotel_id,
            'room_number' => $this->room_number,
            'price' => $this->price,
            'type' => $this->type,
            'status' => $this->status,
        ]);

        if ($this->reserved_at && $time = strtotime($this->reserved_at)) {
            $date = date('Y-m-d', $time);
            $endTime = strtotime($date) + 24 * 3600;
            $query->andWhere('reserved_at >= ' . $time . ' and reserved_at <= ' . $endTime);
        }
        $query->andFilterWhere(['like', 'introduction', $this->introduction]);

        return $dataProvider;
    }
}
