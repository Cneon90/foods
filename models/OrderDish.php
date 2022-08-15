<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_dish".
 *
 * @property int $id
 * @property int|null $id_order
 * @property int|null $id_dish
 *
 * @property Dishs $dish
 * @property Orders $order
 */
class OrderDish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_dish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_dish'], 'integer'],
            [['id_dish'], 'exist', 'skipOnError' => true, 'targetClass' => Dishs::className(), 'targetAttribute' => ['id_dish' => 'id']],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['id_order' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'id_dish' => 'Id Dish',
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
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'id_order']);
    }
}
