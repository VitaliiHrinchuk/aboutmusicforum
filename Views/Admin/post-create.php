<h3 class="ml-4">Створення публікації</h3>
        <form action="" method="POST" class="col-12 col-md-10 row align-items-start px-5" enctype="multipart/form-data">

            <div class="col-12 col-lg-5 profile-avatar">
                <div class="font-weight-bold">Основне зображення публікації</div>
                <div class="">

                    <div id="avatarImg"  style="background-image: url('<?php if(isset($bg_img)) echo PUBLIC_DIR."/images/posts/$bg_img"; else  echo PUBLIC_DIR."/images/no-image.jpg" ?>')" class="avatar-block text-center border">

                    </div>
                    <label for="bg" class="btn btn-primary px-2 py-1 text-center">
                        <i class="fa fa-file-image-o"></i> Завантажити
                        <input type="file" id="bg" name="bg" style="display: none" accept="image/*">
                        <input id="bg_old" name="bg_old" type="hidden" value="<?php if(isset($bg_img)) echo $bg_img;?>">
                    </label>
                </div>

            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="theme">Тема публікації:</label>
                <input type="text" class="form-control" name="theme" id="theme" value="<?php if(isset($theme)) echo $theme?>" required>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="content">Публікація:</label>
                <div id="content"><?php if(isset($content)) echo $content?></div>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Зберегти">
            </div>

        </form>

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                e.target.result
                $('#avatarImg').css('background-image', 'url(' + e.target.result +')');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function(){
        $('#content').trumbowyg({
            lang: 'ua'
        });
        $("#bg").change(function(){
            readURL(this);
        })

    })
</script>