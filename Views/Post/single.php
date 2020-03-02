<div class="hero-wrap " style="height: 500px;background-image: url('<?php  if(isset($bg_img)) echo PUBLIC_DIR."/images/posts/$bg_img"?>');" >
    <div class=" d-flex justify-content-center align-items-center">
        <div class="col-md-8 text text-center">

        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ftco-animate">
                <h2 class="mb-3 font-weight-bold"><?php  if(isset($theme)) echo $theme?></h2>
                <?php  if(isset($content)) echo $content?>

                <?php
                    if(isset($comments)){
                        $commentCount = count($comments);
                        $tip = "";
                        $regLink = WEBROOT."login/register";
                        if (isset($isAuthorized) && !$isAuthorized) $tip = "<div class='text-dark mb-3'><a href='$regLink'>Зареєструйтесь</a>, щоб залишити коментар</div>";
                        echo "<div class=\"pt-4 mt-5\">
                              
                              <h3 class=\" font-weight-bold\">$commentCount Коментарів</h3>
                              $tip
                              <ul class=\"comment-list\">";
                        foreach ($comments as $comment){
                            $text = $comment["text"];
                            $user = $comment["user"];
                            $date = date("H:i d.m.Y", strtotime($comment["date"]));
                            echo "<li class=\"comment border rounded p-2\">
                                        <div class=\"comment-body\">
                                            <h3>$user</h3>
                                            <div class=\"meta\">$date</div>
                                            <p class='text-dark'>$text</p>
                                        </div>
                                    </li>";
                        }
                        echo "</ul>";
                    }
                ?>

                    <!-- END comment-list -->
                    <?php

                        if(isset($isAuthorized) && $isAuthorized){
                            if(isset($id))  $commentLink = WEBROOT."post/comment/$id";
                            echo "<div class=\"comment-form-wrap pt-3\">
                                    <h3 class=\"mb-5\">Залиште коментар</h3>
                                    <form action=\"$commentLink\" method='post' class=\"p-3 p-md-5 bg-light\">
            
                                        <div class=\"form-group\">
                                            <label for=\"message\">Ваш коментар</label>
                                            <textarea name=\"text\" id=\"message\" cols=\"30\" rows=\"4\" class=\"form-control\"></textarea>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"submit\" value=\"Залишити коментар\" class=\"btn py-3 bt px-4 btn-primary\">
                                        </div>
            
                                    </form>
                                </div>";
                        }
                    ?>

                </div>
            </div> <!-- .col-md-8 -->

        </div>
    </div>
</section>
