<?php


namespace app\models;



use Yii;



/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $password
 * @property int|null $status
 */


class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'first_name', 'last_name', 'phone', 'password'], 'required'],
            [['status'], 'integer'],
            [['login', 'first_name', 'last_name', 'phone', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'first_name' => 'Фамилия',
            'last_name' => 'Имя',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'status' => 'Статус',
        ];
    }

    private function loginCheck($login)
    {
        $User = Users::find()->where(['login'=>$login])->one();
        return $User;
    }

    public function session_login($User)
    {
        $_SESSION['authorization'] = 1;
        $_SESSION['Name']  = $User->last_name;
        $_SESSION['Login'] = $User->login;
    }

    public function session_logout()
    {
        $_SESSION['authorization'] = 0;
        $_SESSION['Name']  = '';
        $_SESSION['Login'] = '';
    }


    //Авторизация
    public function authorization($login,$password)
    {
        $User = self::loginCheck($login);
       //Проверяем логин
        if ($User->login != $login )
            return 0;

        //Валидация формы
        if (Yii::$app->getSecurity()->validatePassword($password,$User->password)) {
            $this->session_login($User);
            return 1;
        } else {
            $this->session_logout();
            return 0;
        }
    }



    public function CreateUser($model)
    {
        $User = self::loginCheck($model->login);
        if (isset($User))
           return 0;

            $User = new Users;
            $User -> login = $model->login;
            $User -> first_name = $model-> first_name;
            $User -> last_name = $model-> last_name;
            $User -> phone = $model-> phone;

            //генерация хэша пароля
            $hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $User -> password = $hash;
            $User -> status = 3;
            $User -> save();

        //При удачной регистрации сразу авторизуем
        $this->session_login($User);
        return 1;
    }



}
