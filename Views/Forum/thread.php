<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?php if(isset($title)) echo $title; ?>
                </h1>
                <p class="text-white link-nav"><a href="<?php echo WEBROOT; ?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?php echo WEBROOT; ?>forum"> Форум</a></p>
            </div>
        </div>
    </div>
</section>
<section  class="container py-2 ">
    <div class="row">
        <div class="col-12 col-lg-8">
            <h4><?php if(isset($title)) echo $title; ?></h4>
            <hr>
            <p><?php if(isset($description)) echo $description; ?></p>
            <div class="mb-3">Автор: <?php if(isset($author)) echo $author; ?></div>

            <div><?php if(isset($comments)) echo count($comments); ?> Повідомлень</div>
            <hr>
            <?php
            setlocale( LC_ALL , 'uk-UA.utf-8');
                foreach($comments as $comment) {
                    $text = $comment['text'];
                    $user = $comment['user'];
                    $userId = $comment['userId'];
                    $isAuthor  = '';
                    if(isset($author_id )){
                        $isAuthor = $userId == $author_id ? '<span class="lnr lnr-star"></span>Автор треду' : '' ;

                    }
                    $date = strftime("%A, %t %d.%m.%Y", strtotime( $comment['date']));
                    echo "<div class=\"row  my-2 border-bottom\">
                                <div class=\"col-12 mb-2\">
                                    <h5>$user <i class='author-mark'>$isAuthor</i></h5>
                                    <span>$date</span>
                                </div>
                                <p class=\"col-12\">$text</p>
                            </div>";
                }
            ?>
            <?php

            if(isset($isAuthorized) && $isAuthorized){
                if(isset($id)) $commentLink = WEBROOT."forum/comment/$id";
                echo "<section class=\"commentform-area pt-80\">
                                    <div class=\"container\">
                                        <h5 class=\"pb-50\">Залиште Повідомлення</h5>
                                        <div class=\"row flex-row d-flex\">
                                            <div class=\"col-lg-8 col-md-6\">
                                            <form method='post' action='$commentLink'>
                                                <textarea name='text' class=\"form-control mb-10\" name=\"message\" placeholder=\"Коментар\" onfocus=\"this.placeholder = ''\" onblur=\"this.placeholder = 'Messege'\" required=\"\"></textarea>
                                                <button type='submit'  class=\"primary-btn mt-20\">Надіслати Повідомлення</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>";
            }
            ?>
        </div>
        <div class="col-12 col-lg-4">
            <div>Інші випадкові треди</div>
            <hr>
            <?php
                if(isset($randomThreads)){
                    foreach($randomThreads as $thread) {
                        $titleThread = $thread["title"];
                        $link = WEBROOT.'forum/read/'.$thread['id'];
                        echo "<div><a href=\"$link\">$titleThread</a></div>";
                    }
                }
            ?>

        </div>
    </div>


</section>