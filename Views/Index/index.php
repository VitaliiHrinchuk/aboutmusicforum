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
                <h1>What Services we offer to our clients</h1>
                <p>
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-user"></span>Expert Technicians</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-license"></span>Professional Service</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-phone"></span>Great Support</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-rocket"></span>Technical Skills</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-diamond"></span>Highly Recomended</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-bubble"></span>Positive Reviews</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-about-area" id="about">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 no-padding home-about-left">
                <img class="img-fluid" src="<?php echo PUBLIC_DIR."/"?>img/about-img.jpg" alt="">
            </div>
            <div class="col-lg-6 no-padding home-about-right">
                <h1>Globally Connected <br>
                    by Large Network</h1>
                <p>
                    <span>We are here to listen from you deliver exellence</span>
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                </p>
                <a class="text-uppercase primary-btn" href="#">get details</a>
            </div>
        </div>
    </div>
</section>

<section class="model-area section-gap" id="cars">
    <div class="container">
        <div class="row d-flex justify-content-center pb-40">
            <div class="col-md-8 pb-40 header-text">
                <h1 class="text-center pb-10">Choose your Desired Car Model</h1>
                <p class="text-center">
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>
        <div class="active-model-carusel">
            <div class="row align-items-center single-model item">
                <div class="col-lg-6 model-left">
                    <div class="title justify-content-between d-flex">
                        <h4 class="mt-20">Audi 3000 msi</h4>
                        <h2>$149<span>/day</span></h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p>
                        Capacity         : 04 Person <br>
                        Doors            : 04 <br>
                        Air Condition    : Dual Zone <br>
                        Transmission     : Automatic
                    </p>
                    <a class="text-uppercase primary-btn" href="#">Book This Car Now</a>
                </div>
                <div class="col-lg-6 model-right">
                    <img class="img-fluid" src="img/car.jpg" alt="">
                </div>
            </div>
            <div class="row align-items-center single-model item">
                <div class="col-lg-6 model-left">
                    <div class="title justify-content-between d-flex">
                        <h4 class="mt-20">Audi 3000 msi</h4>
                        <h2>$149<span>/day</span></h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p>
                        Capacity         : 04 Person <br>
                        Doors            : 04 <br>
                        Air Condition    : Dual Zone <br>
                        Transmission     : Automatic
                    </p>
                    <a class="text-uppercase primary-btn" href="#">Book This Car Now</a>
                </div>
                <div class="col-lg-6 model-right">
                    <img class="img-fluid" src="img/car.jpg" alt="">
                </div>
            </div>
            <div class="row align-items-center single-model item">
                <div class="col-lg-6 model-left">
                    <div class="title justify-content-between d-flex">
                        <h4 class="mt-20">Audi 3000 msi</h4>
                        <h2>$149<span>/day</span></h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p>
                        Capacity         : 04 Person <br>
                        Doors            : 04 <br>
                        Air Condition    : Dual Zone <br>
                        Transmission     : Automatic
                    </p>
                    <a class="text-uppercase primary-btn" href="#">Book This Car Now</a>
                </div>
                <div class="col-lg-6 model-right">
                    <img class="img-fluid" src="<?php echo PUBLIC_DIR."/"?>img/car.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="facts-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col single-fact">
                <h1 class="counter">2536</h1>
                <p>Projects Completed</p>
            </div>
            <div class="col single-fact">
                <h1 class="counter">6784</h1>
                <p>Really Happy Clients</p>
            </div>
            <div class="col single-fact">
                <h1 class="counter">1059</h1>
                <p>Total Tasks Completed</p>
            </div>
            <div class="col single-fact">
                <h1 class="counter">2239</h1>
                <p>Cups of Coffee Taken</p>
            </div>
            <div class="col single-fact">
                <h1 class="counter">435</h1>
                <p>In House Professionals</p>
            </div>
        </div>
    </div>
</section>

<section class="reviews-area section-gap" id="review">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-40 header-text text-center">
                <h1>Some Features that Made us Unique</h1>
                <p class="mb-10 text-center">
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Cody Hines</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Chad Herrera</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Andre Gonzalez</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Jon Banks</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Landon Houston</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-review">
                    <h4>Nelle Wade</h4>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="callaction-area relative section-gap">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="text-white">Experience Great Support</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                </p>
                <a class="callaction-btn text-uppercase" href="#">Reach Our Support Team</a>
            </div>
        </div>
    </div>
</section>

<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Latest From Our Blog</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b1.jpg" alt="">
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="blog-single.html"><h4>Addiction When Gambling
                        Becomes A Problem</h4></a>
                <p>
                    inappropriate behavior ipsum dolor sit amet, consectetur.
                </p>
                <div class="meta-bottom d-flex justify-content-between">
                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b2.jpg" alt="">
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="blog-single.html"><h4>Addiction When Gambling
                        Becomes A Problem</h4></a>
                <p>
                    inappropriate behavior ipsum dolor sit amet, consectetur.
                </p>
                <div class="meta-bottom d-flex justify-content-between">
                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b3.jpg" alt="">
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="blog-single.html"><h4>Addiction When Gambling
                        Becomes A Problem</h4></a>
                <p>
                    inappropriate behavior ipsum dolor sit amet, consectetur.
                </p>
                <div class="meta-bottom d-flex justify-content-between">
                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b4.jpg" alt="">
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="blog-single.html"><h4>Addiction When Gambling
                        Becomes A Problem</h4></a>
                <p>
                    inappropriate behavior ipsum dolor sit amet, consectetur.
                </p>
                <div class="meta-bottom d-flex justify-content-between">
                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                </div>
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