<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dishs".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $id_menu_item
 * @property int|null $id_vendor
 * @property string|null $ingredients
 * @property int|null $price
 *
 * @property MenuItems $menuItem
 * @property OrderDish[] $orderDishes
 * @property Vendors $vendor
 */
class Dishs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dishs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_menu_item', 'id_vendor', 'price'], 'integer'],
            [['name', 'ingredients'], 'string', 'max' => 255],
            [['id_menu_item'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItems::className(), 'targetAttribute' => ['id_menu_item' => 'id']],
            [['id_vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendors::className(), 'targetAttribute' => ['id_vendor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_menu_item' => 'Id Menu Item',
            'id_vendor' => 'Id Vendor',
            'ingredients' => 'Ingredients',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[MenuItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItem()
    {
        return $this->hasOne(MenuItems::className(), ['id' => 'id_menu_item']);
    }

    /**
     * Gets query for [[OrderDishes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDishes()
    {
        return $this->hasMany(OrderDish::className(), ['id_dish' => 'id']);
    }

    /**
     * Gets query for [[Vendor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendors::className(), ['id' => 'id_vendor']);
    }
}
