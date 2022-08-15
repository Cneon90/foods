$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})




$('.product_card__add_btn').on('click', function (e)
{

    $.ajax({
        url: '/api/v1/add_to_cart',         /* Куда отправить запрос */
        method: 'post',             /* Метод запроса (post или get) */
        dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        data: {id: $(this).data('id')},     /* Данные передаваемые в массиве */
        success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
            $('#_answer').text(data);
        }
    });

})



$(document).ready(function() {
//После загрузки страницы, смотрим, сколько в карзине блюд
    $.ajax({
        url: '/api/v1/cart_count',         /* Куда отправить запрос */
        method: 'post',             /* Метод запроса (post или get) */
        dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        data: {
            "option" : 'test',
        },     /* Данные передаваемые в массиве */
        success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
            $('#_answer').text(data);

        }
    });

});




