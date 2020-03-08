<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Форум
                </h1>
                <p class="text-white link-nav"><a href="<?php echo WEBROOT; ?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?php echo WEBROOT; ?>forum"> Форум</a><span class="lnr lnr-arrow-right"></span>  <a href="№"> Створення треду</a></p>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <h2>Створіть новий тред!</h2>
    <form action="" method="post" class="col-5">
        <label for="name">Заголовок</label>
        <input type="text" class="form-control txt-field my-2" name="title" placeholder="Заголовок">
        <label for="description">Опис</label>
        <textarea name="description" class="form-control txt-field" id="" cols="30" rows="10" placeholder="Опис треду"></textarea>
        <button  type="submit" class='primary-btn my-2'>Створити тред</button>
    </form>
</section>