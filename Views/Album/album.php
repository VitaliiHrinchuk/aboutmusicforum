<section class="ftco-section-2">
    <div id="fullscreen" class="fullscreen-image">
        <div class="image" style="background-image: url('<?php echo PUBLIC_DIR."/images/bg_1.jpg"?>')"></div>
        <i id="close" class="close icon-close2"></i>
    </div>
    <?php
        if(isset($albums)){
            foreach ($albums as $album => $photos){
                $name = $album;
                echo "<div>
                        <hr class='py-0 my-1'>
                        <h3 class='px-2 py-'>$name</h3>
                        <hr class='py-0 my-1'>
                    </div>";
                echo "<div class=\"photograhy\">
                            <div class=\"row no-gutters\">";
                foreach ($photos as $photo){

                    $url = "'".PUBLIC_DIR."/images/albums/".$photo."'";
                    echo "<div class=\"col-md-3\">
                            <div  class=\"photography-entry img d-flex justify-content-center align-items-center\" style=\"background-image: url($url)\">

                            </div>
                        </div>";

                }
                echo "</div>
                         </div>";
            }
        }
    ?>


</section>
<script>
    $(function () {
        $(".photography-entry").click(function (e) {
            let img = e.target.style.backgroundImage;
           // img = img.slice(4, -1).replace(/"/g, "");
            $("#fullscreen").show();
            console.log(img);
            $("#fullscreen .image").css("background-image", img);
        })
        $("#fullscreen .close").click(function () {
            $("#fullscreen").hide();
        })
    })
</script>