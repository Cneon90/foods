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
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;


/**
 * This is the model class for table "stud".
 *
 * @property int $id
 * @property string $Name
 * @property string|null $famaly
 * @property int|null $age
 *
 * @property StudCurs[] $studCurs
 */
class Stud extends \yii\db\ActiveRecord
{
	
	
/**
 * @inheritdoc
 */
public function behaviors()
{
    return [
        TimestampBehavior::className(),
        'saveRelations' => [
            'class'     => SaveRelationsBehavior::className(),
            'relations' => [
                'curs' => ['cascadeDelete' => false],
            ],
        ],
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
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['age'], 'integer'],
            [['Name', 'famaly'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'famaly' => 'Famaly',
            'age' => 'Age',
        ];
    }

    /**
     * Gets query for [[StudCurs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudCurs()
    {
        return $this->hasMany(StudCurs::className(), ['id_stud' => 'id'])
			->viaTable('stud_curs', ['id_curs'=>'id']);  
    }
	
	 public function getCurs()
    {
        return $this->hasMany(Curs::class, [ 'id' =>  'id_curs' ])
			->viaTable('stud_curs', ['id_stud'=>'id']);  
    }
}
