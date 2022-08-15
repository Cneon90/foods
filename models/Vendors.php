<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendors".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $active
 * @property int|null $status
 */
class Vendors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active', 'status'], 'integer'],
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
            'active' => 'Active',
            'status' => 'Status',
        ];
    }
}
