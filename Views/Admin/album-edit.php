<script src="<?php echo PUBLIC_DIR?>/js/dropzone.js"></script>

        <h2 class="px-5">Редагування альбому</h2>

        <form action="" method="POST" class="col-12 col-md-8 row align-items-start px-5" enctype="multipart/form-data">
            <input type="hidden" id="albumId" name="id" value="<?php if(isset($id)) echo $id?>">
            <div class="col-12">
                <label class="font-weight-bold" for="name">Назва:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($name)) echo $name?>" required>
            </div>
            <div class="col-12 col-md-8 row mx-0 px-3">
                <?php
                    if(isset($photos) && count($photos) != 0){
                        foreach ($photos as $photo){
                            $id = $photo["id"];
                            $name = $photo["photo_url"];
                            $url = PUBLIC_DIR."/images/albums/$name";
                            echo "<div id=\"avatarImg\"   style=\"background-image: url('$url')\" class=\"col-4 px-0 avatar-block avatar-small text-center border\">
                                   <div class='icon-container'><div data-id='$id' class='del delPhoto'>Видалити</div></div> 
                                    </div>";
                        }
                    }
                ?>
            </div>
            <span class="font-weight-bold mx-1 col-12 col-lg-8">Завантажити фото:</span>
            <div id="imagezone" class="dropzone col-12 mx-3 my-2">
                <div class="dz-message">Переместіть файли або натисніть сюди на пусте місце для завантаження

                </div>
            </div>

            <div class="col-12 mt-2">
                <input type="submit" class="btn btn-primary" value="Зберегти">
            </div>
            <div id="deletedPhotos">

            </div>
        </form>

<script>
    let albumId = $("#albumId").val();
    let myDropzone = new Dropzone("#imagezone", { url: "../uploadPhoto/"+albumId});

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
        $('.delPhoto').click(function (e) {
            let el = e.target;
            let id = $(el).data("id");
            console.log(id)
            $(`<input type='hidden' name='delete[]' value='${id}' />`).appendTo("#deletedPhotos");
            $(el.parentElement.parentElement).remove();
        })
        $('#content').trumbowyg({
            lang: 'ua'
        });
        $("#photo").change(function(){
            readURL(this);
        })

    })
</script>