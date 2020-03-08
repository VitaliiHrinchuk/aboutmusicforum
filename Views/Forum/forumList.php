<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Форум
                </h1>
                <p class="text-white link-nav"><a href="<?php echo WEBROOT; ?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Форум</a></p>
            </div>
        </div>
    </div>
</section>
<section class="px-5 row p-4">
    <div class="col-12 col-lg-8 ">
        <?php
        setlocale( LC_ALL , 'uk-UA.utf-8');
                if(isset($threads)) {
                    foreach ($threads as $thread) {
                        $title = $thread["title"];
                        $description = $thread["description"];
                        $comments = $thread["comment_count"];
                        if (strlen($description) > 250) {
                            $text = substr($description, 0, 200);
                        }
                        $date = strftime("%A, %d.%m.%Y", strtotime($thread["created_at"]));
                        $link = WEBROOT . "forum/read/" . $thread["id"];
                        echo "<div class=\"border rounded p-2 mb-2\">
                            <div class=\"d-flex justify-content-between mb-2\">
                                <h4><a class=\"text-dark\" href=\"$link\">$title</a></h4> <span>$date</span>
                            </div>
                            <p>$description</p>
                            <div><div ><b class=\"lnr lnr-bubble\"></b> $comments Коментарів</div></div>
                        </div>";
                    }
                }
         ?>
        <?php
        if(count($threads) != 0){

            $offset = 0;
            $count = isset($countOffset) ? $countOffset : 0;
            $pages = ceil($count / 6);
            $URL = "forum?offset=";
            if(isset($_GET['offset']) && !empty($_GET['offset'])) $offset = $_GET['offset'];
            $next = $URL .($offset + 6);
            $prev = $offset > 6 ? $URL.($offset - 6) :$URL.(0);
            $pagesElements = array();
            for($i = 0; $i < $pages; $i++){
                $pgNum = $i+1;
                $pgOffset = $i * 6;
                $isActive = $pgOffset == $offset ? "active" : "";
                array_push($pagesElements, "<li class=\"$isActive pagination-item\"><a href=\"$URL$pgOffset\">$pgNum</a></li>");
            }
            $prevElement = $offset - 6 >= 0 ?"<li class='pagination-item'><a href=\"$prev\">&lt;</a></li>" : "<li class='disabled pagination-item'><a  disabled>&lt;</a></li>"  ;
            $nextElement = $offset + 6 <= $count ?"<li class='pagination-item'><a href=\"$next\">&gt;</a></li>" : "<li class='disabled pagination-item'><a  >&gt;</a></li>" ;
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
    <div class="col-12 col-lg-4 ">
        <div class="single-widget search-widget">
            <form class="example" action="" style="margin:auto;max-width:300px">
                <input type="text" value="<?php if(isset($_GET["title"])) echo $_GET["title"]?>" placeholder="Пошук" name="title">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <?php
        if(isset($_SESSION["id"])){
            $link = WEBROOT."forum/create";
            echo "<a href='$link' class='primary-btn'>Створити тред</a>";
        }
        ?>
    </div>
</section>