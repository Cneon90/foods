<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stud_curs".
 *
 * @property int $id
 * @property int|null $id_stud
 * @property int|null $id_curs
 *
 * @property Curs $curs
 * @property Stud $stud
 */
class StudCurs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stud_curs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_stud', 'id_curs'], 'integer'],
            [['id_curs'], 'exist', 'skipOnError' => true, 'targetClass' => Curs::className(), 'targetAttribute' => ['id_curs' => 'id']],
            [['id_stud'], 'exist', 'skipOnError' => true, 'targetClass' => Stud::className(), 'targetAttribute' => ['id_stud' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_stud' => 'Id Stud',
            'id_curs' => 'Id Curs',
        ];
    }

    /**
     * Gets query for [[Curs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurs()
    {
        return $this->hasOne(Curs::className(), ['id' => 'id_curs']);
    }

    /**
     * Gets query for [[Stud]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStud()
    {
        return $this->hasOne(Stud::className(), ['id' => 'id_stud']);
    }
}
