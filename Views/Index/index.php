<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-7 col-md-6 ">
                <h6 class="text-white ">Найліпший ресурс про класичну музику</h6>
                <h1 class="text-white text-uppercase">
                    Music World
                </h1>
                <p class="pt-20 pb-20 text-white">
                    "Музика навіть у найжахливіших драматичних положеннях повинна завжди полонити слух, завжди залишатися музикою." ©  Вольфганг Амадей Моцарт              </p>
                <?php
                if(!isset($_SESSION['id'])){
                    $link = WEBROOT.'login';
                    echo "<a href=\"$link\" class=\"primary-btn text-uppercase\">Авторизуватись</a>";
                }
                ?>
            </div>
            <?php
                if(!isset($_SESSION['id'])) {
                    echo  "<div class=\"col-lg-5  col-md-6 header-right\">
                                <h4 class=\"text-white pb-30\">Зареєструйтесь прямо зараз!</h4>
                                <small id=\"fieldHelp\" class=\"form-text invalid-feedback\" style=\"display: none\">Всі поля повинні бути заповнені</small>
                                <form class=\"form\" role=\"form\" id=\"reg-form\" method=\"POST\">
                                     <div class=\"from-group\">
                                        <input class=\"form-control txt-field mb-1 mt-2\" type=\"text\" id=\"name\" name=\"name\" placeholder=\"Ваше ім'я\">
                                        <input class=\"form-control txt-field mb-1 mt-2\" type=\"email\" id=\"email\" name=\"email\"  placeholder=\"Електронна пошта\">
                                        <div class=\"invalid-feedback m-0\"></div>
                                        <input class=\"form-control txt-field mb-2 mt-2\" type=\"password\"  id=\"password\" name=\"password\"  placeholder=\"Пароль\">
                                    </div>
                                    <div class=\"form-group row\">
                                        <div class=\"col-md-12\">
                                            <button id=\"reg-submit\" type=\"submit\"  class=\"btn btn-default btn-lg btn-block text-center text-uppercase\">Зареєструватись</button>
                                        </div>
                                    </div>
                                </form>
                            </div>";
                } else {
                    echo "<div class=\"col-lg-5  col-md-6 \"></div>";
                }
            ?>

        </div>
    </div>


</section>

<section class="feature-area section-gap" id="service">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-40 header-text">
                <h1>Що ви знайдете на нашому порталі?</h1>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-bubble"></span>Форум</h4>
                    <p>
                        Можливість обговорити будь-яку тему із однодумцями
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-volume-high"></span>Відомі твори</h4>
                    <p>
                        Список найвідоміших творів із посиланнями на YouTube-ролики
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-list"></span>Список композиторів</h4>
                    <p>
                       Список та інформація про композиторів, що постійно збільшується
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-bullhorn"></span>Свіжі новини</h4>
                    <p>
                        Свіжі новини із світу класичної музики та цікаві пости на цю тему
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-music-note"></span>Ноти</h4>
                    <p>
                        Детальна інформація про ноти та їх походження
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-star"></span>Атмосфера</h4>
                    <p>
                        Чудова можливість відчути атмосферу світу класичної музики
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="model-area section-gap" id="cars">
    <div class="container">
        <div class="row d-flex justify-content-center pb-40">
            <div class="col-md-8 pb-40 header-text">
                <h1 class="text-center pb-10">Випадкові композиції</h1>
                <p class="text-center">
                    Декілька випадкових композицій
                </p>
            </div>
        </div>

        <div class="active-model-carusel">
            <?php
            if(isset($compositions)){
                foreach ($compositions as $composition){
                    $name = $composition['name'];
                    $desc = $composition['description'];
                    $link = $composition['link'];
                    $attributesHTML = '';
                    foreach ($composition['attributes'] as $attribute){
                        $key = $attribute['attr_key'];
                        $value = $attribute['attr_value'];
                        $attributesHTML .= "$key: $value<br/>";
                    }
                    echo " <div class=\"row align-items-center single-model item\">
                                <div class=\"col-lg-6 model-left\">
                                    <div class=\"title justify-content-between d-flex\">
                                        <h4 class=\"mt-20\">$name</h4>
                                    </div>
                                    <p>$desc</p>
                                    <p>
                                        $attributesHTML
                                    </p>
                                </div>
                                <div class=\"col-lg-6 model-right\">
                                    <iframe class='w-100 ' height='300'
                                    src=\"$link\" >
                                    </iframe> 
                                </div>
                            </div>";
                }
            }
            ?>
        </div>
    </div>
</section>

<?php
    if(isset($counts)){
        $postsCount = $counts['posts'];
        $threads = $counts['threads'];
        $users = $counts['users'];
        $composers = $counts['composers'];
        $compositionsCount = $counts['compositions'];
        echo "<section class=\"facts-area section-gap\">
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col single-fact\">
                                <h1 class=\"counter\">$users</h1>
                                <p>Користувачів</p>
                            </div>
                            <div class=\"col single-fact\">
                                <h1 class=\"counter\">$compositionsCount</h1>
                                <p>Композицій</p>
                            </div>
                            <div class=\"col single-fact\">
                                <h1 class=\"counter\">$composers</h1>
                                <p>Композиторів</p>
                            </div>
                            <div class=\"col single-fact\">
                                <h1 class=\"counter\">$postsCount</h1>
                                <p>Постів</p>
                            </div>
                            <div class=\"col single-fact\">
                                <h1 class=\"counter\">$threads</h1>
                                <p>Тредів</p>
                            </div>
                        </div>
                    </div>
                </section>";

    }
?>




<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Останні новини\пости</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if(isset($posts)){
                foreach ($posts as $post){
                    $title = $post["theme"];
                    $text = strip_tags($post["content"]);
                    $comments = $post["comment_count"];
                    if(strlen($text) > 250){
                        $text =  substr($text, 0, 200);
                    }
                    $categories = $post['categories'];
                    $catLinks = '';
                    foreach ($categories as $category){
                        $name = $category["name"].' | ';
                        $catLinks .= "<a href='#'>$name</a>";
                    }
                    $img = PUBLIC_DIR."/img/posts/".$post["bg_img"];
                    $date = date("d.m.Y",strtotime($post["creation_date"]));
                    $link = WEBROOT."post/read/".$post["id"];
                    echo "<div class=\"col-lg-3 col-md-6 single-blog\">
                            <div class=\"thumb\">
                                <img class=\"img-fluid\" src=\"$img\" alt=\"\">
                            </div>
                            <p class=\"date\">$date</p>
                            $catLinks
                            <a href=\"$link\"><h4>$title</h4></a>
                            
                            <p>
                                $text
                            </p>
                            <div class=\"meta-bottom d-flex justify-content-between\">
                                <p><span class=\"lnr lnr-bubble\"></span> $comments Коментарі</p>
                            </div>
                        </div>";

                }
            }
            ?>


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
        if($("#password").val().length < 1) state = false;
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
                url: './login/register',
                data: $(this).serialize(),
                success: function (response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success === 1) {
                        location.href = './login';
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