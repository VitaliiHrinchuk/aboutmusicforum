
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Новини
                </h1>
                <p class="text-white link-nav"><a href="<?php echo WEBROOT; ?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Новини</a></p>
            </div>
        </div>
    </div>
</section>
<section class="blog-posts-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                <?php
                if(isset($posts)){
                    foreach ($posts as $post){
                        $title = $post["theme"];
                        $text = strip_tags($post["content"]);
                        $comments = $post["comment_count"];
                        if(strlen($text) > 250){
                            $text =  substr($text, 0, 200);
                        }
                        $categories = $post['categories'];
                        $catLinks = '';
                        foreach ($categories as $category){
                            $name = $category["name"].' | ';
                            $catLinks .= "<li><a href='#'>$name</a></li> ";
                        }
                        $img = PUBLIC_DIR."/img/posts/".$post["bg_img"];
                        $date = date("d.m.Y",strtotime($post["creation_date"]));
                        $link = WEBROOT."post/read/".$post["id"];
                        echo "<div class=\"single-post\">
                                    <img class=\"img-fluid\" src=\"$img\" alt=\"\">
                                    <ul class=\"tags\">
                                        $catLinks
                                    </ul>
                                    <a href=\"$link\">
                                        <h1>$title</h1>
                                    </a>
                                    <p>$text...</p>
                                    $date
                                    <div class=\"bottom-meta\">
                                        <div class=\"user-details row align-items-center\">
                                            <div class=\"comment-wrap col-lg-6\">
                                                <ul>
                                                    <li><a href=\"#\"><span class=\"lnr lnr-bubble\"></span> $comments Коментарів</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>";

                    }
                }
                ?>


            <?php
            if(count($posts) != 0){
                $offset = 0;
                $count = isset($countOffset) ? $countOffset : 0;
                $pages = ceil($count / 4);
                $URL = "post?offset=";
                if(isset($_GET['offset']) && !empty($_GET['offset'])) $offset = $_GET['offset'];
                $next = $URL .($offset + 4);
                $prev = $offset > 4 ? $URL.($offset - 4) :$URL.(0);
                $pagesElements = array();
                for($i = 0; $i < $pages; $i++){
                    $pgNum = $i+1;
                    $pgOffset = $i * 4;
                    $isActive = $pgOffset == $offset ? "active" : "";
                    array_push($pagesElements, "<li class=\"$isActive pagination-item\"><a href=\"post?offset=$pgOffset\">$pgNum</a></li>");
                }
                $prevElement = $offset - 4 >= 0 ?"<li class='pagination-item'><a href=\"$prev\">&lt;</a></li>" : "<li class='disabled pagination-item'><a  disabled>&lt;</a></li>"  ;
                $nextElement = $offset + 4 <= $count ?"<li class='pagination-item'><a href=\"$next\">&gt;</a></li>" : "<li class='disabled pagination-item'><a  >&gt;</a></li>" ;
                echo " <div class=\"row mt-5\">
                                <div class=\"col\">
                                    <div class=\"block-27\">
                                        <ul class=\"d-flex\">
                                        $prevElement
                                         ".implode("",$pagesElements)."
                                        $nextElement
                                        </ul>
                                    </div>
                                </div>
                            </div>";

            } else {
                echo "<div><i>Нема жодного результату за вашим запитом</i><img src='https://cdn.dribbble.com/users/283708/screenshots/7084440/media/6cd8b29540bcfb6a7693c27f58db7b56.png' class='w-100' alt=''></div>";
            }

            ?>

            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-widget search-widget">
                    <form class="example" action="" style="margin:auto;max-width:300px">
                        <input type="text" value="<?php if(isset($_GET["title"])) echo $_GET["title"]?>" placeholder="Пошук" name="title">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>


                <div class="single-widget category-widget">
                    <h4 class="title">Категорії</h4>
                    <ul>
                        <?php
                            if(isset($category_list)){
                                foreach ($category_list as $category){
                                    $name = $category['name'];
                                    $id = $category['id'];
                                    $link =  WEBROOT . "post?category=$id";
                                    echo  "<li><a href=\"$link\" class=\"justify-content-between align-items-center d-flex\"><h6>$name</h6> </a></li>";
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
