<section id="admin-login" class="" >
    <div class="row mx-0 px-0 col-12 mt-5">
        <form  id="login-form" action="" method="POST" class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h3 class="">Вхід до панелі адміністратора</h3>
            <div id="login-error"class="error-msg text-danger " ></div>
            <div class="form-group">
                <label for="login">Логін</label>
                <input type="text" name="login" class="form-control">
            </div>
            <div class=" form-group">
                <label for="login">Пароль</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class=" btn btn-primary" value="Вхід">
            </div>

        </form>

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
                        //  location.href = '../login';
                        location.href = '../admin/postList';
                    } else{
                        $('#login-error').html(jsonData.error);

                    }
                }
            });
        });
    })
</script>