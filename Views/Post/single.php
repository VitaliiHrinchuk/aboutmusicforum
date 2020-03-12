<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?php  if(isset($theme)) echo $theme?>
                </h1>
                <p class="text-white link-nav"><a href="<?php  echo WEBROOT;?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="">Новина</a></p>
            </div>
        </div>
    </div>
</section>



<section class="blog-posts-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                <div class="single-post">
                    <img class="img-fluid" src="<?php  if(isset($bg_img)) echo PUBLIC_DIR."/img/posts/$bg_img"?>" alt="">

                    <ul class="tags">
                        <?php
                        if (isset($categories)){
                            foreach ($categories as $category){
                                $name = $category["name"].' | ';
                                echo "<li><a href='#'>$name</a></li> ";
                            }
                        }

                        ?>
                    </ul>
                    <a href="#">
                        <h1><?php  if(isset($theme)) echo $theme?></h1>
                    </a>
                    <div class="content-wrap"> <?php  if(isset($content)) echo $content?></div>
                    <div class="bottom-meta">
                        <div class="user-details row align-items-center">
                            <div class="comment-wrap col-lg-6 col-sm-6">
                                <ul>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span><?php if(isset($comments)) echo count($comments) ?> Коментарів</a></li>
                                </ul>
                            </div>
                            <div class="social-wrap col-lg-6">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>



                    <section class="comment-sec-area pt-80 pb-80 ">
                        <div class="container ">
                            <div class="row flex-column">
                                <h5 class="text-uppercase mb-5 pb-2 border-bottom"><?php if(isset($comments)) echo count($comments) ?> Коментарів</h5>
                                <br>
                                <?php
                                if(isset($comments)){
                                    $commentCount = count($comments);
                                    $tip = "";
                                    $regLink = WEBROOT."login/register";

                                    if (isset($isAuthorized) && !$isAuthorized) $tip = "<div class='text-dark mb-3'><a href='$regLink'>Зареєструйтесь</a>, щоб залишити коментар</div>";
                                    foreach ($comments as $comment) {
                                        $text = $comment["text"];
                                        $user = $comment["user"];
                                        $date = date("D m, Y H:i", strtotime($comment["date"]));
                                        echo "<div class=\"comment-list  left-padding my-2 border-bottom\">
                                                <div class=\"single-comment justify-content-between d-flex\">
                                                    <div class=\"user justify-content-between d-flex\">                                     
                                                        <div class=\"desc\">
                                                            <h5><a href=\"#\">$user</a></h5>
                                                            <p class=\"date\">$date</p>
                                                            <p class=\"comment\">
                                                               $text
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </section>
                    <?php

                    if(isset($isAuthorized) && $isAuthorized){
                        if(isset($id))  $commentLink = WEBROOT."post/comment/$id";
                        echo "<section class=\"commentform-area pt-80\">
                                    <div class=\"container\">
                                        <h5 class=\"pb-50\">Залиште коментар</h5>
                                        <div class=\"row flex-row d-flex\">
                                            <div class=\"col-lg-8 col-md-6\">
                                            <form method='post' action='$commentLink'>
                                                <textarea name='text' class=\"form-control mb-10\" name=\"message\" placeholder=\"Коментар\" onfocus=\"this.placeholder = ''\" onblur=\"this.placeholder = 'Messege'\" required=\"\"></textarea>
                                                <button type='submit'  class=\"primary-btn mt-20\">Надіслати коментар</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>";
                    }
                    ?>




                </div>
            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-widget category-widget">
                    <h4 class="title">Post Categories</h4>
                    <ul>
                        <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Techlology</h6> <span>37</span></a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Lifestyle</h6> <span>24</span></a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Fashion</h6> <span>59</span></a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Art</h6> <span>29</span></a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Food</h6> <span>15</span></a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Architecture</h6> <span>09</span></a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Adventure</h6> <span>44</span></a></li>
                    </ul>
                </div>

                <div class="single-widget recent-posts-widget">
                    <h4 class="title">Recent Posts</h4>
                    <div class="blog-list ">
                        <div class="single-recent-post d-flex flex-row">
                            <div class="recent-thumb">
                                <img class="img-fluid" src="img/blog/r1.jpg" alt="">
                            </div>
                            <div class="recent-details">
                                <a href="blog-single.html">
                                    <h4>
                                        Home Audio Recording
                                        For Everyone
                                    </h4>
                                </a>
                                <p>
                                    02 hours ago
                                </p>
                            </div>
                        </div>
                        <div class="single-recent-post d-flex flex-row">
                            <div class="recent-thumb">
                                <img class="img-fluid" src="img/blog/r2.jpg" alt="">
                            </div>
                            <div class="recent-details">
                                <a href="blog-single.html">
                                    <h4>
                                        Home Audio Recording
                                        For Everyone
                                    </h4>
                                </a>
                                <p>
                                    02 hours ago
                                </p>
                            </div>
                        </div>
                        <div class="single-recent-post d-flex flex-row">
                            <div class="recent-thumb">
                                <img class="img-fluid" src="img/blog/r3.jpg" alt="">
                            </div>
                            <div class="recent-details">
                                <a href="blog-single.html">
                                    <h4>
                                        Home Audio Recording
                                        For Everyone
                                    </h4>
                                </a>
                                <p>
                                    02 hours ago
                                </p>
                            </div>
                        </div>
                        <div class="single-recent-post d-flex flex-row">
                            <div class="recent-thumb">
                                <img class="img-fluid" src="img/blog/r4.jpg" alt="">
                            </div>
                            <div class="recent-details">
                                <a href="blog-single.html">
                                    <h4>
                                        Home Audio Recording
                                        For Everyone
                                    </h4>
                                </a>
                                <p>
                                    02 hours ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-widget tags-widget">
                    <h4 class="title">Tag Clouds</h4>
                    <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Art</a></li>
                        <li><a href="#">Adventure</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Techlology</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Architecture</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Technology</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
