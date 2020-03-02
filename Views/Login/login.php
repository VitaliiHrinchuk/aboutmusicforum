<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container row text-light">

        <form action="" id="login-form" method="POST" class="col-lg-4 mx-auto container mb-5 ">
            <h3 class="text-light">Вхід</h3>
            <p >Якщо Ви зареєстровані, введіть Ваші дані, щоб увійти до системи </p>
            <div id="login-error"class="error-msg text-danger " ></div>
            <div class="form-group ">
                <label for="email">Електронна пошта</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Введіть Вашу пошту" required>
            </div>
            <div class="form-group ">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль..." required>
            </div>
            <button type="submit" class="primary-btn">Вхід</button>
        </form>
        <div class="col-lg-4 justify-content-center d-flex flex-column">
            <h3 class="text-center text-light mb-2">Ще не зареєстровані?</h3>
            <a class="primary-btn   mx-auto" href="<?php  echo WEBROOT."login/register" ?>">Зареєстурватись</a>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: './login',
                data: $(this).serialize(),
                success: function (response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success === 1) {
                        location.href = './';
                    } else{
                        $('#login-error').html(jsonData.error);

                    }
                }
            });
        });
    })
</script>