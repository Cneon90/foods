var param = $('meta[name=csrf-param]').attr("content");
var token = $('meta[name=csrf-token]').attr("content");

var data = {};
data[param] = token;

$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})




$('.product_card__add_btn').on('click', function (e)
{
console.log(data);

    $.ajax({
        url: '/api/v1/add_to_cart',         /* Куда отправить запрос */
        method: 'post',//'post',             /* Метод запроса (post или get) */
        dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
        data: {
            id: $(this).data('id'),
            _csrf:token
        },     /* Данные передаваемые в массиве */
        success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
            const obj = JSON.stringify(data);
            const numbers = JSON.parse(obj);
            $('#_answer_count').text(numbers[0]['count']);
            $('#_answer_sum').text(numbers[0]['sum']);
        }
    });

})

$('.product_card__favorits_btn').on('click', function (e)
{
    console.log(data);

    $.ajax({
        url: '/api/v1/add_to_favorite',         /* Куда отправить запрос */
        method: 'post',//'post',             /* Метод запроса (post или get) */
        dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        data: {
            id: $(this).data('id'),
            _csrf:token
        },     /* Данные передаваемые в массиве */
          success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
            //$('#favorite').text(numbers[0]['sum']);
              console.log(data);
        }
    });

})

$('.delete_favorit').on('click', function (e)
{
    console.log(data);

    $.ajax({
        url: '/api/v1/del_to_favorite',         /* Куда отправить запрос */
        method: 'post',//'post',             /* Метод запроса (post или get) */
        dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        data: {
            id: $(this).data('id'),
            _csrf:token
        },     /* Данные передаваемые в массиве */
        success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
            //$('#favorite').text(numbers[0]['sum']);
            console.log(data);
            location.reload();
        }
    });

})




$(document).ready(function() {
//После загрузки страницы, смотрим, сколько в карзине блюд
    $.ajax({
        url: '/api/v1/cart_count',         /* Куда отправить запрос */
        method: 'post',             /* Метод запроса (post или get) */
        dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
        data: data,     /* Данные передаваемые в массиве */
        success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
             const obj = JSON.stringify(data);
             const numbers = JSON.parse(obj);
            $('#_answer_count').text(numbers[0]['count']);
            $('#_answer_sum').text(numbers[0]['sum']);
        }
    });

});


//фильтер заказов
function Orderfilter()
{
    $.ajax({
        url: '/api/v1/orderfilter',         /* Куда отправить запрос */
        method: 'post',             /* Метод запроса (post или get) */
        dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        data: data,     /* Данные передаваемые в массиве */
        success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */

            $('#answer').html("<div class=\"col-md-2 order col-xs-12\">"+ data+"</div>");

        }
    });
}




