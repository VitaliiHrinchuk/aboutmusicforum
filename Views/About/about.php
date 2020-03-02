<div class="hero-wrap hero-wrap-2 " style="background-image: url('<?php if(isset($photo)) echo PUBLIC_DIR."/images/$photo"?>');">
    <div class="overlay"></div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-8 text text-center pt-3">
            <div class="img mb-4" style="background-image: url('<?php if(isset($photo)) echo PUBLIC_DIR."/images/$photo"?>');"></div>
            <div class="desc">
                <h1 class="mb-4">
                    <?php
                        if(isset($first_name) &&  isset($last_name)){
                            echo $last_name . " ". $first_name;
                        }
                    ?>
                </h1>
                <p class="mb-4 text-dark"><?php if(isset($short_about)) echo $short_about;?></p>
<!--                <ul class="ftco-social mt-3">-->
<!--                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>-->
<!--                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>-->
<!--                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>-->
<!--                </ul>-->
            </div>
        </div>
    </div>
</div>
<section class="container pl-5 py-3">
    <div class="row">
        <h3>Коротка інформація</h3>
        <hr>
    </div>
    <div class="row">
        <table class="table table-sm">
            <tr>
                <td style="width: 150px">ПІБ:</td>
                <td>
                    <?php
                    if(isset($first_name) && isset($second_name) && isset($last_name)){
                        echo $last_name . " ". $first_name . " ". $second_name;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">Дата народження:</td>
                <td>
                    <?php
                        if(isset($date_of_birth)) echo $date_of_birth;
                    ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">Освіта:</td>
                <td><?php
                    if(isset($education)) echo $education;
                    ?></td>
            </tr>
            <tr>
                <td style="width: 150px">Місце роботи:</td>
                <td>
                    <?php
                    if(isset($work)) echo $work;
                    ?>
                </td>
            </tr>
            <tr>
                <td style="width: 150px">Стаж:</td>
                <td>
                    <?php
                    if(isset($exp)) echo $exp;
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <h4 class="col-12 x-0 px-0">Про мене</h4>
        <div>
            <?php
            if(isset($long_about)) echo $long_about;
            ?>
        </div>
    </div>
</section>
