# Заказ еды
  Web приложение для предворительного заказа еды сотрудниками.

## Техническое задание 
        ◦ Yii2 на бэке. 
        ◦ Справочники:
            ▪ Сотрудники: 
                • Имя
            ▪ Поставщики: 
                • Название, Активный
            ▪ РазделМеню: 
                • Поставщик, Название
            ▪ Блюдо:
                • РазделМеню, Название, Состав (строка), Цена
            ▪ Заказ:
                • Дата, Сотрудник, Блюдо
        ◦ Интерфейс повелителя еды:
            ▪ Редактирование всех справочников.
            ▪ Формирование отчета “Заказ поставщику на дату”:
                • Блюдо, Количество, Цена, Стоимость
                • Общая стоимость по отчету
            ▪ Формирование отчета “Заказ сотрудников на дату”:
                • Сотрудник
                • Перечень заказанных блюд с количеством, ценой и общей стоимостью
            ▪ Формирование отчета “Заказы сотрудников за месяц”:
                • Сотрудник, Сумма заказов за календарный месяц
                • Сумма всех заказов всех сотрудников за календарный месяц
        ◦ Интерфейс сотрудника:
            ▪ Выбор себя из списка сотрудников.
            ▪ Выбор даты, на которую заказывается еда. По-умолчанию - следующий рабочий день.
            ▪ Меню, разбитое на разделы. В разделах - блюда с составом и ценой. 
            ▪ Возможность заказа произвольного любого блюда в произвольном количестве.
            ▪ Кнопка “Отправить заказ”, нажимаемая по завершении формирования заказа. 
    • Опционально:
        ◦ VueJS на фронте.
        ◦ Удобно использовать на мобильных устройствах.
        ◦ Интерфейс не провоцирующий отрицательные эмоции пользователя.
        ◦ Повелитель еды может менять заказ любого сотрудника вручную.
        ◦ Некоторые блюда могут быть временно недоступными для заказа.
        ◦ Сотрудник может сохранять свои предпочтения в еде и ограничивать ими возможный выбор.
        ◦ “Мне повезет” – автозаказ еды на дату, учитывая предпочтения и предыдущие заказы на этой неделе.
        ◦ Сотрудник может смотреть, что было им заказано на выбранную дату.
        ◦ Контроль времени заказа – заказ на завтра можно оформить до 12:30 сегодня
        ◦ Уведомления – напоминания сотруднику, что нужно сделать заказ на завтра, если он еще не сделан


### Названия сущностей [Скачать](https://github.com/Cneon90/foods/blob/master/Eda.xlsx)
![Image text](https://github.com/Cneon90/foods/blob/master/description.jpg)

### Схема связей базы данных
![Image text](https://github.com/Cneon90/foods/blob/master/scheme_2.jpg)

``` -- Обновление 0.0.0 ```

#### Сделано:
  ##### Администраторская часть
  1. Добавление пользователей
  2. Добавление поставщиков
  3. Добавление блюд
  4. Добавление резделов меню
  
  ##### Пользовательская часть
  1. Авторизация 
  2. Регистрация - (необходимо переделать)
  3. Формирование корзины.
  4. Вывод списка блюд (разделы меню еще не добавлены)


- Сделаны ЧПУ, файл маршрутов вынесен в ```foods/config/route.php``` 

```-- Обновление 0.0.1 ```
#### Сделано:
+ Добавление в избранное
+ Удаление из избранного
+ Просмотр избранного
+ Оформление заказа 
+ Просмотр своих заказов 
+ Фильтр заказов по дате (можно указать период)
+ Просмотр определенного заказа
+ Удаление блюда из корзины
+ Отображение 3 самых продаваемых блюд
+ Закрыт доступ к административной части сайта для обычных пользователей
+ Отображаются блюда активного поставщика
+ Меню разбито на разделы


#### Надо сделать:
- Отчёты
- Выбор даты, на которую заказывается еда
- Редактирование любого заказа администратором
- Временную блокировку блюда
- Контроль времени заказа 
- Уведомление телеграмм о необходимости сделать заказ во время
- Выбор активного поставщика в административной части сайта


#### Можно сделать:
* Разбить меню на страницы (пагинация) 
* Индикацию на блюде, что оно уже добавлено в избранное (добавить звездочку и закрашивать ее)

* Добавить возможность загрузки изображение для блюд
* Запрет добавление в избранное не авторизованным
* Отображение корзины для не авторизованных (без возможности оформить заказ)
* Отвязать цену от блюда (создать таблицу (id, id_price , date) и забирать id_price при оформлении заказа. Это даст возможность реализовать:
+  Возможность указывать стоимость блюда с определенной даты (Заранее 				прописывать изменения) 
+ Возможность указывать стоимость блюда на определенный период (Акции, скидки)

Сейчас при оформлении заказа в историю (таблица detail) сохраняются сами цены (что бы при изменении цены на блюда, в истории заказов оставались цены на момент заказа)   



