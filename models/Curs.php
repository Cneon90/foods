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


class Curs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	 
	 public function behaviors()
{
    return [
        TimestampBehavior::className(),
        'saveRelations' => [
            'class'     => SaveRelationsBehavior::className(),
            'relations' => [
                'stud'=> ['cascadeDelete' => false],
            ],
        ],
    ];
}
	 
	 
	 
	 
	 
    public static function tableName()
    {
        return 'curs';
    }
	
	

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[StudCurs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudCurs()
    {
        return $this->hasMany(StudCurs::className(), ['id_curs' => 'id']);
    }
	
	 public function getStud()
    {
        return $this->hasMany(Stud::class, [ 'id' =>  'id_stud' ])
			->viaTable('stud_curs', ['id_curs'=>'id']);  
    }
}
