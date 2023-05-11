$('.feedback_sub').submit(function(e){
    e.preventDefault();
    let th = $(this);
    let mess = $('.input_text');
    $.ajax({
        url: 'vendor/action/tic.php',
        type: 'POST',
        data: th.serialize(),
        success: function(data){
            if(data == '1{"result":"error","resultfile":null,"status":null}'){
            $("#erconts").html("Неверный email");
        }else{
            setTimeout(function(){
                th.trigger('reset');
                $("#erconts").html("Ваше сообщение успешно отправлено");
            }, 1000)
        }
        },
    })
})