<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Контакти
                </h1>
                <p class="text-white link-nav"><a href="<?php echo WEBROOT; ?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="№"> Контакти</a></p>
            </div>
        </div>
    </div>
</section>

<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-flex flex-column address-wrap">

                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-envelope"></span>
                    </div>
                    <div class="contact-details">
                        <h5>support@codethemes.com</h5>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="form-area "  action="" method="post" class="contact-form text-right">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input name="name" placeholder="Ваше ім`я" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваше ім`я'" class="common-input mb-20 form-control" required="" type="text">

                            <input name="email" placeholder="Поштова адреса" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Поштова адреса'" class="common-input mb-20 form-control" required="" type="email">

                            <input name="subject" placeholder="Тема повідомлення" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Тема повідомлення'" class="common-input mb-20 form-control" required="" type="text">
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <textarea class="common-textarea form-control" name="message" placeholder="Повідомлення" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Повідомлення'" required=""></textarea>
                            <button type="submit" class="primary-btn mt-20 text-white" style="float: right;">Надіслати</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

