<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Композитори
                </h1>
                <p class="text-white link-nav"><a href="<?php echo WEBROOT; ?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Композитори</a></p>
            </div>
        </div>
    </div>
</section>

<section class="team-area section-gap team-page-teams" id="team">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Experienced Mentor Team</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center d-flex align-items-center">
            <?php
                if(isset($composers)){
                    foreach ($composers as $composer){

                        $id = $composer['id'];
                        $name = $composer['name'];
                        $dob = $composer['date_of_birth'];
                        $dod = $composer["date_of_death"];
                        $avatar = $composer['avatar'];
                        $avImg =  PUBLIC_DIR."/img/composers/$avatar";
                        $detailLink = WEBROOT."composers/detail/$id";
                        echo " <div class=\"col-md-3 single-team\">
                                <div class=\"thumb\">
                                    <img class=\"\" src=\"$avImg\" alt=\"\" >
                                    <div class=\"align-items-center justify-content-center d-flex\">
                                        <a href=\"$detailLink\" class='text-light'>Детальніше</a>
                                    </div>
                                </div>
                                <div class=\"meta-text mt-30 text-center\">
                                    <h4>$name</h4>
                                    <p>$dob</p>
                                </div>
                            </div>";
                    }
                }
            ?>

        </div>
    </div>
</section>