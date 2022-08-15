<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_items".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Dishs[] $dishs
 */
class MenuItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Dishs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDishs()
    {
        return $this->hasMany(Dishs::className(), ['id_menu_item' => 'id']);
    }
}
