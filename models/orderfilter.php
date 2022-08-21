<?php


namespace app\models;
use yii\base\Model;






class orderfilter extends Model
{
    public $date_start;
    public $date_end;

    public function rules()
    {
        return [
           [['date_start', 'date_end'], 'date','format' => 'php:Y-m-d'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'date_start' => 'Начало',
            'date_end' => 'Окончание',

        ];
    }



    public function getData()
    {
        return 1;


    }
}