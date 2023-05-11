if($('.login_form').is(':visible')){
const login = document.querySelector('#login_button_one');
const regin = document.querySelector('#reg_button_one');

const formLog = document.querySelector('.login_bottom');
const formReg = document.querySelector('.form_reg');

login.addEventListener('click', function(){
    formLog.style.display = "block";
    login.style.boxShadow = "0px 2px 0px #447676";
    login.style.fontWeight = "400";
    formReg.style.display = "none";
    regin.style.boxShadow = "none";
    regin.style.fontWeight = "350";
})
regin.addEventListener('click', function(){
    formReg.style.display = "flex";
    regin.style.boxShadow = "0px 2px 0px #447676";
    regin.style.fontWeight = "400";
    formLog.style.display = "none";
    login.style.boxShadow = "none";
    login.style.fontWeight = "350";
})
function noDigits(event) {
    if ("1234567890".indexOf(event.key) != -1)
    event.preventDefault();
}
$('#mphone').on('input', function() {
    $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё-]/, ''))
    $(this).val($(this).val().replace(/[+,/,-,*]/, ''))
});

}
// Authorization

$(".form_autorization").submit(function(login){
    login.preventDefault();
    let logPass = $(this);
    $.ajax({
        url: 'vendor/action/login.php',
        type: 'POST',
        data: logPass.serialize(),
        success: function(data){
            if (data == '1') {
                $("#errLog").html("Неверные данные");
            }
            if (data == '2') {
                window.location.href = 'index.php';
            }
        },
    })
});

// end Authorization

// registration
$('.form_reg').submit(function (reg) {
    reg.preventDefault();
    let th = $(this);
    $.ajax({
        url: './vendor/action/reg.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == '1') {
                $('#erconts').html("Такая почта уже существует");
            }
            if (data == '2') {
                $('#erconts').html("Такой номер телефона уже существует");
            }
            if (data == '12') {
                $('#erconts').html("Такая почта и номер телефона уже существуют");
            }
            if (data == '3') {
                th.trigger('reset');
                $('#erconts').html("Аккаунт создан");
                setTimeout(function () {
                window.location.href = 'index.php';
                },3000)
            }
            if (data == '4') {
                $('#erconts').html("Вы ввели не валидный email");
            }
            if (data == '5') {
                $('#erconts').html("Аккаунт создан");
                //window.location.href = 'admin.php?mas';
            }
            console.log(data)
        },
    })
});

// end registration