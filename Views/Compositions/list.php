<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Відомі твори
                </h1>
                <p class="text-white link-nav"><a href="<?php echo WEBROOT; ?>">Головна </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Відомі твори</a></p>
            </div>
        </div>
    </div>
</section>
<section class="model-area section-gap container" id="cars">
    <?php
        if(isset($compositions)){
            foreach ($compositions as $composition){
                $name = $composition['name'];
                $desc = $composition['description'];
                $link = $composition['link'];
                $attributesHTML = '';
                foreach ($composition['attributes'] as $attribute){
                    $key = $attribute['attr_key'];
                    $value = $attribute['attr_value'];
                    $attributesHTML .= "$key: $value<br/>";
                }
                echo "<div class=\"row align-items-center single-model item flex-row-reverse\">
                        <div class=\"col-lg-6 model-left\">
                            <div class=\"title justify-content-between d-flex\">
                                <h4 class=\"mt-20\">$name</h4>
                           
                            </div>
                            <p>$desc</p>
                            <p>$attributesHTML</p>
                      
                        </div>
                        <div class=\"col-lg-6 model-right\">
                             <iframe class='w-100 ' height='300'
                            src=\"$link\" >
                            </iframe> 
                        </div>
                    </div>";
            }
        }
    ?>
</section>
<script>
    // $(function () {
    //
    //     $("iframe").not(":has([src])").each(function () {
    //
    //         var ifrm = this;
    //
    //         ifrm = (ifrm.contentWindow) ? ifrm.contentWindow : (ifrm.contentDocument.document) ? ifrm.contentDocument.document : ifrm.contentDocument;
    //
    //         ifrm.document.open();
    //         ifrm.document.write($(this).attr("alt"));
    //         ifrm.document.close();
    //
    //     });
    //
    // });
</script>