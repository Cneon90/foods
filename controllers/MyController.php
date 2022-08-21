<?php


namespace app\controllers;


use app\models\Detail;
use app\models\Dishs;
use app\models\MenuItems;
use app\models\orderfilter;
use app\models\Orders;
use app\models\service;
use app\models\Workers;
use app\models\Users;
use yii\base\BaseObject;
use yii\web\Controller;
use Yii;

class MyController extends Controller
{

    public function actionIndex()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $user_id = $_SESSION['user_id'];//Получаем ID пользователя
        $orders = Orders::find()->where(['id_user'=>$user_id])->all();
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('index', compact('orders','maxdish'));
    }


    public function actionOrderfilter()
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $model = new orderfilter();
        if ($model->load(Yii::$app->request->post(),'') && $model->validate()) {
            $start = $model->date_start;
            $end = $model->date_end;
        }

        $user_id = $_SESSION['user_id'];//Получаем ID пользователя
        $orders = Orders::find()->
        where(['id_user'=>$user_id])
            ->andFilterWhere(['>=', 'date_create', $start])
            ->andFilterWhere(['<=', 'date_create', $end])
            ->all();
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('index', compact('orders','start','end','maxdish'));
    }

    public function actionOrder($id)
    {
        $session = Yii::$app->session;
        // открываем сессию
        $session->open();
        $orders = Orders::find()->with(['detail'])->where(['id' => $id])->asArray()->one();
        $dish = [];
       // echo '<pre>';
        $numberOrder = $orders['id'];
        $OrderList = $orders['detail'];
        $i=0;
        foreach ($OrderList as $value)
        {
            $dish[$i] = Dishs::findOne($value['id_dish']);
            $i++;
        }
       // echo '</pre>';
        $serv = new service();
        $maxdish = $serv->maxDishs();
        return $this->render('order',compact('OrderList','dish','numberOrder','maxdish'));
    }


}