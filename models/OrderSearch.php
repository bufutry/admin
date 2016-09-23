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
            [['id', 'pay_meth', 'goods_id', 'order_status', 'count'], 'integer'],
            [['order_no', 'create_time', 'update_time', 'pay_time'], 'safe'],
            [['need_fee'], 'number'],
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
            'pay_meth' => $this->pay_meth,
            'goods_id' => $this->goods_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'pay_time' => $this->pay_time,
            'need_fee' => $this->need_fee,
            'order_status' => $this->order_status,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'order_no', $this->order_no]);

        return $dataProvider;
    }
}
