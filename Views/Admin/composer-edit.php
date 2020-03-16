<h3 class="ml-4">Композитор</h3>
<form action="" method="POST" class="col-12 col-md-10 row align-items-start px-5" enctype="multipart/form-data">

    <div class="col-12 col-lg-5 profile-avatar">
        <div class="font-weight-bold">Аватар композитора</div>
        <div class="">

            <div id="avatarImg"  style="background-image: url('<?php if(isset($avatar)) echo PUBLIC_DIR."/img/composers/$avatar"; else  echo PUBLIC_DIR."/img/no-image.jpg" ?>')" class="avatar-block text-center border">

            </div>
            <label for="avatar" class="btn btn-primary px-2 py-1 text-center">
                <i class="fa fa-file-image-o"></i> Завантажити
                <input type="file" id="avatar" name="avatar" style="display: none" accept="image/*">
                <input id="bg_old" name="bg_old" type="hidden" value="<?php if(isset($avatar)) echo $avatar;?>">
            </label>
        </div>

    </div>
    <div class="col-12">
        <label class="font-weight-bold" for="name">Ім'я:</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($name)) echo $name?>" required>
    </div>

    <div class="col-12">
        <label class="font-weight-bold" for="date_of_birth">Дата народження:</label>
        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php if(isset($date_of_birth)) echo $date_of_birth?>" required>
    </div>
    <div class="col-12">
        <label class="font-weight-bold" for="date_of_death">Дата смерті (залишити пустим, якщо не потрібно):</label>
        <input type="date" class="form-control" name="date_of_death" id="date_of_death" value="<?php if(isset($date_of_death)) echo $date_of_death?>" >
    </div>
    <div class="col-12">
        <label class="font-weight-bold d-block" for="description">Біографія:</label>
        <textarea name="description" id="" cols="70" rows="5"><?php if(isset($description)) echo $description?></textarea>
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
        $("#avatar").change(function(){
            readURL(this);
        })

    })
</script>