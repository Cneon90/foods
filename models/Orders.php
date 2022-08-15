<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string|null $date_create
 * @property int|null $id_user
 * @property int|null $id_dish
 *
 * @property OrderDish[] $orderDishes
 */
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_create'], 'safe'],
            [['id_user', 'id_dish'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_create' => 'Date Create',
            'id_user' => 'Id User',
            'id_dish' => 'Id Dish',
        ];
    }

    /**
     * Gets query for [[OrderDishes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDishes()
    {
        return $this->hasMany(OrderDish::className(), ['id_order' => 'id']);
    }
}
