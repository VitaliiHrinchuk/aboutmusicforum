<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-7 col-md-6 ">
                <h6 class="text-white ">Найліпший ресурс про класичну музику</h6>
                <h1 class="text-white text-uppercase">
                    Journey into music
                </h1>
                <p class="pt-20 pb-20 text-white">
                    "Музика навіть у найжахливіших драматичних положеннях повинна завжди полонити слух, завжди залишатися музикою." ©  Вольфганг Амадей Моцарт              </p>
                <a href="#" class="primary-btn text-uppercase">Rent Car Now</a>
            </div>
            <div class="col-lg-5  col-md-6 header-right">
                <h4 class="text-white pb-30">Зареєструйтесь прямо зараз!</h4>
                <small id="fieldHelp" class="form-text invalid-feedback" style="display: none">Всі поля повинні бути заповнені</small>
                <form class="form" role="form" id="reg-form" method="POST">
                    <div class="from-group">
                        <input class="form-control txt-field mb-1 mt-2" type="text" id="name" name="name" placeholder="Ваше ім'я">
                        <input class="form-control txt-field mb-1 mt-2" type="email" id="email" name="email"  placeholder="Електронна пошта">
                        <div class="invalid-feedback m-0"></div>
                        <input class="form-control txt-field mb-2 mt-2" type="password"  id="password" name="password"  placeholder="Пароль">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button id="reg-submit" type="submit"  class="btn btn-default btn-lg btn-block text-center text-uppercase">Зареєструватись</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>
<script>
    function validateEmail(email) {
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    function checkAllInputs(){
        let state = true;

        if($("#name").val().length === 0) state = false;
        if($("#password").val().length < 6) state = false;
        if(state) $("#reg-submit").prop('disabled', false);
        else $("#reg-submit").prop('disabled', true);
    }

    $(document).ready(function() {
        $("#email").change((e)=>{
            let email = e.target.value;
            if(email.length === 0 || !validateEmail(email)){
                $("#email").addClass('is-invalid');
                $("#email + .invalid-feedback").html("Некоректна адреса електронної пошти");
                $("#reg-submit").prop('disabled', true);
                return;
            }
            $("#email").removeClass('is-invalid');
            $("#email").addClass('is-valid');
            checkAllInputs();
        });
        $("#name").change((checkAllInputs));
        $("#password").change(checkAllInputs);
        $('#reg-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './register',
                data: $(this).serialize(),
                success: function (response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success === 1) {
                        location.href = '../login';
                    } else if(jsonData.error === 'email'){
                        $("#email").addClass('is-invalid');
                        $("#email + .invalid-feedback").html("Користувач із такою алектронною адресою вже зареєстрований");
                    } else if(jsonData.error == "empty field"){
                        $("#fieldHelp").css('display', 'block');
                    }
                }
            });
        });
    });
</script>