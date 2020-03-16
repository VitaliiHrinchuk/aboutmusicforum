<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?php if (isset($name)) echo $name; ?>
                </h1>
                <p class="text-white link-nav"><a href="<?php echo WEBROOT; ?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?php echo WEBROOT."composers"; ?>"> Композитори</a><span class="lnr lnr-arrow-right"></span><a href="#"> <?php if (isset($name)) echo $name; ?></a></p>
            </div>
        </div>
    </div>
</section>
<section class="container row py-4">
    <div class="col-12 col-md-3">
        <div class="w-100">
            <img class="w-100" src="<?php if (isset($avatar)) echo PUBLIC_DIR."/img/composers/$avatar"; ?>" alt="">
        </div>
    </div>
    <div class="col-12 col-md-9 ">
        <h2><?php if (isset($name)) echo $name; ?></h2>
        <div>
            <div>
                <b>Дата народження: </b> <?php if (isset($date_of_birth)) echo $date_of_birth; ?>
            </div>
            <?php if (isset($date_of_death)) echo  "<div>
                                                <b>Дата смерті:  </b> $date_of_death
                                            </div>"; ?>

        </div>
        <div class="my-2">
            <h5>Коротка біографія:</h5>
            <p><?php if (isset($description)) echo $description; ?></p>
        </div>
    </div>
</section>