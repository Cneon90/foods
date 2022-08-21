<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail".
 *
 * @property int $id
 * @property int|null $id_dish
 * @property int|null $Quantity
 * @property float|null $Price
 *
 * @property Dishs $dish
 * @property OrderDetail[] $orderDetails
 */
class Detail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dish', 'Quantity'], 'integer'],
            [['Price'], 'number'],
            [['id_dish'], 'exist', 'skipOnError' => true, 'targetClass' => Dishs::className(), 'targetAttribute' => ['id_dish' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_dish' => 'Id Dish',
            'Quantity' => 'Quantity',
            'Price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Dish]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dishs::className(), ['id' => 'id_dish']);
    }

    /**
     * Gets query for [[OrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['id_detail' => 'id']);
    }
	
	
}
