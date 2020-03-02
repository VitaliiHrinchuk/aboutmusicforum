<script src="<?php echo PUBLIC_DIR?>/js/datepicker.min.js"></script>

        <h2 class="px-5">Портфоліо</h2>
        <form action="" method="POST" class="col-12 col-md-8 row align-items-start px-5" enctype="multipart/form-data">

            <div class="col-12 col-lg-5 profile-avatar">
                <div class="font-weight-bold">Фотографія</div>
                <div class="">

                    <div id="avatarImg"  style="background-image: url('<?php if(isset($photo)) echo PUBLIC_DIR."/images/$photo"; else  echo PUBLIC_DIR."/images/no-image.jpg" ?>')" class="avatar-block text-center border">

                    </div>
                    <label for="photo" class="btn btn-primary px-2 py-1 text-center">
                        <i class="fa fa-file-image-o"></i> Завантажити
                        <input type="file" id="photo" name="photo" style="display: none" accept="image/*">
                        <input id="photo_old" name="photo_old" type="hidden" value="<?php if(isset($photo)) echo $photo;?>">
                    </label>
                </div>

            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="first_name">Ім'я:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if(isset($first_name)) echo $first_name?>" required>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="last_name">Фамілія:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php if(isset($last_name)) echo $last_name?>" required>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="second_name">По-Батькові:</label>
                <input type="text" class="form-control" name="second_name" id="second_name" value="<?php if(isset($second_name)) echo $second_name?>" required>
            </div>

            <div class="col-12">
                <label class="font-weight-bold" for="email">Е-пошта:</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php if(isset($email)) echo $email?>" required>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="phone">Номер телефону:</label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php if(isset($phone)) echo $phone?>" required>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="date_of_birth">Дата народження:</label>
                <input data-date-format="yyyy-mm-dd" type="text" class="form-control datepicker-here" name="date_of_birth" id="date_of_birth" value="<?php if(isset($date_of_birth)) echo $date_of_birth?>" required>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="education">Освіта:</label>
                <textarea class="form-control" name="education" id="" cols="30" rows="3"><?php if(isset($education)) echo $education?></textarea>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="work">Робота:</label>
                <textarea class="form-control" name="work" id="" cols="30" rows="3"><?php if(isset($work)) echo $work?></textarea>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="exp">Досвід:</label>
                <textarea class="form-control" name="exp" id="" cols="30" rows="3"><?php if(isset($exp)) echo $exp?></textarea>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="short_about">Короткий опис:</label>
                <textarea class="form-control" name="short_about" id="" cols="30" rows="5"><?php if(isset($short_about)) echo $short_about?></textarea>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="long_about">Опис:</label>
                <textarea class="form-control" name="long_about" id="" cols="30" rows="5"><?php if(isset($long_about)) echo $long_about?></textarea>
            </div>
            <div class="col-12 mt-2">
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
        $("#photo").change(function(){
            readURL(this);
        })

    })
</script>