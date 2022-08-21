<?php

namespace app\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;

use Yii;

/**
 * This is the model class for table "favorites".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_dish
 *
 * @property Dishs $dish
 * @property Users $user
 */
class Favorites extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [

            'saveRelations' => [
                'class'     => SaveRelationsBehavior::className(),
                'relations' => [
                    'dishs' => ['cascadeDelete' => false],
               ],
            ],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_dish'], 'integer'],
            [['id_dish'], 'exist', 'skipOnError' => true, 'targetClass' => Dishs::className(), 'targetAttribute' => ['id_dish' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_dish' => 'Id Dish',
        ];
    }

    /**
     * Gets query for [[Dish]].
     *
     * @return \yii\db\ActiveQuery
     */

    //Использовать транзакции для SaveRelationsBehavior
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }


    public function getDish()
    {
        return $this->hasOne(Dishs::className(), ['id' => 'id_dish']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }

    public function getDishs()
    {
        return $this->hasMany(Dishs::className(), ['id' => 'id']);
    }
}
