<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csj_order".
 *
 * @property integer $id
 * @property string $order_no
 * @property integer $pay_meth
 * @property integer $goods_id
 * @property string $create_time
 * @property string $update_time
 * @property string $pay_time
 * @property double $need_fee
 * @property integer $order_status
 * @property integer $count
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csj_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_no', 'pay_meth', 'goods_id', 'create_time', 'update_time', 'need_fee', 'order_status', 'count'], 'required'],
            [['pay_meth', 'goods_id', 'order_status', 'count'], 'integer'],
            [['create_time', 'update_time', 'pay_time'], 'safe'],
            [['need_fee'], 'number'],
            [['order_no'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_no' => 'Order No',
            'pay_meth' => 'Pay Meth',
            'goods_id' => 'Goods ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'pay_time' => 'Pay Time',
            'need_fee' => 'Need Fee',
            'order_status' => 'Order Status',
            'count' => 'Count',
        ];
    }
}
