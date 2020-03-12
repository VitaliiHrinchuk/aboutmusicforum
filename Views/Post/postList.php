
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
                                            <div class=\"social-wrap col-lg-6\">
                                                <ul>
                                                    <li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>
                                                    <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>
                                                    <li><a href=\"#\"><i class=\"fa fa-dribbble\"></i></a></li>
                                                    <li><a href=\"#\"><i class=\"fa fa-behance\"></i></a></li>
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
