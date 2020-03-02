
<div class="container-fluid">
    <h4>Створення розділу</h4>
    <form id="upload-form" action="" method="POST" class="col-12 col-md-8 mx-0 px-0"  enctype="multipart/form-data">
        <div class="col-12">
            <label class="font-weight-bold" for="name">Назва розділу:</label>
            <input type="text" name="name" value="<?php if(isset($name)) echo $name?>" id="name"  class="form-control" required>
        </div>
        <div class="col-12">
            <label for="parent"  class="font-weight-bold">Належиться до роділу:</label>
            <select name="parent" id="parent" class="form-control custom-select">
                <option value="0"  default selected>Не належить жодному</option>
                <?php
                    if(isset($categories)){
                        foreach ($categories as $cat){

                            $id = $cat["id"];
                            $name = $cat["name"];
                            $selected = "";
                            if(isset($parent_id) && $parent_id == $id) $selected = "selected";
                        echo "<option value='$id' $selected>$name</option>";
                        }

                    }
                ?>
            </select>
        </div>
        <div class="col-12">
            <label class="font-weight-bold" for="content">Наповнення категорії:</label>
            <div id="content"><?php if(isset($content)) echo $content?></div>
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Зберегти">
        </div>
    </form>


</div>


<script>
    $(function(){
        $('#content').trumbowyg({
            lang: 'ua'
        });

    })
</script>
