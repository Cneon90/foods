<?php


namespace app\controllers;



use app\models\Cart;
use app\models\Dishs;
use app\models\Favorites;
use app\models\Orders;
use yii\base\BaseObject;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class ApiController extends Controller
{


    public function actionCard()
    {
        return 'hello';
    }

    //Добавление блюда в корзину
    public function actionAddtocart()
    {

        $id = Yii::$app->request->POST('id'); //Post('id');
        $dish = Dishs::findOne($id);
        if(!empty($disg)) return 0;
        $session = Yii::$app->session;
        $session -> open();
        $cart = new Cart();
        $cart -> addToCart($dish);

//        print_r($session['cart']);
//        print_r('count:'.$session['cart.qty']);
//        print_r('sum:'.$session['cart.sum']);
//        echo "</pre>";
//        return 1;
//        $this->layout = false;
//        return $this->render('cartmodal', compact('session'));
       // return $session['cart.qty'];


        $json =
            '[
          { 
                "count": "'.$cart -> cart_count().'",
                "sum": "'.$cart -> sum().'"
          }
        ]';   // строка содержащая JSON (текст)

        // высталяем формат ответа
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $items = json_decode($json); // переводим в php-данные
        return $items;
    }

    //Количество и сумма в блюд в корзине
    public function actionCartcount()
    {
        $session = Yii::$app->session;
        $session -> open();
        $cart = new Cart();

        $json =
            '[
          { 
                "count": "'.$cart -> cart_count().'",
                "sum": "'.$cart -> sum().'"
          }
        ]';   // строка содержащая JSON (текст)

        // высталяем формат ответа
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $items = json_decode($json); // переводим в php-данные
        return $items;
       // return $id = Yii::$app->request->post('lol'); //Post('id');//'{"count":"2" ,"sum":"2000"}';//$cart -> cart_count();
    }

    //Добавление в избранное
    public function actionFavorite_add()
    {
        $session = Yii::$app->session;
        $session -> open();

        $id = Yii::$app->request->POST('id'); //Получаем ID блюда
        $isBase = Favorites::find()->where(['id_dish' => $id])->andWhere(['id_user'=>$_SESSION['user_id']])->exists(); //Проверяем есть ли уже запись в базе
        if ($isBase) return 0;//Если есть, то возвращаем 0
        //Если нету, то добавляем
        $fav = new Favorites;
        $fav -> id_user = $_SESSION['user_id'];
        $fav -> id_dish = $id;
        $fav -> save();
        //Добавить в избранное
        echo 'user_id='.$_SESSION['user_id'].' dish_id=';
        return $id;
    }


    //Удаление записи из избранного
    public function actionFavorite_del()
    {
        $session = Yii::$app->session;
        $session -> open();
        $id = Yii::$app->request->POST('id');
        $favorite = Favorites::find()->where(['id_dish' => $id])->andWhere(['id_user'=>$_SESSION['user_id']])->one(); //findOne($id);
        $favorite->delete();
        return $id;
    }

    //Удаление записи из избранного
    public function actionOrderfilter()
    {
        $session = Yii::$app->session;
        $session -> open();

        $user_id = $_SESSION['user_id'];//Получаем ID пользователя

        $orders = Orders::find()->where(['id_user'=>$user_id])->all();

        print_r($orders);
       // return $orders;
    }



}