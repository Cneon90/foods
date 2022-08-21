<?php

namespace app\models;

use Yii;
use yii\base\Behavior;
use yii\base\Component;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\base\InvalidConfigException;
use yii\base\ModelEvent;
use yii\base\UnknownPropertyException;
use yii\db\ActiveQuery;
use yii\db\BaseActiveRecord;
use yii\db\Exception as DbException;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;
use yii\behaviors\TimestampBehavior;


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
	
	
public function behaviors()
{
    return [
        
        'saveRelations' => [
            'class'     => SaveRelationsBehavior::className(),
            'relations' => [
                'detail' => ['cascadeDelete' => false],
                'user' => ['cascadeDelete' => false],
            ],
        ],
    ];
}	
	
	
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
            [['id_user'], 'integer'],
			
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
           
        ];
    }
	
	
	//Использовать транзакции для SaveRelationsBehavior
public function transactions()
{
    return [
        self::SCENARIO_DEFAULT => self::OP_ALL,
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

//    public function getDish()
//    {
//        return $this->hasMany(OrderDetail::className(), ['id'=>'id']);
//    }
	
	 public function getUser()
    {
        return $this->hasMany(Users::className(), ['id' => 'id_user']);
    }
	
	public function getDetail()
    {
        return $this->hasMany(Detail::class, [ 'id' =>  'id_detail' ])
			->viaTable('order_detail', ['id_order'=>'id']);  
    }
	
	
	
	

	
}
