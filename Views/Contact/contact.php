<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4 font-weight-bold">Контактна інформація</h2>
            </div>
            <div class="w-100"></div>

            <div class="col-md-3">
                <p><span>Номер телефону:</span> <a href="tel://<?php if(isset($phone)) echo $phone?>"><?php if(isset($phone)) echo $phone?></a></p>
            </div>
            <div class="col-md-3">
                <p><span>Електронна пошта:</span> <a href="mailto:<?php if(isset($email)) echo $email?>"><?php if(isset($email)) echo $email?></a></p>
            </div>

        </div>

    </div>
</section>

